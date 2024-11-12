<?php
session_start();
include('db_connection.php'); // Include your database connection file

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch cakes from the database for the dropdown
$sql = "SELECT * FROM cakes LIMIT 6 OFFSET 54"; // Adjust the LIMIT/OFFSET to your needs
$result = mysqli_query($conn, $sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cake_id = $_POST['cake_id'];
    $user_id = $_SESSION['user_id']; // Capture the user ID from the session

    // Insert order into the orders table, including user_id
    $insert_order_sql = "INSERT INTO orders (cake_id, user_id) VALUES ('$cake_id', '$user_id')";
    if (mysqli_query($conn, $insert_order_sql)) {
        // Use JavaScript to display an alert and then redirect after a short delay
        echo "<script>
                alert('Order placed successfully!');
                setTimeout(function() {
                    window.location.href = 'cart.php';
                }, 1000); // 1-second delay before redirecting to cart.php
              </script>";
    } else {
        echo "Error: " . $insert_order_sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="place_order.css">
    <title>Red ribbon birthday cake</title>
</head>
<body>
<div class="content-wrapper">
    <!-- Left side: Cake Image and Details -->
    <div class="left-column">
        <img src="bd2.jpg" alt="Red ribbon birthday cake">
        <p>Red ribbon birthday cake<br>
        <strong style="color: green;">Available</strong></p>
    </div>
    <!-- Right side: Order Form -->
    <div class="right-column">
        <form method="POST" action="">
            <label for="cake_id">Weight and price:</label>
            <select name="cake_id" id="cake_id" required>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <option value="<?php echo $row['id']; ?>">
                        <?php echo $row['name']; ?> - ₹<?php echo $row['price']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <input type="submit" value="Add to Cart">
        </form>
        <div class="links">
            Go to <a href="home.php">Home</a><br>
            Go to <a href="cart.php">My cart</a>
        </div>
    </div>
</div>
</body>
</html>
