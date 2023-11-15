<?php

    require('../db_conn.php');

    session_start();

    $deliveryAddressID = $_POST['id-to-update'];
    
    if(isset($_POST['save-address-button'])){
        $id = $_SESSION['id'];
        $name = $_POST['receiver-name-field'];
        $email = $_POST['email-field'];
        $contactNo = "+63".$_POST['contactno-field'];
        $address1 = $_POST['address1-field'];
        $address2 = $_POST['address2-field'];

        if(!empty($name) && !empty($email) && !empty($contactNo) && !empty($address1) && !empty($address2)){
            $sql = "UPDATE delivery_addresses 
                    SET fullname = '$name',
                        contactNo = '$contactNo',
                        email = '$email',
                        address1 = '$address1',
                        address2 = '$address2'
                    WHERE deliveryAddressID = $deliveryAddressID";
        
            mysqli_query($conn, $sql);

            header('Location: address.php');
        }

    }

    $getDeliveryAddressSQL= "SELECT * FROM delivery_addresses WHERE deliveryAddressID = $deliveryAddressID";

    $address = mysqli_fetch_assoc(mysqli_query($conn, $getDeliveryAddressSQL));

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
        <div class="edit-address-container">
            <div class="edit-address">
                <div class="sidebar-container">
                    <?php include('../templates/sidebar.php'); ?>
                </div>
                <div class="personal-edit-address-container">
                    <div class="edit-address-title">
                        <h1>Edit Address</h1>
                    </div>
                    <hr class="edit-address-line">
                    <div class="edit-address-fields">
                        <form action="" method="POST">
                                <p>Receiver Name:</p>
                                <input class="add-address-fields" type="text" name="receiver-name-field" autocomplete="off" placeholder="Receiver Name" value="<?php echo $address['fullName'] ?>">
                                <br>
                                <br>
                                <p>Contact No: (+63)</p>
                                <input class="add-address-fields" maxlength="10" type="text" name="contactno-field" autocomplete="off" placeholder="Contact No" value="<?php echo substr($address['contactNo'], 3) ?>">
                                <br>
                                <br>
                                <p>Email:</p>
                                <input class="add-address-fields" type="text" name="email-field" autocomplete="off" placeholder="Email" value="<?php echo $address['email'] ?>">
                                <br>
                                <br>
                                <p>Address Line 1:</p>
                                <input class="add-address-fields" type="text" name="address1-field" autocomplete="off" placeholder="Address Line 1" value="<?php echo $address['address1'] ?>">
                                <br>
                                <br>
                                <p>Address Line 2:</p>
                                <input class="add-address-fields" type="text" name="address2-field" autocomplete="off" placeholder="Address Line 2" value="<?php echo $address['address2'] ?>">
                                <br>
                                <br>
                                <div class="add-payment-action-buttons">
                                    <input type="hidden" name="id-to-update" value="<?php echo $deliveryAddressID ?>">
                                    <button type="submit" name="save-address-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                            <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M14 4l0 4l-6 0l0 -4"></path>
                                        </svg>
                                        Save Changes
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