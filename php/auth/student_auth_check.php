<?php
    //Use for 'student' usertype pages for authentication access 
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start(); //check if there is no session, if none it would create one
    }

    // Check if user is logged in
    if(!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
        header("Location: login.php"); // redirect to login page if a user directly type the url.
        exit();
    }
    
    // Check if user is student
    if(!isset($_SESSION['usertype']) || $_SESSION['usertype'] !== 'student') {
        header("Location: login.php"); // redirect to login page, if a logged user typed the url that they don't have access to (e.g. (user logged in with usertype = admin, but typed php/studenthome.php), normally without this check, it would redirect that user to studenthome.php).
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