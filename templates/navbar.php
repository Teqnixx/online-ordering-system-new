<?php

    require('../db_conn.php');

    $id = $_SESSION['id'];

    $getProfilePictureSQL = "SELECT userImage FROM users WHERE userID = $id";

    $profilePicture = mysqli_fetch_assoc(mysqli_query($conn, $getProfilePictureSQL));

?>

<link rel="stylesheet" href="../templates/navbar.css">
<div class="navbar">
    <div class="logo-container">
        <a href="../mainpage/homepage.php">
            <h1 class="navbar-logo">
                Blend & Sip
            </h1>
        </a>
    </div>
    <div class="nav-items">
        <div class="nav-item">
            <h3><a href="../mainpage/homepage.php">Home</a></h3>
        </div>
        <div class="nav-item">
            <h3><a href="../products/burgersfriespage.php">Menu</a></h3>
        </div>
        <div class="nav-item">
            <h3>
                <a href="../mainpage/cart.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>
                </a>
            </h3>
        </div>
        <div class="nav-item">
            <h3>
                <a href="../mainpage/profile.php">
                    <img class='profile-image' src="data: image/jpeg;base64,<?=base64_encode($profilePicture['userImage'])?>" alt="Image">
                </a>
            </h3>
        </div>
    </div>
</div>