<?php
session_start();
include('db_connection.php'); // Your database connection

// Ensure admin is logged in
if (!isset($_SESSION['admin_username'])) {
    header('Location: admin_login.php');
    exit();
}

// Fetch all cakes from the database
$sql = "SELECT * FROM cakes";
$result = mysqli_query($conn, $sql);

// Handle deletion of a cake
if (isset($_GET['delete'])) {
    $cake_id = $_GET['delete'];
    $delete_sql = "DELETE FROM cakes WHERE id = '$cake_id'";
    mysqli_query($conn, $delete_sql);
    header('Location: manage_cakes.php'); // Redirect to avoid form resubmission
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Cakes</title>
    <link rel="stylesheet" href="styles.css"> <!-- Your CSS file -->
    <style>
        body {
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .add-cake {
            display: inline-block;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .add-cake:hover {
            background-color: #0056b3;
        }
        .delete {
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Manage Cakes</h1>
    <a href="add_cake.php" class="add-cake">Add New Cake</a>

    <!-- Cake list -->
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td>₹<?php echo $row['price']; ?></td>
                <td>
                    <a href="edit_cake.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="manage_cakes.php?delete=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this cake?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
