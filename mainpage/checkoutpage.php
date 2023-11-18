<?php

    session_start();

    require('../db_conn.php');   

    if(isset($_POST['checkout-button'])){
        unset($_SESSION['items']);
        $orderId =  $_SESSION['id'];
        //$sql = "CALL insert_order($orderId)";
        //$conn->query($sql);

        //$stmt = $conn->prepare("CALL insert_order_details(?, ? , ?, ?, ?)");

        // foreach($_SESSION['orderDetails']  as $productID => $dataArray){
        //         $types = str_repeat('i', 5);  
        //         $stmt->bind_param($types, ...array_values($dataArray));
        //         $stmt->execute();
        //         unset($_SESSION['orderDetails'][$productID]);        
        // }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">
    <title>Check Out</title>
</head>
<body>
    
    <div class="wrapper">
        <?php include('../templates/navbar.php') ?>
        <div class="cart-container">

        </div>
    </div>

</body>
</html>