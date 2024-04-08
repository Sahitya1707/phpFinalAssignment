<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <h1>Login</h1>
    <div class="container">
        <form action="login_process.php" method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
          <div class="error-message">
            <?php
            // Display error message if provided in URL query string
            if (isset($_GET['error']) && $_GET['error'] == 1) {
                echo 'Incorrect username or password.';
            }
            ?>
        </div>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>
