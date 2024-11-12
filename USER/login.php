<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement to fetch the user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify user credentials
    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id']; // Store user ID in session
        $_SESSION['username'] = $user['username']; // Store username in session
        
        // Redirect to the home page
        header('Location: home.php');
        exit(); // Stop further execution after redirect
    } else {
        $error = "Invalid username or password."; // Error message
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        body {
            font-size: 30px;
            font-style: italic;
            background: url(login_img.avif);
            background-position: center;
            background-repeat: no-repeat;
            background-size: 1500px 900px;
        }
        input {
            font-size: 30px;
            font-style: italic;
        }
        center {
            margin: 50px;
            background-color: #ffffff;
            border: 1px solid black;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img style="height: 60px; width: auto; border-radius: 50%; border: 12px; float: left;" src="download.jfif">
    </div>
    <center>
        <br><br>
        <h2>Login</h2>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p> <!-- Link to register page -->
    </center>
</body>
</html>