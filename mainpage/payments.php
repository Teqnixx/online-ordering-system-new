<?php

    session_start();

    require('../db_conn.php');

    $id = $_SESSION['id'];

    $getUserProfileSQL = "SELECT * FROM view_user_profile WHERE userID = $id";
    $getCreditCardsSQL = "SELECT * FROM credit_cards WHERE userID = '$id'";

    $userProfile = mysqli_fetch_assoc(mysqli_query($conn, $getUserProfileSQL));
    $creditCards = mysqli_query($conn, $getCreditCardsSQL);

    if(isset($_POST['add-payment-button'])){
        header('Location: addpayment.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">
    <title>Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        import Swal from 'sweetalert2'
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
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
                        <h1>My Payment Methods</h1>
                        <form action="" method="POST">
                            <button type="submit" name="add-payment-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                Add Payment Method
                            </button>
                        </form>
                    </div>
                    <hr class="payments-line">
                    <div class="payments-list">
                        <?php $i = 0; ?>
                        <?php foreach($creditCards as $card): ?>
                        <div class="payment">
                            <div class="payment-details">
                                <div class="title">
                                    <h2>Payment <?php echo $i+1 ?></h2>
                                    <form action="" method="POST">
                                        <input type="hidden" name="payment-id" value="<?= $card['creditCardID'] ?>">
                                        <button name="remove-payment-button">
                                            Remove
                                        </button>
                                    </form>
                                </div>
                                <br>
                                <div class="credit-card-info">
                                    <div class="credit-card-col1">
                                        <p>Card Holder Name: <?php echo $card['creditCardHolder'] ?></p>
                                        <p>Credit Card Number: <?php echo $card['creditCardNumber'] ?></p>
                                        <p>Credit Card: <?php echo $card['creditCardName'] ?></p>
                                    </div>
                                    <div class="credit-card-col2">
                                        <p>Expiration Date: <?php echo $card['expirationDate'] ?></p>
                                        <p>CVC Code: <?php echo $card['cvcCode'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php

    if(isset($_POST['remove-payment-button'])){
        
        $paymentID = $_POST['payment-id'];

        $removePaymentSQL = "DELETE FROM credit_cards WHERE creditCardID = $paymentID";

        ?>
            <script>
                Swal.fire({
                    title: "Delete payment method?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                        title: "Deleted!",
                        text: "Payment has been deleted.",
                        icon: "success"
                        });
                        <?php
                            // mysqli_query($conn, $removePaymentSQL);
                        ?>
                    }
                });
            </script>
        <?php
    }

?>