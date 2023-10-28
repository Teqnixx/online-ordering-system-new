<?php

    session_start();

    require('../db_conn.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">
    <title>Cart</title>
</head>
<body>
    
    <div class="wrapper">
        <?php include('../templates/navbar.php'); ?>
        <div class="cart-container">
            <div class="cart">
                <div class="cart-title">
                    <h1>Cart</h1>
                    <hr class="cart-line">
                </div>
                <div class="cart-contents">
                    <div class="cart-item">
                        <div class="cart-column-1">
                            <div class="cart-image">

                            </div>
                            <div class="cart-description">
                                <h2>Classic Burger</h2>
                                <p>Quantity: 1</p>
                            </div>
                        </div>
                        <div class="cart-column-2">
                            <div class="cart-item-price">
                                <p>₱ 110</p>
                            </div>
                            <div class="cart-actions">
                                <button class="remove-item-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="cart-item">
                        <div class="cart-column-1">
                            <div class="cart-image">

                            </div>
                            <div class="cart-description">
                                <h2>Hashbrown</h2>
                                <p>Quantity: 2</p>
                            </div>
                        </div>
                        <div class="cart-column-2">
                            <div class="cart-item-price">
                                <p>₱ 110</p>
                            </div>
                            <div class="cart-actions">
                                <button class="remove-item-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="cart-item">
                        <div class="cart-column-1">
                            <div class="cart-image">

                            </div>
                            <div class="cart-description">
                                <h2>Apollo Nutella</h2>
                                <p>Quantity: 1</p>
                            </div>
                        </div>
                        <div class="cart-column-2">
                            <div class="cart-item-price">
                                <p>₱ 89</p>
                            </div>
                            <div class="cart-actions">
                                <button class="remove-item-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="cart-total">
                        <hr class="cart-line">
                        <h3>Total : ₱ 309</h3>
                    </div>
                    <div class="cart-checkout-container">
                        <button class="check-out-button">Check Out</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>