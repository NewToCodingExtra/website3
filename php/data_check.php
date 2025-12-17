<?php
    session_start();
    include "db.php";
    include "error_handler.php";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['apply'])) {
        
        // Get and validate inputs
        $data_name = $_POST['name'] ?? '';
        $data_email = $_POST['email'] ?? '';
        $data_phone = $_POST['phone'] ?? '';
        $data_message = $_POST['message'] ?? '';
        
        // Check if ALL required fields are empty FIRST
        if (empty($data_name) && empty($data_email) && empty($data_phone)) {
            setErrorAndRedirect("All fields are required!", "all_empty", "../index.php#admission_form");
        }

        // Validate required fields
        if (empty($data_name)) {
            setErrorAndRedirect("Name is required!", "empty_name", "../index.php#admission_form");
        }
        
        if (empty($data_email)) {
            setErrorAndRedirect("Email is required!", "empty_email", "../index.php#admission_form");
        }
        
        if (empty($data_phone)) {
            setErrorAndRedirect("Phone number is required!", "empty_phone", "../index.php#admission_form");
        }
        
        // Validate email format
        $validated_email = validateInput($data_email, 'email');
        if (!$validated_email) {
            setErrorAndRedirect("Invalid email format!", "invalid_email", "../index.php#admission_form");
        }
        
        // Validate phone format
        $validated_phone = validateInput($data_phone, 'phone');
        if (!$validated_phone) {
            setErrorAndRedirect("Invalid phone number! Must be 10-15 digits.", "invalid_phone", "../index.php#admission_form");
        }
        
        // Sanitize text inputs
        $data_name = validateInput($data_name, 'text');
        $data_message = validateInput($data_message, 'text');
        
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO admission (name, email, phone, message) VALUES (?, ?, ?, ?)");
        
        if ($stmt === false) {
            logError("Failed to prepare statement: " . $conn->error, "data_check.php");
            setErrorAndRedirect("System error. Please try again later.", "system_error", "../index.php#admission_form");
        }
        
        $stmt->bind_param("ssss", $data_name, $validated_email, $validated_phone, $data_message);
        
        if ($stmt->execute()) {
            // Success
            $_SESSION['successMessage'] = "Application submitted successfully! We will contact you soon.";
            echo "<script>window.location.replace('../index.php?success=1#admission_form');</script>";
            exit();
        } else {
            // Log the actual error for debugging
            logError("Insert failed: " . $stmt->error, "data_check.php");
            
            // Show user-friendly message
            setErrorAndRedirect("Failed to submit application. Please try again.", "submission_failed", "../index.php#admission_form");
        }
        
        $stmt->close();
    } else {
        // Invalid request method
        setErrorAndRedirect("Invalid request!", "invalid_request", "../index.php#admission_form");
    }
    
    $conn->close();
?>