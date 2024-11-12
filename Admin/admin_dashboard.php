<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_username'])) { // Check for the username session variable
    header('Location: admin_login.php');
    exit();
}

// Welcome message
$username = $_SESSION['admin_username']; // Use the stored username
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Cake Shop</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        body {
            background-image: url('malay.jpg');
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        .options {
            list-style-type: none;
            padding: 0;
        }
        .options li {
            margin: 10px 0;
        }
        .options a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .options a:hover {
            text-decoration: underline;
        }
        .logout {
            margin-top: 20px;
        }
        .logout a {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome to the Admin Dashboard, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>Here are your options:</p>
    <ul class="options">
        <li><a href="view_orders.php">View Orders</a></li>
        <li><a href="manage_cakes.php">Manage Cakes</a></li>
        <li><a href="view_users.php">View Users</a></li>
    </ul>
    <div class="logout">
        <a href="admin_logout.php">Logout</a>
    </div>
</div>

</body>
</html>
