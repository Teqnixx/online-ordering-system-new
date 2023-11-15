<?php

    session_start();

    require('../db_conn.php');

    // product categories
    $getSandwichFriesSQL = "SELECT * FROM view_products WHERE categoryName = 'Sandwiches & Fries'";

    $sandwichFries = mysqli_query($conn, $getSandwichFriesSQL);

    if(isset($_POST['add-to-cart-button'])){
        $data = array();
        $orderDetails = array();


                $productID = $_POST['product-id'];
                $quantity = $_POST['quantity'];
                $productSQL = "SELECT * FROM view_products WHERE productID = '$productID'";
                $productSQLresult = $conn->query($productSQL);
                $productRows = $productSQLresult->fetch_assoc();

                $size = 'NA';
                $getproductType = "SELECT * FROM product_sizes WHERE productSizeName = '$size'";
                $sizes = $conn->query($getproductType);
                $sizePrice = $sizes->fetch_assoc();

                $data['flavorID'] = 1;
                $data['sizeName'] = $size;
                $data['sizePrice'] = $sizePrice['productSizePrice'];
                $data['productId'] = $productRows['productID'];
                $data['quantity'] = $quantity;
                $data['productName'] = $productRows['productName'];
                $data['productPrice'] = $productRows['productPrice'];
                $data["Total"] = $data['quantity'] * $data['productPrice'];
                $_SESSION['items'][] = $data;

                $orderDetails['userId'] =  $_SESSION['id'];
                $orderDetails['quantity'] = $quantity;
                $orderDetails['productid'] = $productID;
                $orderDetails['sizeid'] =  $sizePrice['productSizeID'];
                $orderDetails['flavorid'] = '1';
                $_SESSION['orderDetails'][] = $orderDetails;
        echo"<script>alert('product added')</script>";
  

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../mainpage/mainpage.css">
    <title>Home</title>
</head>
<body>
    
    <div class="wrapper">
        <?php include('../templates/navbar.php'); ?>
        <div class="product-page-container">
            <div class="products-wrapper">
                <?php include('../templates/productssidebar.php'); ?>
                <div>
                    <h2 class="product-category-title">Sandwiches & Fries</h2>
                    <div class="products">
                        <?php foreach($sandwichFries as $product): ?>
                            <div class="product-card">
                                <div class="product-description">
                                    <div>
                                        <div class="product-image">

                                        </div>
                                        <h5>
                                            <?php echo $product['productName'] ?>
                                        </h5>
                                        <p>
                                            <?php echo "₱ ".$product['productPrice'] ?>
                                        </p>
                                    </div>
                                    <form class="product-action" action="" method="POST">
                                        <input type="number" id="quantity" name="quantity" min="1" max="5">
                                        <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                        <input type="SUBMIT" name="add-to-cart-button" value="Add">
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>