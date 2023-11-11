<?php

    session_start();

    require('../db_conn.php');

    // if(isset($_POST['add-to-cart-button'])){
    //     if(!isset($_SESSION['items'])){
    //         $_SESSION['items'] = array();
    //     }

    //     $productID = $_POST['product-id'];

    //     $_SESSION['items'][$productID] = array();
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">
    <title>Home</title>
</head>
<body>
    
    <div class="wrapper">
        <?php include('../templates/navbar.php'); ?>
        <div class="landing-page-container">
            <div class="slogan">

            </div>
            <div class="image-container">
                <img class="wings-graphic" src="../images/wings-graphic.jpg" alt="">
            </div>
        </div>
    </div>

</body>
</html>