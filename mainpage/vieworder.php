<?php

    session_start();

    require('../db_conn.php');

    $id = $_SESSION['id'];

    $orderDetails;
    $orderItem;
    $grandTotal;
    $orderDetail;

    if(isset($_POST['view-order-button'])){
        $orderID = $_POST['id-to-view'];
        
        $getOrderDetailSQL = "SELECT * FROM view_order_details WHERE orderID = '$orderID'";
        $getGrandTotal = "SELECT SUM(productSubTotal) AS grandTotal FROM view_order_details WHERE orderID = $orderID GROUP BY orderID";
        $getOrderDetail = "SELECT * FROM view_single_order WHERE orderID = $orderID";
        $getReview = "SELECT * FROM reviews WHERE orderID = $orderID";
    
        $orderDetails = mysqli_fetch_assoc(mysqli_query($conn, $getOrderDetailSQL));
        $orderItem = mysqli_query($conn, $getOrderDetailSQL);
        $grandTotal = mysqli_fetch_assoc(mysqli_query($conn, $getGrandTotal));
        $orderDetail = mysqli_fetch_assoc(mysqli_query($conn, $getOrderDetail));
        $review = mysqli_fetch_assoc(mysqli_query($conn, $getReview));

    }                         
    
    if(isset($_POST['rate-order'])){
        $rating = $_POST['rating-chooser'];
        $description = $_POST['rating-description'];
        $orderID = $_POST['id-to-rate'];
        
        $insertRatingSQL = "INSERT INTO reviews(rating, reviewDescription, userID, orderID)
                            VALUES('$rating', '$description', '$id', '$orderID')";

        $updateRating = "UPDATE orders SET isRated = 1 WHERE orderID = $orderID";

        mysqli_query($conn, $insertRatingSQL);
        mysqli_query($conn, $updateRating);

        header('Location: orders.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">
    <title>Order</title>
</head>
<body>
    
    <div class="wrapper">
        <?php include('../templates/navbar.php') ?>
        <div class="view-order-container">
            <div class="view-orders">
                <div class="sidebar-container">
                    <?php include('../templates/sidebar.php'); ?>
                </div>
                <div class="personal-view-orders-container">
                    <div class="view-order-title">
                        <h1>Order Details</h1>
                        <hr class="view-order-line">
                    </div>
                    <div class="order-title2">
                        <h2 class="order-detail-title">Order ID: # <?php echo $orderDetails['orderID'] ?></h2>
                    </div>
                    <div class="view-order-details">
                        <div>
                            <p>Items: </p>
                            <ul class="order-detail-items">
                                <?php foreach($orderItem as $item): ?>
                                    <li class="order-item"><?php echo "₱ ".$item['productSubTotal']." - ".$item['orderDescription']." - ".$item['quantity']." pc(s)" ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <br>
                            <p><?php echo "Total: ₱ ".$grandTotal['grandTotal'] ?></p>
                        </div>
                        <div>
                            <p>Order Info: </p>
                            <br>
                            <p><b><?php echo $orderDetail['fullName'] ?></b></p>
                            <br>
                            <p><?php echo $orderDetail['contactNo'] ?></p>
                            <p><?php echo $orderDetail['address1'] ?></p>
                            <p><?php echo $orderDetail['address2'] ?></p>
                        </div>
                    </div>
                    <hr class="view-order-line">
                    <form action="" method="POST">
                        <?php if($orderDetail['status'] == "Delivered"){ ?>
                            <div class="rating-title">
                                <h2>Ratings</h2>
                                <?php if($orderDetail['isRated'] == 0){ ?>
                                    <input type="hidden" name="id-to-rate" value="<?= $orderDetails['orderID'] ?>">
                                    <button name="rate-order">
                                        Submit Rating
                                    </button>
                                <?php } else { ?>
                                    <button name="rate-order" disabled>
                                        Rated
                                    </button>
                                <?php } ?>
                            </div>
                            <div class="rating-container">
                                <?php if($orderDetail['isRated'] == 0){ ?>
                                    <div>
                                        <p>Rating</p>
                                        <select name="rating-chooser" id="rating-chooser">
                                            <option selected>5</option>
                                            <option>4</option>
                                            <option>3</option>
                                            <option>2</option>
                                            <option>1</option>
                                        </select>
                                    </div>
                                    <div>
                                        <p>Rating Description</p>
                                        <textarea type="text" name="rating-description" maxlength="200"></textarea>
                                    </div>
                                <?php } else { ?>
                                    <div>
                                        <p><b>Rating</b></p>
                                        <p><?php echo $review['rating'] ?> out of 5</p>
                                        <br>
                                    </div>
                                    <div>
                                        <p><b>Rating Description</b></p>
                                        <p>
                                            <?php echo $review['reviewDescription'] ?>
                                        </p>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>