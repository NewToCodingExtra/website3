<?php
    /**
     * Set error message in session and redirect with error parameter
     * Uses window.location.replace to avoid creating browser history
     * 
     * @param string $message - Error message to display
     * @param string $error_type - Error type for URL parameter
     * @param string $redirect_page - Page to redirect to (can include #anchor)
     */
    function setErrorAndRedirect($message, $error_type, $redirect_page) {
        $_SESSION['errorMessage'] = $message;
        
        // Check if redirect_page contains an anchor (#)
        if (strpos($redirect_page, '#') !== false) {
            // Split the URL into base and anchor
            list($base_url, $anchor) = explode('#', $redirect_page, 2);
            $full_url = "{$base_url}?error={$error_type}#{$anchor}";
        } else {
            $full_url = "{$redirect_page}?error={$error_type}";
        }
        
        echo "<script>window.location.replace('{$full_url}');</script>";
        exit();
    }

    /**
     * Log error to file for debugging
     * 
     * @param string $error_message - Error message to log
     * @param string $file - File where error occurred
     */
    function logError($error_message, $file = '') {
        $log_file = '../logs/error_log.txt'; // Create a logs folder
        $timestamp = date('Y-m-d H:i:s');
        $log_entry = "[{$timestamp}] [{$file}] {$error_message}\n";
        
        // Create logs directory if it doesn't exist
        $log_dir = dirname($log_file);
        if (!file_exists($log_dir)) {
            mkdir($log_dir, 0755, true);
        }
        
        error_log($log_entry, 3, $log_file);
    }

    /**
     * Validate and sanitize input
     * 
     * @param string $input - Input to sanitize
     * @param string $type - Type of validation (email, phone, text)
     * @return string|false - Sanitized input or false if invalid
     */
    function validateInput($input, $type = 'text') {
        $input = trim($input);
        
        switch($type) {
            case 'email':
                return filter_var($input, FILTER_VALIDATE_EMAIL) ? $input : false;
            
            case 'phone':
                // Remove all non-numeric characters
                $phone = preg_replace('/[^0-9]/', '', $input);
                return (strlen($phone) >= 10 && strlen($phone) <= 15) ? $phone : false;
            
            case 'text':
                // Remove HTML tags and special characters
                return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
            
            default:
                return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        }
    }
?>