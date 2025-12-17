<?php
    // Custom error logging function
    function logMessage($message, $type = "INFO") {
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = "[$timestamp] [$type] $message\n";
        error_log($logEntry, 3, "../error_logs/db_log.txt");
    }

    $server = "127.0.0.1";
    $db_user = "root";
    $db_password = "123456789";
    $db_name = "schoolproject";

    logMessage("Attempting database connection...", "INFO");

    try {
        $conn = new mysqli($server, $db_user, $db_password, $db_name);
        
        // If we get here, connection succeeded
        logMessage("DB connection successfully connected!", "SUCCESS");
        $conn->set_charset("utf8mb4");
        
    } catch (mysqli_sql_exception $e) {
        // Catch the exception and log it
        logMessage("Connection failed: {$e->getMessage()}", "ERROR");
        die("Database connection failed. Please contact support.");
    }
?>
