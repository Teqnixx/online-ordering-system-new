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
        <div class="address-container">
            <div class="address">
                <div class="sidebar-container">
                    <?php include('../templates/sidebar.php'); ?>
                </div>
                <div class="personal-address-container">
                    <div class="address-title">
                        <h1>Address</h1>
                    </div>
                    <div class="address-list">

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>