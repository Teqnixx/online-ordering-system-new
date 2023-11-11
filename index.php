<?php

    session_start();

    require('db_conn.php');

    if(isset($_POST['login-button'])){

        if(!empty($_POST['username']) && !empty($_POST['password'])){
            
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT userID, password FROM users WHERE username = '$username' AND role = 'user'";

            $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            
            if(!is_null($result)){
                if(password_verify($password, $result['password'])){
                    $_SESSION['id'] = $result['userID'];
                    header('Location: mainpage/homepage.php');
                }
            }
        }
    }
    
    if(isset($_POST['signup-button'])) {
        header('Location: loginpage/create_user.php');
    }

    if(isset($_POST['admin-login'])){
        header('Location: loginpage/adminlogin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>

    <div class="login-container">
        <img src="images/cafe-bg.jpg" class="cafe-bg" alt="">
        <div class="login-side">
            <form class="login-form" action="index.php" method="POST">
                <h1>Login</h1>
                <div class="username-container">
                    <p>Username</p>
                    <input type="text" name="username" autocomplete="off">
                </div>
                <div class="password-container">
                    <p>Password</p>
                    <input type="password" name="password">
                </div>
                <input type="submit" name="login-button" value="Log In">
                <div class="separate">
                    <hr>
                    <span>Or</span>
                    <hr>
                </div>
                <input type="submit" name="signup-button" value="Sign Up">
                <!-- <div class="admin-button-container">
                    <input type="submit" name="admin-login" value="Admin Login">
                </div> -->
            </form>
        </div>
    </div>

</body>
</html>