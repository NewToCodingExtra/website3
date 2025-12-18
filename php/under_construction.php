<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Under Construction</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            text-align: center;
            background: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
            position: relative;
        }

        .construction-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 30px;
            border-radius: 10px;
        }

        h1 {
            color: #333;
            font-size: 32px;
            margin-bottom: 15px;
        }

        p {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
        }

        .button-group {
            margin-top: 30px;
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .button-group a {
            display: inline-block;
            padding: 12px 30px;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .back-button {
            background-color: #667eea;
        }

        .back-button:hover {
            background-color: #764ba2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .logout-button {
            background-color: #e74c3c;
        }

        .logout-button:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }

        /* Logout link in top right corner (alternative) */
        .logout-corner {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .logout-corner a {
            background-color: #e74c3c;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s;
        }

        .logout-corner a:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Optional: Logout in top right corner -->
        <?php 
            session_start();
            if(isset($_SESSION['username'])): 
        ?>
            <div class="logout-corner">
                <a href="logout.php">Logout</a>
            </div>
        <?php endif; ?>
        
        <!-- Replace 'images/under-construction.png' with your actual image path -->
        <img src="../images/under-construction.png" alt="Under Construction" class="construction-image">
        
        <h1>🚧 Page Under Construction 🚧</h1>
        <p>We're working hard to bring you something amazing!</p>
        <p>This page is currently being developed. Please check back soon.</p>
        
        <div class="button-group">
            <?php if(isset($_SESSION['username'])): ?>
                <!-- Show appropriate home button based on user type -->
                <?php if($_SESSION['usertype'] == 'admin'): ?>
                    <a href="adminhome.php" class="back-button">← Back to Dashboard</a>
                <?php elseif($_SESSION['usertype'] == 'student'): ?>
                    <a href="studenthome.php" class="back-button">← Back to Dashboard</a>
                <?php endif; ?>
                
                <!-- Logout button -->
                <a href="logout.php" class="logout-button">Logout</a>
            <?php else: ?>
                <!-- Not logged in - show home button -->
                <a href="../index.php" class="back-button">← Back to Home</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>