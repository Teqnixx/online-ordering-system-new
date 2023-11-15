<?php

    session_start();
    require('../db_conn.php');
    if(isset($_POST['delete'])){
        $productID = $_POST['delete'];

        unset($_SESSION['items'][$productID]);
        unset($_SESSION['orderDetails'][$productID]);
    }
    $Total = 0;
    $total = 0;

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
                <?php 
                if(isset($_SESSION['items'])){
                   

                    foreach($_SESSION['items'] as $productID => $producData){?>
                <div class="cart-contents">
                    <div class="cart-item">
                        <div class="cart-column-1">
                            <div class="cart-image">

                            </div>
                            <div class="cart-description">
                                <h2><?= $producData['productName']?></h2>
                                <?php if ($producData['flavorID'] === 1){?>
                                <p>Size: <?=$producData['sizeName']?></p>
                                <?php } else{ ?>
                                <p>Flavor: <?=$producData['flavorName'] ?></p>
                                <?php } ?>
                                <p>Quantity: <?= $producData['quantity']?></p>
                            </div>
                        </div>
                        <div class="cart-column-2">
                            <div class="cart-item-price">
                            <?php if($producData['sizeName']){
                                if($producData['sizePrice'] > 0){
                                $total = $producData['sizePrice'] * $producData['quantity'];
                                $Total = $total + $Total;
                                }
                                else{
                                    $total =  $producData['productPrice']* $producData['quantity'];
                                    $Total = $total + $Total;
                                }
                                  ?>
                                <p>Sub total: ₱<?= $total?></p>
                            <?php } else{
                                $Total = $producData['Total'] + $Total;
                                $Total = $Total  * $producData['quantity'] ; ?>
                                <p>Sub total: ₱<?= $total?></p>
                             <?php } ?>

                            </div>
                            <div class="cart-actions">
                            <form action="" method ="post">
                                <button type = "submit" name= "delete" value = "<?= $productID?>" class="remove-item-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                            </form>
                            </div>
                        </div>
                       
                    </div>
                   
                </div>
                <?php 
                
            }}
                else{ ?>
                    <div class="cart-contents">
                    <div class="cart-item">
                        <div class="cart-column-1">
                            <div class="cart-description">
                                <h2>No Order</h2>
                            </div>
                        </div>
                    </div>
                </div>
              <?php  } 
              
              
              if($Total === 0){?>
            
                <?php }
               else { ?>
              <hr class="cart-line">
              <div class="cart-title">
                    <h1>Total: ₱<?= $Total ?></h1>
              </div>
            <?php } ?>
              
            </div>
         
        </div>
        <div>
     <form action="" method ="post">
            <button type = "submit" name= "Confirm">Confirm</button>
     </form>
     </div>
    </div>
   

</body>
</html>


<?php 

    if(isset($_POST['Confirm'])){
        unset($_SESSION['items']);
        $orderId =  $_SESSION['id'];
        $sql = "CALL insert_order($orderId)";
        $conn->query($sql);

        $stmt = $conn->prepare("CALL insert_order_details(?, ? , ?, ?, ?)");
   
        foreach($_SESSION['orderDetails']  as $productID => $dataArray){
                $types = str_repeat('i', 5);  
                $stmt->bind_param($types, ...array_values($dataArray));
                $stmt->execute();
                unset($_SESSION['orderDetails'][$productID]);
              

        
    }
   /* $errorMessage = "Error: " . $conn->error;
    echo $errorMessage;*/
    echo"<script>window.location.href = 'cart.php';</script>";
    exit();
    

       

            
    }



?>