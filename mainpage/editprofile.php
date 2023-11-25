<?php

    require('../db_conn.php');

    session_start();
    
    $id = $_SESSION['id'];

    $getUserProfileSQL = "SELECT * FROM view_user_profile WHERE userID = $id";

    $userProfile = mysqli_fetch_assoc(mysqli_query($conn, $getUserProfileSQL));

    if(isset($_POST['save-profile-button'])){

        // $image = $id . $_FILES['image-field']['name'];

        // move_uploaded_file($_FILES['image-field']['tmp_name'],'userimages/' . $uid . $_FILES['image-field']['name']);

        $image = $_POST['image-field'];
        $firstname = $_POST['firstname-field'];
        $middlename = $_POST['middlename-field'];
        if($middlename == null) {
            $middlename = "NA";
        }
        $lastname = $_POST['lastname-field'];
        $email = $_POST['email-field'];
        $contact = "+63".$_POST['contact-field'];

        $city = $_POST['city-field'];
        $municipality = $_POST['municipality-field'];
        $barangay = $_POST['barangay-field'];
        $street = $_POST['street-field'];

        $updateImageSQL = "UPDATE users SET userImage = '$image' WHERE userID = $id";
        $updateProfileSQL = "UPDATE user_profile 
                            SET userFirstname = '$firstname',
                            userMiddlename = '$middlename',
                            userLastname = '$lastname',
                            userEmail = '$email',
                            userContact = '$contact'
                            WHERE userProfileID = (SELECT userProfileID FROM users WHERE userID = $id)";
        $updateAddressSQL = "UPDATE user_address 
                            SET city = '$city',
                            municipality = '$municipality',
                            barangay = '$barangay',
                            street = '$street' 
                            WHERE userAddressID = (SELECT userAddressID FROM users WHERE userID = $id)";

        mysqli_query($conn, $updateImageSQL);
        mysqli_query($conn, $updateProfileSQL);
        mysqli_query($conn, $updateAddressSQL);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">
    <title>Profile</title>
    <script>  
        var loadFile = function(event) {
            var image = document.getElementById('image-preview');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
</head>
<body>
    
    <div class="wrapper">
        <?php include('../templates/navbar.php'); ?>
        <div class="profile-container">
            <div class="profile">
                <div class="sidebar-container">
                    <?php include('../templates/sidebar.php') ?>
                </div>
                <form class="personal-data-container" action="" method="POST">
                    <div class="profile-title">
                        <h1>Edit Profile</h1>
                        <div>
                            <button type="submit" name="save-profile-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M14 4l0 4l-6 0l0 -4" />
                                </svg>
                                Save
                            </button>
                        </div>
                    </div>
                    <hr class="profile-line">
                    <div class="edit-container">
                        <div class="edit-page" action="" method="POST">
                            <h3>Personal Data</h3>
                            <div>
                                <p>Upload image</p>
                                <input type="file" id="product-image-chooser" class="admin-edit-field" name="image-field" onchange="loadFile(event)" accept="image/jpeg">
                            </div>
                            <div>
                                <p>Firstname</p>
                                <input type="text" class="profile-fields" name="firstname-field" value="<?= $userProfile['userFirstname'] ?>">
                            </div>
                            <div>
                                <p>Middlename</p>
                                <input type="text" class="profile-fields" name="middlename-field" value="<?= $userProfile['userMiddlename'] ?>">
                            </div>
                            <div>
                                <p>Lastname</p>
                                <input type="text" class="profile-fields" name="lastname-field" value="<?= $userProfile['userLastname'] ?>">
                            </div>
                            <div>
                                <p>Email</p>
                                <input type="text" class="profile-fields" name="email-field" value="<?= $userProfile['userEmail'] ?>">
                            </div>
                            <div>
                                <p>Contact No (+63)</p>
                                <input class="profile-fields" autocomplete="off" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="10" name="contact-field" placeholder="Contact">
                            </div>
                            <h3>Personal Address</h3>
                            <div>
                                <p>City</p>
                                <input type="text" class="profile-fields" name="city-field" value="<?= $userProfile['city'] ?>">
                            </div>
                            <div>
                                <p>Municipality</p>
                                <input type="text" class="profile-fields" name="municipality-field" value="<?= $userProfile['municipality'] ?>">
                            </div>
                            <div>
                                <p>Barangay</p>
                                <input type="text" class="profile-fields" name="barangay-field" value="<?= $userProfile['barangay'] ?>">
                            </div>
                            <div>
                                <p>Street</p>
                                <input type="text" class="profile-fields" name="street-field" value="<?= $userProfile['street'] ?>">
                            </div>
                        </div>
                        <div class="profile-preview">
                            <h3>Uploaded Image</h3>
                            <img id="image-preview" src="" alt="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>