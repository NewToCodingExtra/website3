<?php
    session_start();
    include "db.php";
    include "error_handler.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        // Check for empty fields
        if (empty($name) && empty($password)) {
            setErrorAndRedirect("Username and Password are empty!", "empty", "login.php");
        } elseif(empty($name)) {
            setErrorAndRedirect("There is no username!", "emptyusername", "login.php");
        } elseif(empty($password)) {
            setErrorAndRedirect("There is no password!", "emptypassword", "login.php");
        } 

        // Get username, password, AND usertype from database
        $stmt = $conn->prepare("SELECT id, username, password, usertype FROM users WHERE username = ?");
        
        if ($stmt === false) {
            logError("Failed to prepare statement: " . $conn->error, "login_check.php");
            setErrorAndRedirect("System error. Please try again later.", "system_error", "login.php");
        }
        
        $stmt->bind_param("s", $name);   
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            if (password_verify($password, $user['password'])) {
                // Login successful - regenerate session ID for security
                session_regenerate_id(true);
                
                // Save to session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['usertype'] = $user['usertype'];
                $_SESSION['last_regeneration'] = time();
                
                // Log successful login
                logError("User '{$name}' logged in successfully", "login_check.php");
                
                // Redirect based on usertype
                if ($user['usertype'] == 'admin') {
                    header("Location: adminhome.php");
                    exit();
                } else if ($user['usertype'] == 'student') {
                    header("Location: studenthome.php");
                    exit();
                } else {
                    setErrorAndRedirect("Invalid user type!", "invalidtype", "login.php");
                }
                
            } else {
                // Log failed login attempt
                logError("Failed login attempt for user: {$name} - Incorrect password", "login_check.php");
                setErrorAndRedirect("Incorrect password, please try again!", "wrongpassword", "login.php");
            }
        } else {
            // Log failed login attempt
            logError("Failed login attempt - User not found: {$name}", "login_check.php");
            setErrorAndRedirect("Account does not exist yet!", "usernotfound", "login.php");
        }
        
        $stmt->close();
    }
    
    $conn->close();
?>