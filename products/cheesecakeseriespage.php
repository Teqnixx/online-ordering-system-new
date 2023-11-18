<?php

    session_start();

    require('../db_conn.php');

    // product categories
    $getCheesecakeSeriesSQL = "SELECT * FROM view_products WHERE categoryName = 'Cheesecake Series'";

    $cheesecakeSeries = mysqli_query($conn, $getCheesecakeSeriesSQL);

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
                    <h2 class="product-category-title">Cheesecake Series</h2>
                    <div class="products">
                        <?php foreach($cheesecakeSeries as $product): ?>
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
                                    <form class="product-action" action="addtocart.php" method="POST">
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