<?php
    // This file should be included at the top of all admin pages
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    include 'auth/admin_auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'Admin Dashboard' ?></title>

    <link rel="stylesheet" type="text/css" href="../css/admin.css">

    <?php include "css_bootstrap.php" ?>
</head>
<body>
    
    <header class="header">
        <a href="adminhome.php" class="admin_header_deg">Admin Dashboard</a>

        <div class="logout">
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <aside>
        <ul>
            <li>
                <a href="admission.php">Admission</a>
            </li>
            <li>
                <a href="under_construction.php">Add Student</a>
            </li>
            <li>
                <a href="under_construction.php">View Student</a>
            </li>
            <li>
                <a href="under_construction.php">Add Teacher</a>
            </li>
            <li>
                <a href="under_construction.php">View Teacher</a>
            </li>
            <li>
                <a href="under_construction.php">Add Courses</a>
            </li>
            <li>
                <a href="under_construction.php">View Courses</a>
            </li>
            <li>
                <a href="under_construction.php">Add Section</a> 
            </li>
            <li>
                <a href="under_construction.php">View Section</a> 
            </li>
        </ul>
    </aside>

    <div class="content">
        <!-- Page content will be inserted here -->