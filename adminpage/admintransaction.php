<?php

    require('../db_conn.php');

    $getOrdersSQL = "SELECT * FROM view_orders";

    $orders = mysqli_query($conn, $getOrdersSQL);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Admin</title>
</head>
<body>

    <div class="wrapper">
        <?php include('adminsidebar.php') ?>
        <div class="admin-transaction-container">
            <h1>Order History</h1>
            <div class="order-history-container">
                <table class="order-history-table">
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['orderID']; ?></td>
                            <td><?php echo $order['orderDate']; ?></td>
                            <td><?php echo $order['status']; ?></td>
                            <td>
                                <form action="vieworder.php" method="POST">
                                    <input type="hidden" name="id-to-view" value="<?php echo $order['orderID'] ?>">
                                    <button id="view-button" name="view-order-button">View</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</body>
</html>