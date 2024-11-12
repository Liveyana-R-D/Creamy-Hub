<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (!empty($username) && !empty($password)) {
        // Check if the username already exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Username already taken. Please choose a different one.";
        } else {
            // Insert new user
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            
            if ($stmt->execute()) {
                echo "Registration successful!";
                // Redirect to login page after successful registration
                header('Location: login.php');
                exit(); // Important to stop further execution
            } else {
                echo "Registration failed.";
            }
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>

<html>
<head>
    <style type="text/css">
        body {
            font-size: 30px;
            font-style: italic;
            background: url(image1.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: 1500px 900px;
        }
        input {
            font-size: 30px;
            font-style: italic;
        }
        center {
            margin: 60px;
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
        <h2>Register</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Register">
        </form>
    </center>
</body>
</html>
