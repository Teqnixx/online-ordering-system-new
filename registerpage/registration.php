<?php

    require('../db_conn.php');

    session_start();

    if(isset($_POST['profile-continue-button'])) {
        $firstname = $_POST['user-firstname-field'];
        if(!isset($_POST['user-middlename-field'])){
            $middlename = "NA";
        }else {
            $middlename = $_POST['user-middlename-field'];
        }
        $lastname = $_POST['user-lastname-field'];
        $email = $_POST['user-email-field'];
        $contact = "+63".$_POST['user-contact-field'];

        $city = $_POST['user-city-field'];
        $municipality = $_POST['user-municipality-field'];
        $barangay = $_POST['user-barangay-field'];
        $street = $_POST['user-street-field'];
        $zipcode = $_POST['user-zipcode-field'];
        
        $username = $_POST['user-username-field'];
        $password = $_POST['user-password-field'];
        $confirmpassword = $_POST['user-confirm-password-field'];

        $checkExisting = "SELECT * FROM users WHERE username = '$username'";

        $result = mysqli_query($conn, $checkExisting);

        if(mysqli_num_rows($result) == 0) {

            if($password == $confirmpassword){
                $password = password_hash($password, PASSWORD_DEFAULT);
                $insertUserProfileSQL = "CALL insert_user_profile('$firstname', '$middlename', '$lastname', '$email', '$contact')";
                $insertUserAddressSQL = "CALL insert_user_address('$city', '$municipality', '$barangay', '$street', '$zipcode')";
                $insertUserSQL = "CALL insert_user('$username', '$password')";
    
                // mysqli_query($conn, $insertUserProfileSQL);
                // mysqli_query($conn, $insertUserAddressSQL);
                // mysqli_query($conn, $insertUserSQL);
                
                // header('Location: ../index.html');
            }
    
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    
        
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="../index.html" class="navbar-brand">
                <h1 class="navbar-logo">
                    Blend & Sip
                </h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div>
        <section class="container profile">
            <div class="registration">
                <h2 class="text-center">Let's get to know you a bit!</h2>
                <div class="profile-nav">
                    <a id="next-button" onclick="switchToAddress()">
                        Next
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l14 0" />
                            <path d="M13 18l6 -6" />
                            <path d="M13 6l6 6" />
                        </svg>
                    </a>
                </div>
                <div id="profile-form">
                    <div>
                        <p><b>Firstname</b></p>
                        <input type="text" autocomplete="off" name="user-firstname-field" placeholder="Firstname">
                    </div>
                    <div>
                        <p><b>Middlename</b></p>
                        <input type="text" autocomplete="off" name="user-middlename-field" placeholder="Middlename">
                    </div>
                    <div>
                        <p><b>Lastname</b></p>
                        <input type="text" autocomplete="off" name="user-lastname-field" placeholder="Lastname">
                    </div>
                    <div>
                        <p><b>Email</b></p>
                        <input type="text" autocomplete="off" name="user-email-field" placeholder="Email">
                    </div>
                    <div>
                        <p><b>Contact No (+63)</b></p>
                        <input autocomplete="off" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="10" name="user-contact-field" placeholder="Contact">
                    </div>
                </div>
                <p class="text-center">Already have an account?<a href="../index.php">Sign in</a></p>
            </div>
        </section>
        
        <section class="container address">
            <div class="registration">
                <h2 class="text-center">Let's get to know you a bit!</h2>
                <div class="address-nav">
                    <a id="back-button" onclick="switchToProfile()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l14 0" />
                            <path d="M5 12l6 6" />
                            <path d="M5 12l6 -6" />
                        </svg>
                        Back
                    </a>
                    <a id="next-button" onclick="switchToAccount()">
                        Next
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l14 0" />
                            <path d="M13 18l6 -6" />
                            <path d="M13 6l6 6" />
                        </svg>
                    </a>
                </div>
                <div id="profile-form">
                    <div>
                        <p><b>City</b></p>
                        <input type="text" autocomplete="off" name="user-city-field" placeholder="City">
                    </div>
                    <div>
                        <p><b>Municipality</b></p>
                        <input type="text" autocomplete="off" name="user-municipality-field" placeholder="Municipality">
                    </div>
                    <div>
                        <p><b>Barangay</b></p>
                        <input type="text" autocomplete="off" name="user-barangay-field" placeholder="Barangay">
                    </div>
                    <div>
                        <p><b>Street</b></p>
                        <input type="text" autocomplete="off" name="user-street-field" placeholder="Street">
                    </div>
                    <div>
                        <p><b>Zip Code</b></p>
                        <input type="text" autocomplete="off" name="user-zipcode-field" placeholder="Zip Code">
                    </div>
                </div>
                <p class="text-center">Already have an account?<a href="../index.php">Sign in</a></p>
            </div>
        </section>

        <section class="container account">
            <div class="registration">
                <h2 class="text-center">Finish setting up your account.</h2>
                <div class="account-nav">
                    <a id="back-button" onclick="switchToAddress()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l14 0" />
                            <path d="M5 12l6 6" />
                            <path d="M5 12l6 -6" />
                        </svg>
                        Back
                    </a>
                </div>
                <div id="profile-form">
                    <div>
                        <p><b>Username</b></p>
                        <input type="text" autocomplete="off" name="user-username-field" placeholder="Username">
                    </div>
                    <div>
                        <p><b>Password</b></p>
                        <input type="password" name="user-password-field" placeholder="Password">
                    </div>
                    <div>
                        <p><b>Confirm Password</b></p>
                        <input type="password" name="user-confirm-password-field" placeholder="Confirm Password">
                    </div>
                    <button class="profile-continue-button" name="profile-continue-button">
                        Continue
                    </button>
                </div>
                <p class="text-center">Already have an account?<a href="../index.php">Sign in</a></p>
            </div>
        </section>
    </div>

</body>
</html>
