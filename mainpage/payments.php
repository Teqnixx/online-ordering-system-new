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
        <div class="payments-container">
            <div class="payments">
                <div class="sidebar-container">
                    <?php include('../templates/sidebar.php'); ?>
                </div>
                <div class="personal-payments-container">
                    <div class="payments-title">
                        <h1>My Payments</h1>
                        <hr class="payments-line">
                    </div>
                    <div class="payments-list">
                        <div class="payment">
                            <div class="payment-details">
                                <h2>Payment 1</h2>
                                <br>
                                <p>Card Holder Name: Allen Jamison B. Mendoza</p>
                                <p>Credit Card: American Express</p>
                            </div>
                            <div class="payment-actions">
                                <a href="" id="edit-payment">Edit</a>
                            </div>
                        </div>
                        <div class="payment">
                            <div class="payment-details">
                                <h2>Payment 2</h2>
                                <br>
                                <p>Card Holder Name: Allen Jamison B. Mendoza</p>
                                <p>Credit Card: Master Card</p>
                            </div>
                            <div class="payment-actions">
                                <a href="" id="edit-payment">Edit</a>
                            </div>
                        </div>
                        <div class="payment">
                            <div class="payment-details">
                                <h2>Payment 3</h2>
                                <br>
                                <p>Card Holder Name: Allen Jamison B. Mendoza</p>
                                <p>Credit Card: GCash</p>
                            </div>
                            <div class="payment-actions">
                                <a href="" id="edit-payment">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>