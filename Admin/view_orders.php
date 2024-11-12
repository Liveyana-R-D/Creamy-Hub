<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_username'])) {
    header('Location: admin_login.php');
    exit();
}

// Include database connection
include('db_connection.php');

// Initialize variables for report type and orders
$report_type = '';
$orders = [];

// Handle order delivery status update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    $update_sql = "UPDATE orders SET status = 'delivered' WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("i", $order_id);
    $update_stmt->execute();
    header("Location: view_orders.php"); // Refresh the page
}

// Check if the report type is set
if (isset($_POST['report_type'])) {
    $report_type = $_POST['report_type'];
    
    // Fetch orders based on the selected report type
    if ($report_type === 'weekly') {
        $sql = "
            SELECT orders.id AS order_id, cakes.name AS cake_name, cakes.price AS cake_price, 
                   orders.order_date, users.username AS user_name, orders.status
            FROM orders
            JOIN cakes ON orders.cake_id = cakes.id
            JOIN users ON orders.user_id = users.id
            WHERE orders.order_date >= NOW() - INTERVAL 7 DAY
        ";
    } else if ($report_type === 'monthly') {
        $sql = "
            SELECT orders.id AS order_id, cakes.name AS cake_name, cakes.price AS cake_price, 
                   orders.order_date, users.username AS user_name, orders.status
            FROM orders
            JOIN cakes ON orders.cake_id = cakes.id
            JOIN users ON orders.user_id = users.id
            WHERE orders.order_date >= NOW() - INTERVAL 1 MONTH
        ";
    }

    $result = mysqli_query($conn, $sql);

    // Check for errors
    if (!$result) {
        die("Database query failed: " . mysqli_error($conn));
    }

    // Fetch all orders
    while ($order = mysqli_fetch_assoc($result)) {
        $orders[] = $order;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders - Cake Shop</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
        body {
            background-image: url('malay.jpg');
            font-family: Arial, sans-serif;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .logout {
            margin-top: 20px;
        }
        .logout a {
            color: red;
            font-weight: bold;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>View Orders</h1>

    <form method="POST" action="">
        <label for="report_type">Select Report Type:</label>
        <select name="report_type" id="report_type" required>
            <option value="" disabled selected>Select...</option>
            <option value="weekly">Weekly Report</option>
            <option value="monthly">Monthly Report</option>
        </select>
        <input type="submit" value="Generate Report">
    </form>

    <?php if (!empty($orders)): ?>
        <div id="bill-content">
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Cake Name</th>
                        <th>Price</th>
                        <th>User</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                            <td><?php echo htmlspecialchars($order['cake_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['cake_price']); ?></td>
                            <td><?php echo htmlspecialchars($order['user_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                            <td><?php echo htmlspecialchars($order['status'] ? $order['status'] : 'Pending'); ?></td>
                            <td>
                                <?php if ($order['status'] != 'delivered'): ?>
                                    <form method="POST" action="">
                                        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                                        <input type="submit" value="Mark as Delivered">
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <button onclick="downloadBill()">Download <?php echo ucfirst($report_type); ?> Report</button>
    <?php endif; ?>

    <div class="logout">
        <a href="admin_logout.php">Logout</a>
    </div>
</div>

<script>
    function downloadBill() {
        const element = document.getElementById('bill-content');
        html2pdf().from(element).save('<?php echo $report_type; ?>-orders-report.pdf');
    }
</script>

</body>
</html>
