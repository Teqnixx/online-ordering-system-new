<?php

    require('../db_conn.php');

    $productID = $_POST['productID'];
    $stock = $_POST['stock'];

    $addStockSQL = "INSERT INTO `inventory_report` (`inventoryReportID`, `stockIn`, `stockOut`, `date`, `productID`) VALUES (NULL, '$stock', '0', '2023-11-25', '$productID')";

    mysqli_query($conn, $addStockSQL);