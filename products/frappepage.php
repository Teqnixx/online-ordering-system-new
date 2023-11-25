<?php

    session_start();

    require('../db_conn.php');

    // product categories
    $getFrappeSQL = "SELECT * FROM view_products WHERE categoryName = 'Frappe'";

    $frappe = mysqli_query($conn, $getFrappeSQL);

    $getPrices = "SELECT * FROM product_sizes";
    $prices = mysqli_query($conn, $getPrices);
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
                    <h2 class="product-category-title">Frappe</h2>
                    <div class="products">
                        <?php foreach($frappe as $product): ?>
                            <div class="product-card">
                                <div class="product-description">
                                    <div>
                                        <div class="product-image">
                                            <?php 
                                                if($product['productImage'] != null){
                                                    echo "<img class='product-image' src='data:image/jpeg;base64,".base64_encode($product['productImage'])."'/>";
                                                }else {
                                                    echo "";
                                                }
                                            ?>
                                        </div>
                                        <h5>
                                            <?php echo $product['productName'] ?>
                                        </h5>
                                    </div>
                                    <form class="product-action" action="addtocart.php" method="POST">
                                        <p>
                                            <?php echo "Stock: ".$product['stock'] ?>
                                        </p>
                                        <?php if($product['stock'] <= 0){ ?>
                                            <input type="number" id="quantity" name="quantity" min="1" max="5" value="1" disabled>
                                            <select name="size" disabled>
                                                <option selected>Size</option>
                                                <?php foreach($prices as $item): ?>
                                                    <?php if($item['productSizeName'] != "NA"){ ?>
                                                        <?php echo "<option>₱ ".$item['productSizePrice']." - ".$item['productSizeName']."</option>" ?>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                            <input type="SUBMIT" name="add-to-cart-button" value="Add" disabled>
                                        <?php }else { ?>
                                            <input type="number" id="quantity" name="quantity" min="1" max="5" value="1">
                                            <select name="size">
                                                <option selected>Size</option>
                                                <?php foreach($prices as $item): ?>
                                                    <?php if($item['productSizeName'] != "NA"){ ?>
                                                        <?php echo "<option>₱ ".$item['productSizePrice']." - ".$item['productSizeName']."</option>" ?>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                            <input type="SUBMIT" name="add-to-cart-button" value="Add">
                                        <?php } ?>
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