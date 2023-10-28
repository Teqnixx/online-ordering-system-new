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
                        <h1>My Address</h1>
                        <hr class="address-line">
                    </div>
                    <div class="address-list">
                        <div class="receiver-info">
                            <div class="receiver-address">
                                <p><b>Allen Jamison B. Mendoza</b></p>
                                <br>
                                <p>09876543219</p>
                                <p>Brgy. Talangan Barcelon subd.</p>
                                <p>Talangan, Nasugbu, Batangas, South Luzon, 4231</p>
                            </div>
                            <div class="address-action-buttons">
                                <a href="editaddress.php" id="address-edit">Edit</a>
                            </div>
                        </div>
                        <hr class="address-line">
                        <div class="receiver-info">
                            <div class="receiver-address">
                                <p><b>Jherico Lundag</b></p>
                                <br>
                                <p>09876543219</p>
                                <p>Brgy. Pantalan</p>
                                <p>Pantalan, Nasugbu, Batangas, South Luzon, 4231</p>
                            </div>
                            <div class="address-action-buttons">
                                <a href="editaddress.php" id="address-edit">Edit</a>
                            </div>
                        </div>
                        <hr class="address-line">
                        <div class="receiver-info">
                            <div class="receiver-address">
                                <p><b>Jazmine Revilla</b></p>
                                <br>
                                <p>09876543219</p>
                                <p>Brgy. Talangan, Paradise Street</p>
                                <p>Talangan, Nasugbu, Batangas, South Luzon, 4231</p>
                            </div>
                            <div class="address-action-buttons">
                                <a href="editaddress.php" id="address-edit">Edit</a>
                            </div>
                        </div>
                        <hr class="address-line">
                        <div class="receiver-info">
                            <div class="receiver-address">
                                <p><b>Jemuel Liwanag</b></p>
                                <br>
                                <p>09876543219</p>
                                <p>Brgy. Balaytigue.</p>
                                <p>Balaytigue, Nasugbu, Batangas, South Luzon, 4231</p>
                            </div>
                            <div class="address-action-buttons">
                                <a href="editaddress.php" id="address-edit">Edit</a>
                            </div>
                        </div>
                        <hr class="address-line">
                        <div class="receiver-info">
                            <div class="receiver-address">
                                <p><b>Jay Nior Cartagenas</b></p>
                                <br>
                                <p>09876543219</p>
                                <p>Brgy. Wawa</p>
                                <p>Wawa, Nasugbu, Batangas, South Luzon, 4231</p>
                            </div>
                            <div class="address-action-buttons">
                                <a href="editaddress.php" id="address-edit">Edit</a>
                            </div>
                        </div>
                        <hr class="address-line">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>