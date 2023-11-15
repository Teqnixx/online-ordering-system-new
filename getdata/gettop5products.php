<?php

    require('../db_conn.php');

    $sql = "SELECT * FROM view_top5_products";
    
    $data = mysqli_fetch_all(mysqli_query($conn, $sql));

    echo json_encode($data);

?>