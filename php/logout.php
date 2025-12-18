<?php
    session_start();
    
    // Log the logout action (optional)
    if (isset($_SESSION['username'])) {
        if (file_exists("error_handler.php")) {
            include "error_handler.php";
            logError("User '{$_SESSION['username']}' logged out", "logout.php");
        }
    }
    
    // Unset all session variables
    $_SESSION = array();
    
    // Destroy the session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }
    
    // Destroy the session
    session_destroy();
    
    // Redirect to login page
    header("Location: login.php");
    exit();
?>