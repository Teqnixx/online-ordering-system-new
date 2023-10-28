<?php

    session_start();

    require('../db_conn.php');

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
                    <h2 class="order-detail-title">Order 1</h2>
                    <div class="view-order-details">
                        <div>
                            <p>Items: </p>
                            <ul class="order-detail-items">
                                <li class="order-item">₱ 110 - Classic Burger - 1pc(s)</li>
                                <li class="order-item">₱ 99 - Sizzling Tapa - 1pc(s)</li>
                                <li class="order-item">₱ 115 - 3pcs Wings w/ Fries - 1pc(s)</li>
                                <li class="order-item">₱ 80 - Cheesy Nachos  - 1pc(s)</li>
                                <li class="order-item">₱ 89 - Dark Choco 22oz - 1pc(s)</li>
                            </ul>
                            <br>
                            <p>Total: ₱ 493</p>
                        </div>
                        <div>
                            <p>Order Info: </p>
                            <br>
                            <p><b>Allen Jamison B. Mendoza</b></p>
                                <br>
                                <p>09876543219</p>
                                <p>Brgy. Talangan Barcelon subd.</p>
                                <p>Talangan, Nasugbu, Batangas, South Luzon, 4231</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>