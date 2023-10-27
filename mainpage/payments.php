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
                        <h1>Payments</h1>
                    </div>
                    <div class="payments-list">

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>