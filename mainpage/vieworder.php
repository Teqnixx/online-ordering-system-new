<?php

    session_start();

    require('../db_conn.php');

    if(isset($_POST['view-order-button'])){
        $orderID = $_POST['id-to-view'];

        $getOrderDetailSQL = "SELECT * FROM view_order_details WHERE orderID = '$orderID'";
        $getGrandTotal = "SELECT SUM(productSubTotal) AS grandTotal FROM view_order_details WHERE orderID = $orderID GROUP BY orderID";
        $getOrderDetail = "SELECT * FROM view_single_order WHERE orderID = $orderID";

        $orderDetails = mysqli_fetch_assoc(mysqli_query($conn, $getOrderDetailSQL));
        $orderItem = mysqli_query($conn, $getOrderDetailSQL);
        $grandTotal = mysqli_fetch_assoc(mysqli_query($conn, $getGrandTotal));
        $orderDetail = mysqli_fetch_assoc(mysqli_query($conn, $getOrderDetail));
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">
    <title>Order</title>
</head>
<body>
    
    <div class="wrapper">
        <?php include('../templates/navbar.php') ?>
        <div class="view-order-container">
            <div class="view-orders">
                <div class="sidebar-container">
                    <?php include('../templates/sidebar.php'); ?>
                </div>
                <div class="personal-view-orders-container">
                    <div class="view-order-title">
                        <h1>Order Details</h1>
                        <hr class="view-order-line">
                    </div>
                    <h2 class="order-detail-title">Order ID: #<?php echo $orderDetails['orderID'] ?></h2>
                    <div class="view-order-details">
                        <div>
                            <p>Items: </p>
                            <ul class="order-detail-items">
                                <?php foreach($orderItem as $item): ?>
                                    <li class="order-item"><?php echo "₱ ".$item['productSubTotal']." - ".$item['orderDescription']." - ".$item['quantity']." pc(s)" ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <br>
                            <p><?php echo "Total: ₱ ".$grandTotal['grandTotal'] ?></p>
                        </div>
                        <div>
                            <p>Order Info: </p>
                            <br>
                            <p><b><?php echo $orderDetail['fullName'] ?></b></p>
                                <br>
                                <p><?php echo $orderDetail['contactNo'] ?></p>
                                <p><?php echo $orderDetail['address1'] ?></p>
                                <p><?php echo $orderDetail['address2'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>