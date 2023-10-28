<?php

    session_start();

    require('../db_conn.php');

    $id = $_SESSION['id'];

    $getUserProfileSQL = "SELECT * FROM view_user_profile WHERE userID = $id";

    $userProfile = mysqli_fetch_assoc(mysqli_query($conn, $getUserProfileSQL));

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
                        <hr class="orders-line">
                    </div>
                    <div class="orders-list">
                        <div class="order">
                            <div class="order-details">
                                <h2>Order 1</h2>
                                <a href="vieworder.php" id="view-order">
                                    View Order
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="order-status">
                                Delivered by October 20, 2023
                            </div>
                        </div>
                        <hr class="orders-line">
                        <div class="order">
                            <div class="order-details">
                                <h2>Order 2</h2>
                                <a href="vieworder.php" id="view-order">
                                    View Order
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="order-status">
                                Delivered by October 23, 2023
                            </div>
                        </div>
                        <hr class="orders-line">
                        <div class="order">
                            <div class="order-details">
                                <h2>Order 3</h2>
                                <a href="vieworder.php" id="view-order">
                                    View Order
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="order-status">
                                Delivered by October 25, 2023
                            </div>
                        </div>
                        <hr class="orders-line">
                        <div class="order">
                            <div class="order-details">
                                <h2>Order 4</h2>
                                <a href="vieworder.php" id="view-order">
                                    View Order
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="order-status">
                                Out for Delivery
                            </div>
                        </div>
                        <hr class="orders-line">
                        <div class="order">
                            <div class="order-details">
                                <h2>Order 5</h2>
                                <a href="vieworder.php" id="view-order">
                                    View Order
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="order-status">
                                Preparing Order
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>