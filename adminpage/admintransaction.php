<?php

    require('../db_conn.php');

    $getOrdersSQL = "SELECT * FROM view_orders ORDER BY DAY(orderDate) ASC";

    $orders = mysqli_query($conn, $getOrdersSQL);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Admin</title>
</head>
<body>

    <div class="wrapper">
        <?php include('adminsidebar.php') ?>
        <div class="admin-transaction-container">
            <div class="order-history-container">
                <table class="order-history-table table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th id="orderID">Order ID</th>
                            <th id="orderDate">Order Date</th>
                            <th id="orderStatus">Status</th>
                            <th id="orderActions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>