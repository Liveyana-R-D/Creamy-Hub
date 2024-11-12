<?php
session_start();
include('db_connection.php'); // Your database connection

// Ensure admin is logged in
if (!isset($_SESSION['admin_username'])) {
    header('Location: admin_login.php');
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Insert the new cake into the database
    $sql = "INSERT INTO cakes (name, price) VALUES ('$name', '$price')";
    if (mysqli_query($conn, $sql)) {
        header('Location: manage_cakes.php'); // Redirect to manage cakes page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cake</title>
    <link rel="stylesheet" href="styles.css"> <!-- Your CSS file -->
    <style type="text/css">
        body {
            background-image: url('malay.jpg');
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #343a40;
        }
    </style>
</head>
<body>
<center>
<div class="login-container">
    <h1>Add a New Cake</h1>
    <form method="POST" action="">
        <label for="name">Cake Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" required><br>

        <input type="submit" value="Add Cake">
    </form>
</div>
</center>
</body>
</html>
