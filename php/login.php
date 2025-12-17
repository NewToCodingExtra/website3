<?php
    session_start();
    
    // Only show errors if there's a session message (prevents fake URL manipulation)
    if (isset($_SESSION['loginMessage'])) {
        $error = $_GET['error'] ?? '';
        $showUsernameError = in_array($error, ['empty', 'emptyusername']);
        $showPasswordError = in_array($error, ['empty', 'emptypassword', 'wrongpassword']);
        $showBothError = in_array($error, ['empty', 'usernotfound']);
        $errorMessage = $_SESSION['loginMessage'];
        unset($_SESSION['loginMessage']);
        $hasError = true;
    } else {
        $showUsernameError = false;
        $showPasswordError = false;
        $showBothError = false;
        $errorMessage = '';
        $hasError = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <?php if ($hasError): ?>
    <script>
        // Remove error parameter from URL without creating browser history
        if (window.location.search.includes('error=')) {
            const url = window.location.origin + window.location.pathname;
            window.history.replaceState({}, document.title, url);
        }
    </script>
    <?php endif; ?>
    
</head>
<body class="body_deg">
    <center>
        <div class="form_deg">
            <center class="title_deg">
                Login Page
            </center>
            
            <form action="login_check.php" method="POST" class="login_form">
                <div>
                    <label class="label_deg">Username</label>
                    <span class="input_wrapper">
                        <input type="text" name="username" class="<?= $showUsernameError ? 'input_error' : '' ?>">
                        <?php if ($showUsernameError): ?>
                            <span class="error_icon_wrapper">
                                <img src="../images/error_icon.png" alt="Error" class="error_icon">
                                <span class="tooltip_text"><?= $errorMessage ?></span>
                            </span>
                        <?php endif; ?>
                    </span>
                </div>
                <div>
                    <label class="label_deg">Password</label>
                    <span class="input_wrapper">
                        <input type="password" name="password" class="<?= $showPasswordError ? 'input_error' : '' ?>">
                        <?php if ($showPasswordError && !$showBothError): ?>
                            <span class="error_icon_wrapper">
                                <img src="../images/error_icon.png" alt="Error" class="error_icon">
                                <span class="tooltip_text"><?= $errorMessage ?></span>
                            </span>
                        <?php endif; ?>
                    </span>
                </div>
                <div>
                    <span class="input_wrapper">
                        <input class="btn btn-primary" type="submit" name="submit" value="Login">
                        <?php if ($showBothError): ?>
                            <span class="error_icon_wrapper">
                                <img src="../images/error_icon.png" alt="Error" class="error_icon">
                                <span class="tooltip_text"><?= $errorMessage ?></span>
                            </span>
                        <?php endif; ?>
                    </span>
                </div>
            </form>
        </div>
    </center>
    
</body>
</html>