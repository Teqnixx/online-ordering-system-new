<?php

    session_start();

    require('../db_conn.php');

    $id = $_SESSION['id'];

    $getUserProfileSQL = "SELECT * FROM view_user_profile WHERE userID = $id";
    $getOrdersSQL = "SELECT * FROM orders WHERE userID = '$id'";

    $userProfile = mysqli_fetch_assoc(mysqli_query($conn, $getUserProfileSQL));
    $orders = mysqli_query($conn, $getOrdersSQL);

    if(isset($_POST['view-order-button'])){
        header('Location: vieworder.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">
    <title>Profile</title>
</head>
<body>

    <div class="wrapper">
        <?php include('../templates/navbar.php'); ?>
        <div class="orders-container">
            <div class="orders">
                <div class="sidebar-container">
                    <?php include('../templates/sidebar.php'); ?>
                </div>
                <div class="personal-orders-container">
                    <div class="orders-title">
                        <h1>Orders</h1>
                    </div>
                    <hr class="orders-line">
                    <div class="orders-list">
                        <?php foreach($orders as $order): ?>
                        <div>
                            <div class="order">
                                <div class="order-details">
                                    <h2>Order ID: <?php echo $order['orderID'] ?></h2>
                                    <form action="vieworder.php" method="POST">
                                        <input type="hidden" name="id-to-view" value="<?php echo $order['orderID']; ?>">
                                        <button type="submit" name="view-order-button" id="view-order">
                                            View Order
                                            <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="order-status">
                                    <p>Order Date: <?php echo $order['orderDate'] ?></p>
                                    <p><?php echo $order['status'] ?></p>
                                </div>
                            </div>
                            <hr class="orders-line">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>