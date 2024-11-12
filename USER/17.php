<?php
session_start();
include('db_connection.php'); // Include your database connection file

// Redirect to login if user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Fetch cakes from the database for the dropdown
$sql = "SELECT * FROM cakes WHERE id=900"; // Adjust the LIMIT/OFFSET to your needs
$result = mysqli_query($conn, $sql);

// Check if any cakes are available
$cakes_available = mysqli_num_rows($result) > 0; // True if cakes exist, false otherwise

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cake_id = $_POST['cake_id'];

    // Insert order into the orders table if cakes are available
    if ($cakes_available) {
        $insert_order_sql = "INSERT INTO orders (cake_id) VALUES ('$cake_id')";
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
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="place_order.css">
    <title>Strawberry cupcakes</title>
</head>
<body>
<div class="content-wrapper">
    <!-- Left side: Cake Image and Details -->
    <div class="left-column">
        <img src="cc3.jfif" alt="Strawberry cupcakes">
        <p>Strawberry cupcakes<br>
        <?php if ($cakes_available): ?>
            <strong style="color: green;">Available</strong>
        <?php else: ?>
            <strong style="color: red;">Not Available</strong>
        <?php endif; ?>
        </p>
    </div>
    <!-- Right side: Order Form -->
    <div class="right-column">
        <form method="POST" action="">
            <label for="cake_id">Quantity and price:</label>
            <select name="cake_id" id="cake_id" required <?php if (!$cakes_available) echo 'disabled'; ?>>
                <?php if ($cakes_available): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <option value="<?php echo $row['id']; ?>">
                            <?php echo $row['name']; ?> - ₹<?php echo $row['price']; ?>
                        </option>
                    <?php endwhile; ?>
                <?php else: ?>
                    <option>No cakes available</option>
                <?php endif; ?>
            </select>
            <input type="submit" value="Add to Cart" <?php if (!$cakes_available) echo 'disabled'; ?>>
        </form>
        <div class="links">
            Go to <a href="home.php">Home</a><br>
            Go to <a href="cart.php">My cart</a>
        </div>
    </div>
</div>
</body>
</html>