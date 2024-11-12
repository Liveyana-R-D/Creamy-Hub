<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login if user is not logged in
    exit();
}
?>

<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <p>You are now logged in.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
