<?php

    session_start();

    require('../db_conn.php');

    $id = $_SESSION['id'];

    $getUserProfileSQL = "SELECT * FROM view_user_profile WHERE userID = $id";

    $userProfile = mysqli_fetch_assoc(mysqli_query($conn, $getUserProfileSQL));

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
        <div class="profile-container">
            <div class="profile">
                <div class="sidebar-container">
                    <?php include('../templates/sidebar.php'); ?>
                </div>
                <div class="personal-data-container">
                    <div class="profile-title">
                        <h1>Profile</h1>
                        <form action="" method="POST">
                            <button type="submit" name="edit-profile-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4"></path>
                                    <path d="M13.5 6.5l4 4"></path>
                                </svg>
                                Edit Profile
                            </button>
                        </form>
                    </div>
                    <hr class="profile-line">
                    <div class="personal-data">
                        <div class="personal-info">
                            <div class="user-image">
                                <?php 
                                    if($userProfile['userImage'] != null){
                                        echo "<img class='user-image' src='data:image/jpeg;base64,".base64_encode($userProfile['userImage'])."'/>";
                                    }else {
                                ?> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-person-square" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                                </svg>
                                <?php } ?>
                            </div>
                            <div class="personal-details">
                                <h2><?php echo $userProfile['userFullname']; ?></h2>
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                    </svg>
                                    Talangan, Nasugbu, Batangas
                                </p>
                            </div>
                        </div>
                        <div class="contact-info">
                            <div class="contact-item">
                                <h2>Email</h2>
                                <p><?php echo $userProfile['userEmail'] ?></p>
                            </div>
                            <div class="contact-item">
                                <h2>Contact Number</h2>
                                <p><?php echo $userProfile['userContact'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>