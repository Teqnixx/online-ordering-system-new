<?php

    session_start();

    require('../db_conn.php');

    // product categories
    $getClassicMilkteaSQL = "SELECT * FROM view_products WHERE categoryName = 'Classic Milktea'";

    $classicMilktea = mysqli_query($conn, $getClassicMilkteaSQL);

    if(isset($_POST['add-to-cart-button'])){
        $data = array();
        $orderDetails = array();
   


        $productID = $_POST['product-id'];
        $quantity = $_POST['quantity'];
        $productSQL = "SELECT * FROM view_products WHERE productID = '$productID'";
        $productSQLresult = $conn->query($productSQL);
        $productRows = $productSQLresult->fetch_assoc();
   
        $orderDetails['userId'] =  $_SESSION['id'];
        $orderDetails['quantity'] = $quantity;
        $orderDetails['productid'] = $productRows['productID'];

        $size = $_POST['size'];
        if($size === 'Size'){
            $size = 'Lowdose';
            $getproductType = "SELECT * FROM product_sizes WHERE productSizeName = '$size'";
            $sizes = $conn->query($getproductType);
            $sizePrice = $sizes->fetch_assoc();
            $data['sizeName'] = $size;
            $data['sizePrice'] = $sizePrice['productSizePrice'];
            $orderDetails['sizeid'] =  $sizePrice['productSizeID'];
           
        }
        else{
            $getproductType = "SELECT * FROM product_sizes WHERE productSizeName = '$size'";
            $sizes = $conn->query($getproductType);
            $sizePrice = $sizes->fetch_assoc();
            $data['sizeName'] = $size;
            $data['sizePrice'] = $sizePrice['productSizePrice'];
            $orderDetails['sizeid'] =  $sizePrice['productSizeID'];

        }

        
        $data['flavorID'] = 1;
        $data['productId'] = $productRows['productID'];
        $data['quantity'] = $quantity;
        $data['productName'] = $productRows['productName'];
        $data['productPrice'] = $productRows['productPrice'];
        $data["Total"] = $data['quantity'] * $data['productPrice'];
        $_SESSION['items'][] = $data;

    
       
        $orderDetails['flavorid'] = $data['flavorID'];
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
                    <h2 class="product-category-title">Calssic Milktea</h2>
                    <div class="products">
                        <?php foreach($classicMilktea as $product): ?>
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
                                        <select name="size">
                                            <option selected>Size</option>
                                            <option>Highdose</option>
                                            <option>Overdose</option>
                                            <option>Lowdose</option>
                                        </select>
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