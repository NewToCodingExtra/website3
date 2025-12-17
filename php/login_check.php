<?php
    session_start();
    include "db.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        // Check for empty fields
        if (empty($name) and empty($password)) {
            $message = "Username and Password are empty!";
            $_SESSION["loginMessage"]=$message;
            echo "<script>window.location.replace('login.php?error=empty');</script>";
            exit();
        } elseif(empty($name)) {
            $message = "There is no username!";
            $_SESSION["loginMessage"]=$message;
            echo "<script>window.location.replace('login.php?error=emptyusername');</script>";
            exit();
        } elseif(empty($password)) {
            $message = "There is no password!";
            $_SESSION["loginMessage"]=$message;
            echo "<script>window.location.replace('login.php?error=emptypassword');</script>";
            exit();
        } 

        // Get username, password, AND usertype from database
        $stmt = $conn->prepare("SELECT id, username, password, usertype FROM users WHERE username = ?");
        $stmt->bind_param("s", $name);   
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            if (password_verify($password, $user['password'])) {
                // Login successful - save to session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['usertype'] = $user['usertype'];
                
                // Redirect based on usertype
                if ($user['usertype'] == 'admin') {
                    header("Location: adminhome.php");
                    exit();
                } else if ($user['usertype'] == 'student') {
                    header("Location: studenthome.php");
                    exit();
                } else {
                    $message = "Invalid user type!";
                    $_SESSION["loginMessage"]=$message;
                    header("Location: login.php?error=invalidtype");
                    exit();
                }
                
            } else {
                $message = "Incorrect password, please try again!";
                $_SESSION["loginMessage"]=$message;
                echo "<script>window.location.replace('login.php?error=wrongpassword');</script>";
                exit();
            }
        } else {
            $message = "Account does not exist yet!";
            $_SESSION["loginMessage"]=$message;
            echo "<script>window.location.replace('login.php?error=usernotfound');</script>";
            exit();
        }
        
        $stmt->close();
    }
?>