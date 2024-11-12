<?php
session_start();
include('db_connection.php'); // Your database connection

// Ensure admin is logged in
if (!isset($_SESSION['admin_username'])) {
    header('Location: admin_login.php');
    exit();
}

// Check if cake ID is provided in the URL
if (!isset($_GET['id'])) {
    header('Location: manage_cakes.php'); // Redirect back if no ID is provided
    exit();
}

$cake_id = $_GET['id'];

// Fetch the current details of the cake
$sql = "SELECT * FROM cakes WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $cake_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$cake = mysqli_fetch_assoc($result);

// If the cake is not found, redirect back to the manage cakes page
if (!$cake) {
    header('Location: manage_cakes.php');
    exit();
}

// Handle form submission for updating the cake details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Update the cake details in the database
    $update_sql = "UPDATE cakes SET name = ?, price = ? WHERE id = ?";
    $update_stmt = mysqli_prepare($conn, $update_sql);
    mysqli_stmt_bind_param($update_stmt, 'sdi', $name, $price, $cake_id);

    if (mysqli_stmt_execute($update_stmt)) {
        header('Location: manage_cakes.php'); // Redirect back to the manage cakes page after successful update
        exit();
    } else {
        echo "Error updating cake: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Cake</title>
    <link rel="stylesheet" href="styles.css"> <!-- Your CSS file -->
    <style>
        body {
            background-image: url('malay.jpg');
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .back-link {
            margin-top: 20px;
            display: block;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Cake</h1>
    <form method="POST" action="">
        <label for="name">Cake Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($cake['name']); ?>" required>

        <label for="price">Price (₹):</label>
        <input type="number" step="0.01" id="price" name="price" value="<?php echo $cake['price']; ?>" required>

        <input type="submit" value="Save Changes">
    </form>

    <a href="manage_cakes.php" class="back-link">Go Back to Manage Cakes</a>
</div>

</body>
</html>
