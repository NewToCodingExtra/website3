<?php
    // This file should be included at the top of all student pages
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    include 'auth/student_auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'Student Dashboard' ?></title>

    <link rel="stylesheet" type="text/css" href="../css/admin.css">

    <?php include "css_bootstrap.php" ?>
</head>
<body>
    
    <header class="header">
        <a href="studenthome.php">Student Dashboard</a>

        <div class="logout">
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <aside>
        <ul>
            <li>
                <a href="under_construction.php">My Courses</a> 
            </li>
            <li>
                <a href="under_construction.php">Assignments</a>  
            </li>
            <li>
                <a href="under_construction.php">Grades</a>  
            </li>
            <li>
                <a href="under_construction.php">Schedule</a> 
            </li>
            <li>
                <a href="under_construction.php">Profile</a>  
            </li>
            <li>
                <a href="under_construction.php">Registration Form</a> 
            </li>
            <li>
                <a href="under_construction.php">Pre-Registration</a> 
            </li>
            <li>
                <a href="under_construction.php">Enrollment</a> 
            </li>
            <li>
                <a href="under_construction.php">Graduation</a> 
            </li>
        </ul>
    </aside>

    <div class="content">
        <!-- Page content will be inserted here -->