<?php
session_start();
include('db_connection.php');

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) { 
    header('Location: login.php');
    exit();
}

// Fetch user's name from session
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id']; 

// Fetch orders from the database for the logged-in user
$sql = "SELECT orders.id, cakes.name, cakes.price, orders.order_date, orders.status
        FROM orders 
        JOIN cakes ON orders.cake_id = cakes.id
        WHERE orders.user_id = ?
        ORDER BY orders.id ASC"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch grand total for undelivered orders
$sql_grand_total = "SELECT SUM(cakes.price) AS grand_total
                    FROM orders 
                    JOIN cakes ON orders.cake_id = cakes.id
                    WHERE orders.user_id = ? AND orders.status != 'Delivered'";
$stmt_total = $conn->prepare($sql_grand_total);
$stmt_total->bind_param("i", $user_id);
$stmt_total->execute();
$result_grand_total = $stmt_total->get_result();
$grand_total_row = $result_grand_total->fetch_assoc();
$grand_total = $grand_total_row['grand_total'] ? $grand_total_row['grand_total'] : 0; // Handle no orders case
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
        body {
            background: url(dora.jpg) no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: cursive;
            font-size: 16px;
        }
        img {
            width: 300px;
            height: auto;
        }
        .center {
            margin: 30px;
            background-color: #ffffff;
            border: 1px solid black;
            opacity: 0.9;
            padding: 20px;
            border-radius: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
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
    <div class="logo">
        <img style="height: 60px; width: auto; border-radius: 50%; border: 12px; float: left;" src="download.jfif">
        <center style="font-size: 50px; color: brown; text-shadow: 4px 4px 8px bisque;">My Orders!</center>
    </div>
    <center class="center">
        <h1>Order Details</h1>
        <div id="bill-content">
            <h2>Customer Name: <?php echo htmlspecialchars($username); ?></h2>
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Cake Name</th>
                    <th>Order Date</th>
                    <th>Price ₹</th>
                    <th>Status</th>
                </tr>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['price']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td> <!-- Display status here -->
                    </tr>
                <?php endwhile; ?>
                <tr>
                    <td colspan="3"><strong>Grand Total ₹</strong></td>
                    <td><strong><?php echo htmlspecialchars($grand_total); ?></strong></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <button onclick="downloadBill()">Download Bill</button>
        <script>
            function downloadBill() {
                const element = document.getElementById('bill-content');
                html2pdf().from(element).save('order-bill.pdf');
            }
        </script>
        <br><a href="home.php">Home</a>
    </center>
</body>
</html>
