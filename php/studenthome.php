<?php
    session_start();
    include 'auth/student_auth_check.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" type="text/css" href="../css/admin.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
    
    <header class="header">
        <a href="">Student Dashboard</a>

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
        <h1>Student Dashboard</h1>

        <p>Here you can view your courses, check your grades, see upcoming assignments, and manage your personal information. Use the sidebar to navigate between your classes, grades, and schedule.</p>
    </div>
</body>
</html>