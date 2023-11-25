<?php

    require('../db_conn.php');

    $productID = $_POST['id'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];
    $productType = $_POST['type'];
    $productCategory = $_POST['category'];

    $updateProductSQL = "UPDATE products SET productName = '$productName', productPrice = '$productPrice', productTypeID = '$productType', categoryID = '$productCategory' WHERE productID = $productID";

    mysqli_query($conn, $updateProductSQL);