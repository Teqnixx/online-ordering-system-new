<?php

    require('../db_conn.php');

    session_start();

    if(isset($_POST['back-button'])){
        header('Location: ../index.php');
    }

    if(isset($_POST['admin-login-button'])){

        if(!empty($_POST['username']) && !empty($_POST['password'])){
            
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT password FROM users WHERE username = '$username' AND role = 'admin'";

            $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));

            $_SESSION['currentID'] = $result['userID'];
            
            if(!is_null($result)){
                if(password_verify($password, $result['password'])){
                    header('Location: ../adminpage/admindashboard.php');
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <title>Admin Login</title>
</head>
<body>
    
    <div class="login-container">
        <img src="../images/cafe-bg.jpg" class="cafe-bg" alt="">
        <div class="login-side">
            <form class="login-form" action="adminlogin.php" method="POST">
                <h2>Admin login</h2>
                <div class="username-container">
                    <p>Username</p>
                    <input type="text" name="username" autocomplete="off">
                </div>
                <div class="password-container">
                    <p>Password</p>
                    <input type="password" name="password">
                </div>
                <div class="button-container">
                    <input type="submit" name="admin-login-button" value="Login">
                </div>
            </form>
        </div>
    </div>


</body>
</html>