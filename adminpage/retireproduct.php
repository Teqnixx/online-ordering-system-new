<?php

    require('../db_conn.php');

    $productID = $_POST['id'];

    $retireSQL = "UPDATE products SET status = 'Retired' WHERE productID = $productID";

    mysqli_query($conn, $retireSQL);