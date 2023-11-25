<?php

    require('../db_conn.php');

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

    $password = password_hash($password, PASSWORD_DEFAULT);
    $insertUserProfileSQL = "CALL insert_user_profile('$firstname', '$middlename', '$lastname', '$email', '$contact')";
    $insertUserAddressSQL = "CALL insert_user_address('$city', '$municipality', '$barangay', '$street', '$zipcode')";
    $insertUserSQL = "CALL insert_user('$username', '$password')";

    echo "<script>alert('$username');</script>";

    mysqli_query($conn, $insertUserProfileSQL);
    mysqli_query($conn, $insertUserAddressSQL);
    mysqli_query($conn, $insertUserSQL);