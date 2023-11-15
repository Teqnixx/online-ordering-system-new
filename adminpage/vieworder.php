<?php

    require('../db_conn.php');

    if(isset($_POST['view-order-button'])){
        
        $id = $_POST['id-to-view'];

        $viewOrderSQL = "SELECT * FROM view_orders WHERE orderID = $id";
        $getSingleOrderSQL = "SELECT * FROM view_single_order WHERE orderID = $id";
        $getSingleOrderDetailSQL = "SELECT * FROM view_single_order_detail WHERE orderID = $id";

        $order = mysqli_fetch_assoc(mysqli_query($conn, $viewOrderSQL));
        $orderDetail = mysqli_fetch_assoc(mysqli_query($conn, $getSingleOrderSQL));
        $orderDetailProducts = mysqli_query($conn, $getSingleOrderDetailSQL);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Admin</title>
</head>
<body>

    <div class="wrapper">
        <?php include('adminsidebar.php'); ?>
        <div class="order-detail-container">
            <h1>Order Detail</h1>
            <div class="order-details">
                <div class="order-info">
                    <div>
                        <h3>Order ID: #<?php echo $order['orderID']; ?></h3>
                        <p><?php echo $order['orderDate'] ?></p>
                    </div>
                    <div>
                        <h4>Status: <?php echo $order['status'] ?></h4>
                    </div>
                </div>
                <div class="od-row">
                    <div class="customer-info">
                        <div class="orders-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                        </div>
                        <div>
                            <h2>Customer</h2>
                            <br>
                            <p><span class="order-label">Name: </span><?php echo $orderDetail['fullName'] ?></p>
                            <br>
                            <p><span class="order-label">Email: </span><?php echo $orderDetail['email'] ?></p>
                            <br>
                            <p><span class="order-label">Contact No: </span><?php echo $orderDetail['contactNo'] ?></p>
                        </div>
                    </div>
                    <div class="payment-info">
                        <div class="orders-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 5m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z"></path>
                                <path d="M3 10l18 0"></path>
                                <path d="M7 15l.01 0"></path>
                                <path d="M11 15l2 0"></path>
                            </svg>
                        </div>
                        <div>
                            <h2>Payment Info</h2>
                            <br>
                            <p><span class="order-label">Credit Card Provider: </span><?php echo $orderDetail['creditCardName'] ?></p>
                            <br>
                            <p><span class="order-label">Credit Card Holder: </span><?php echo $orderDetail['creditCardHolder'] ?></p>
                            <br>
                            <p><span class="order-label">Contact No: </span><?php echo $orderDetail['contactNo'] ?></p>
                        </div>
                    </div>
                    <div class="address-info">
                        <div class="orders-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2>Address Info</h2>
                            <br>
                            <p><span class="order-label">Address 1: </span><?php echo $orderDetail['address1'] ?></p>
                            <br>
                            <p><span class="order-label">Address 2: </span><?php echo $orderDetail['address2'] ?></p>
                        </div>
                    </div>
                </div>
                <h2 class="od-product-title">Products</h2>
                <table class="od-product-table">
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
                        <?php foreach($orderDetailProducts as $item): ?>
                            <tr>
                                <td><?php echo "<img class='od-product-image' src='data:image/jpeg;base64,".base64_encode($item['productImage'])."'/>" ?></td>
                                <td><?php echo $item['productName'] ?></td>
                                <td><?php echo $item['quantity'] ?></td>
                                <td><?php echo $item['productSubTotal'] ?></td>
                                <td><?php echo $item['productSize'] ?></td>
                                <td><?php echo $item['flavorName'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>