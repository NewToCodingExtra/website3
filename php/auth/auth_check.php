<?php
    //Use in pages that could be access by both user types
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Check if user is logged in
    if(!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
    
    // Regenerate session ID periodically on page load (every 5 minutes)
    if (!isset($_SESSION['last_regeneration'])) {
        $_SESSION['last_regeneration'] = time();
    } elseif (time() - $_SESSION['last_regeneration'] > 300) {
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
    }
?>