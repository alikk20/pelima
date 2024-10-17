<?php
session_start();
?>

<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body login>
    <div class="logo-container">
        <img src="image/WhatsApp_Image_2024-10-08_at_5.36.56_PM-removebg-preview.png" alt="Laravel logo" class="logo">
    </div>
    <div class="login-container">
        <h1>Login</h1>
        <form action="/proses/login.php" method="POST">
        <input type="text" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="passwd" required>
        <div class="forgot-password">
            <a href="#">Forgot your password?</a>
        </div>
        <button type='submit' class="login-button">Login</button>
        <div class="register">
            Not a member? <a href="role.php">register</a>
        </div>
        </form>
    </div>
</body login>
</html>