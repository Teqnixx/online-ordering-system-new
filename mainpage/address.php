<?php

    session_start();

    require('../db_conn.php');

    if(isset($_POST['add-address-button'])){
        header('Location: addaddress.php');
    }

    $id = $_SESSION['id'];

    $getUserProfileSQL = "SELECT * FROM view_user_profile WHERE userID = $id";
    $getAddress = "SELECT * FROM delivery_addresses WHERE userID = $id";

    $userProfile = mysqli_fetch_assoc(mysqli_query($conn, $getUserProfileSQL));
    $address = mysqli_query($conn, $getAddress);

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
                        <h1>My Address</h1>
                        <form action="" method="POST">
                            <button type="submit" name="add-address-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                Add Address
                            </button>
                        </form>
                    </div>
                    <hr class="address-line">
                    <div class="address-list">
                        <?php foreach($address as $item): ?>
                            <div class="receiver-info">
                                <div class="receiver-address">
                                    <p><b><?php echo $item['fullName'] ?></b></p>
                                    <br>
                                    <p><?php echo $item['email'] ?></p>
                                    <p><?php echo $item['contactNo'] ?></p>
                                    <p><?php echo $item['address1'] ?></p>
                                    <p><?php echo $item['address2'] ?></p>
                                </div>
                                <form method="POST" action="editaddress.php" class="address-action-buttons">
                                    <input type="hidden" name="id-to-update" value="<?php echo $item['deliveryAddressID'] ?>">
                                    <button name="address-edit" id="address-edit">Edit</button>
                                </form>
                            </div>
                            <hr class="address-line">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>