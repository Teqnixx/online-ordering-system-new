<?php

    session_start();

    require('../db_conn.php');

    if(isset($_POST['shop-now-button'])){
        echo "asd";
        header('Location: ../products/burgersfriespage.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">
    <title>Home</title>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</head>
<body>
    
    <div class="wrapper">
        <?php include('../templates/navbar.php'); ?>
        <div class="landing-page-container">
            <div class="slogan">
                <div>
                    <h1>Unli Wings. Magkakapakpak ka sa sarap.</h1>
                    <form action="" method="POST">
                        <button class="shop-now-button" name="shop-now-button">
                            <a class="cta" href="../products/burgersfriespage.php">
                                <span>Shop Now</span>
                            </a>
                        </button>
                    </form>
                </div>
            </div>
            <div class="image-container">
                <img class="wings-graphic" src="../images/coffee-and-wings-graphic.png" alt="">
            </div>
        </div>
    </div>

</body>
</html>