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
    <title>Cart</title>
</head>
<body>
    
    <div class="wrapper">
        <?php include('../templates/navbar.php'); ?>
        <div class="cart-container">
            <h1>Cart</h1>
            <div class="cart-contents">
                <div class="cart-item">
                    
                </div>
            </div>
        </div>
    </div>

</body>
</html>