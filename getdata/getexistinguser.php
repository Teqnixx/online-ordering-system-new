<?php

    require('../db_conn.php');

    $username = $_POST['username'];

    $sql = "SELECT * FROM users WHERE username = '$username'";

    $data = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    if(empty($data["userID"])){
        echo json_encode("Proceed");
    }else {
        echo json_encode("Existing");
    }