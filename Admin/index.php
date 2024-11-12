<?php
session_start();
var_dump($_SESSION); // Debugging output


// Redirect to admin login page if not logged in
if (!isset($_SESSION['admin_username'])) {
    header('Location: admin_login.php'); // Change to the correct path if necessary
    exit();
}

// If already logged in, redirect to admin dashboard
header('Location: admin_dashboard.php'); // Change to your desired landing page
exit();
?>
