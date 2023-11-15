<?php

    require('../db_conn.php');

    session_start();

    if(isset($_POST['back-address-button'])){
        header('Location: address.php');
    }

    if(isset($_POST['insert-address-button'])){
        $id = $_SESSION['id'];
        $name = $_POST['receiver-name-field'];
        $email = $_POST['email-field'];
        $contactNo = "+63".$_POST['contactno-field'];
        $address1 = $_POST['address1-field'];
        $address2 = $_POST['address2-field'];

        if(!empty($name) && !empty($email) && !empty($contactNo) && !empty($address1) && !empty($address2)){

            $sql = "INSERT INTO delivery_addresses(fullName, email, contactNo, address1, address2, userID)
            VALUES('$name', '$email', '$contactNo', '$address1', '$address2', '$id')";

            mysqli_query($conn, $sql);

            header('Location: address.php');
        }
    }
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
                        <h1>Add Address</h1>
                        <form action="" method="POST">
                            <button type="submit" name="back-address-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l14 0"></path>
                                    <path d="M5 12l6 6"></path>
                                    <path d="M5 12l6 -6"></path>
                                </svg>
                                Back
                            </button>
                        </form>
                    </div>
                    <hr class="address-line">
                    <div class="address-fields">
                        <form action="" method="POST">
                            <p>Receiver Name:</p>
                            <input class="add-address-fields" type="text" name="receiver-name-field" autocomplete="off" placeholder="Receiver Name">
                            <br>
                            <br>
                            <p>Contact No: (+63)</p>
                            <input class="add-address-fields" maxlength="10" type="text" name="contactno-field" autocomplete="off" placeholder="Contact No">
                            <br>
                            <br>
                            <p>Email:</p>
                            <input class="add-address-fields" type="text" name="email-field" autocomplete="off" placeholder="Email">
                            <br>
                            <br>
                            <p>Address Line 1:</p>
                            <input class="add-address-fields" type="text" name="address1-field" autocomplete="off" placeholder="Address Line 1">
                            <br>
                            <br>
                            <p>Address Line 2:</p>
                            <input class="add-address-fields" type="text" name="address2-field" autocomplete="off" placeholder="Address Line 2">
                            <br>
                            <br>
                            <div class="add-payment-action-buttons">
                                <button type="submit" name="insert-address-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 5l0 14"></path>
                                        <path d="M5 12l14 0"></path>
                                    </svg>
                                    Add Address
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>