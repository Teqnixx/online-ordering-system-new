<?php

    session_start();

    require('../db_conn.php');   
    $amount = 0;
    $id = $_SESSION['id'];

    if(isset($_POST['checkout'])){
        $creditcardID= $_POST['selected-cc'];
        $deliveryAddressID = $_POST['group1'];
        $sql = "CALL insert_order($id, $deliveryAddressID)";
        $conn->query($sql);

        $stmt = $conn->prepare("CALL insert_order_details(?, ?, ?, ?, ?)");

        foreach($_SESSION['orderDetails']  as $productID => $dataArray){
            $stockOut = "INSERT INTO `inventory_report` (`inventoryReportID`, `stockIn`, `stockOut`, `date`, `productID`) VALUES (NULL, '0', '$dataArray[quantity]', CURRENT_DATE(), '$dataArray[productid]')";

            mysqli_query($conn, $stockOut);
        }

        foreach($_SESSION['orderDetails']  as $productID => $dataArray){
            $types = str_repeat('i', 5);
            $stmt->bind_param($types, ...array_values($dataArray));
            $stmt->execute();
            unset($_SESSION['orderDetails'][$productID]);
        }
        $insertPayment = "CALL insert_payment($id, $amount, $creditcardID)";
         
        $conn->query($insertPayment);
        unset($_SESSION['items']);
        echo $conn->error;
        
    }
    $Total = 0;

    $getAddressSQL = "SELECT * FROM delivery_addresses WHERE userID = $id";
    $getPaymentsSQL = "SELECT * FROM credit_cards WHERE userID = $id";

    $addresses = mysqli_query($conn, $getAddressSQL);
    $payments = mysqli_query($conn, $getPaymentsSQL);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">
    <title>Check Out</title>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</head>
<body>
    
    <div class="wrapper">
        <?php include('../templates/navbar.php') ?>
        <div class="cart-container">
            <div class="cart">
                <div class="cart-title">
                    <h1>Check Out</h1>
                </div>
                <hr class="cart-line">
                <table class="checkout-products-table">
                    <thead>
                        <tr>
                            <th id="product-image">Product</th>
                            <th id="product-name">Name</th>
                            <th id="product-quantity">Quantity</th>
                            <th id="product-subtotal">Sub Total</th>
                            <th id="product-size">Size</th>
                            <th id="product-flavor">Flavor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($_SESSION['items'])){
                            foreach($_SESSION['items'] as $productID => $item): ?>
                                <tr>
                                    <td><?php echo "<img class='checkout-product-image' src='data:image/jpeg;base64,".base64_encode($item['image'])."'/>" ?></td>
                                    <td><?php echo $item['productName'] ?></td>
                                    <td><?php echo $item['quantity'] ?></td>
                                    <td><?php if($item['sizePrice'] > 0){
                                            $subTotal = $item['sizePrice'] * $item['quantity'];
                                            echo "₱ ".$subTotal;
                                        }
                                        else{
                                            $subTotal = $item['productPrice'] * $item['quantity'];
                                            echo "₱ ".$subTotal;
                                        } ?></td>
                                    <td><?php echo $item['sizeName'] ?></td>
                                    <td><?php echo $item['flavorName'] ?></td>
                                    <?php $Total = $Total + $subTotal ?>
                                </tr>
                            <?php endforeach;
                        } ?>
                    </tbody>
                </table>
                <form action="" method="POST">
                <hr class="cart-line">
                <div class="details-chooser">
                    <div class="checkout-address-chooser">
                        <h3>Choose Address</h3>
                        <?php foreach($addresses as $item): ?>
                            <div class="checkout-address">
                                <fieldset id="group1">
                                    <input name="group1" type="radio" id="radio-button" value = "<?=$item['deliveryAddressID']?>">
                                    <label for="radio-button">
                                        <p><?= $item['fullName'] ?></p>
                                        <p><?= $item['contactNo'] ?></p>
                                        <p><?= $item['address1'] ?></p>
                                        <p><?= $item['address2'] ?></p>
                                    </label>
                                </fieldset>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="checkout-payment-chooser">
                        <h3>Payment Method</h3>
                        <?php foreach($payments as $item): ?>
                            <div class="checkout-payments">
                                <fieldset id="group2">
                                    
                                    <input type="hidden" name="selected-cc" value="<?= $item['creditCardID'] ?>">
                                    <input name="group2" type="radio" id="radio-button">
                                    <label for="radio-button">
                                        <p><?= $item['creditCardHolder'] ?></p>
                                        <p><?= $item['creditCardName'] ?></p>
                                        <p><?= $item['creditCardNumber'] ?></p>
                                    </label>
                                </fieldset>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <hr class="cart-line">
                <div class="checkout-total-container">
                    <h2>Total: <?= "₱ ".$Total ?></h2>
                </div>
                <div class="checkout-action">
                    
                        <button type= 'submit' name="checkout">
                            Check Out
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M11.5 17h-5.5v-14h-2" />
                                <path d="M6 5l14 1l-1 7h-13" />
                                <path d="M15 19l2 2l4 -4" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>