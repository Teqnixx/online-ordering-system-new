<?php 

    session_start();

    require('../db_conn.php');

    if(isset($_POST['insert-payment-button'])){
        $id = $_SESSION['id'];
        $cardHolderName = $_POST['card-holder-name-field'];
        $cardNumber = $_POST['card-number-field'];
        $cardProvider = $_POST['credit-card-selector'];
        $expDate = $_POST['exp-date-field'];
        $cvcCode = $_POST['cvc-code-field'];
        
        if(!empty($cardHolderName) && !empty($cardNumber) && !empty($cardProvider) && !empty($expDate) && !empty($cvcCode)){
            $sql = "CALL insert_credit_card('$cardHolderName', '$cardNumber', '$cardProvider', '$expDate', '$cvcCode', $id)";

            mysqli_query($conn, $sql);

            header('Location: payments.php');
        }
    }

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
        <div class="payments-container">
            <div class="payments">
                <div class="sidebar-container">
                    <?php include('../templates/sidebar.php'); ?>
                </div>
                <div class="personal-payments-container">
                    <div class="payments-title">
                        <h1>Add Payment</h1>
                    </div>
                    <hr class="payments-line">
                    <form action="" method="POST">
                        <p>Credit Card Holder Name:</p>
                        <input type="text" name="card-holder-name-field" autocomplete="off" placeholder="Holder Name">
                        <br>
                        <br>
                        <p>Credit Card Number</p>
                        <input type="number" name="card-number-field" autocomplete="off" placeholder="Credit Card Number">
                        <br>
                        <br>
                        <div class="field-group">
                            <div>
                                <p>Credit Card Provider</p>
                                <select name="credit-card-selector">
                                    <option selected>Visa</option>
                                    <option>American Express</option>
                                    <option>MasterCard</option>
                                    <option>BDO</option>
                                    <option>BPI</option>
                                    <option>PNB</option>
                                </select>
                            </div>
                            <br>
                            <div>
                                <p>Expiration Date</p>
                                <input type="text" name="exp-date-field" autocomplete="off" placeholder="Expiration Date">
                            </div>
                            <br>
                            <div>
                                <p>CVC Code</p>
                                <input type="number" name="cvc-code-field" autocomplete="off" placeholder="CVC">
                            </div>
                        </div>
                        <br>
                        <div class="add-payment-action-buttons">
                            <button type="submit" name="insert-payment-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                Add Payment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>