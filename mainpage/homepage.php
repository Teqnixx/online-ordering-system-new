<?php

    session_start();

    require('../db_conn.php');

    // product categories
    $getBurgerFriesSQL = "SELECT * FROM view_products WHERE categoryName = 'Burger & Fries'";
    $getSandwichFriesSQL = "SELECT * FROM view_products WHERE categoryName = 'Sandwiches & Fries'";
    $getSizzlingMealsSQL = "SELECT * FROM view_products WHERE categoryName = 'Sizzling Meals'";
    $getAlaCarteWingsSQL = "SELECT * FROM view_products WHERE categoryName = 'Ala Carte Wings'";
    $getPicaPicaSQL = "SELECT * FROM view_products WHERE categoryName = 'Pica Pica'";
    $getFriesSQL = "SELECT * FROM view_products WHERE categoryName = 'Fries'";
    $getRiceSQL = "SELECT * FROM view_products WHERE categoryName = 'Rice'";
    $getClassicMilkteaSQL = "SELECT * FROM view_products WHERE categoryName = 'Classic Milktea'";
    $getFrappeSQL = "SELECT * FROM view_products WHERE categoryName = 'Frappe'";
    $getPremiumMilkteaSQL = "SELECT * FROM view_products WHERE categoryName = 'Premium Milktea'";
    $getCheesecakeSeriesSQL = "SELECT * FROM view_products WHERE categoryName = 'Cheesecake Series'";
    $getFruitTeaSQL = "SELECT * FROM view_products WHERE categoryName = 'Fruit Tea'";
    $getIcedCoffeeSQL = "SELECT * FROM view_products WHERE categoryName = 'Iced Coffee'";
    $getHotCoffeeSQL = "SELECT * FROM view_products WHERE categoryName = 'Hot Coffee'";
    $getSinkersSQL = "SELECT * FROM view_products WHERE categoryName = 'Sinkers'";

    $burgerFries = mysqli_query($conn, $getBurgerFriesSQL);
    $sandwichFries = mysqli_query($conn, $getSandwichFriesSQL);
    $sizzlingMeals = mysqli_query($conn, $getSizzlingMealsSQL);
    $alaCarteWings = mysqli_query($conn, $getAlaCarteWingsSQL);
    $picaPica = mysqli_query($conn, $getPicaPicaSQL);
    $fries = mysqli_query($conn, $getFriesSQL);
    $rice = mysqli_query($conn, $getRiceSQL);
    $classicMilktea = mysqli_query($conn, $getClassicMilkteaSQL);
    $frappe = mysqli_query($conn, $getFrappeSQL);
    $premiumMilktea = mysqli_query($conn, $getPremiumMilkteaSQL);
    $cheesecakeSeries = mysqli_query($conn, $getCheesecakeSeriesSQL);
    $fruitTea = mysqli_query($conn, $getFruitTeaSQL);
    $icedCoffee = mysqli_query($conn, $getIcedCoffeeSQL);
    $hotCoffee = mysqli_query($conn, $getHotCoffeeSQL);
    $sinkers = mysqli_query($conn, $getSinkersSQL);

    if(isset($_POST['add-to-cart-button'])){
        if(!isset($_SESSION['items'])){
            $_SESSION['items'] = array();
        }

        $productID = $_POST['product-id'];

        $_SESSION['items'][$productID] = array();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">
    <title>Home</title>
</head>
<body>
    
    <div class="wrapper">
        <?php include('../templates/navbar.php'); ?>
        <div class="products-container">
            <h1>Products</h1>
            <h2 class="product-category-title">Burger & Fries</h2>
            <div class="category">
                <?php foreach($burgerFries as $product): ?>
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
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="product-category-title">Sandwiches & Fries</h2>
            <div class="category">
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
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="product-category-title">Sizzling Meals</h2>
            <div class="category">
                <?php foreach($sizzlingMeals as $product): ?>
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
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="product-category-title">Ala Carte Wings</h2>
            <div class="category">
                <?php foreach($alaCarteWings as $product): ?>
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
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="product-category-title">Pica Pica</h2>
            <div class="category">
                <?php foreach($picaPica as $product): ?>
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
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="product-category-title">Fries</h2>
            <div class="category">
                <?php foreach($fries as $product): ?>
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
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="product-category-title">Rice</h2>
            <div class="category">
                <?php foreach($rice as $product): ?>
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
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="product-category-title">Classic Milktea</h2>
            <div class="category">
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
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="product-category-title">Frappe</h2>
            <div class="category">
                <?php foreach($frappe as $product): ?>
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
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="product-category-title">Premium Milktea</h2>
            <div class="category">
                <?php foreach($premiumMilktea as $product): ?>
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
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="product-category-title">Cheesecake Series</h2>
            <div class="category">
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
                            <form class="product-action" action="" method="POST">
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="product-category-title">Fruit Tea</h2>
            <div class="category">
                <?php foreach($fruitTea as $product): ?>
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
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="product-category-title">Iced Coffee</h2>
            <div class="category">
                <?php foreach($icedCoffee as $product): ?>
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
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="product-category-title">Hot Coffee</h2>
            <div class="category">
                <?php foreach($hotCoffee as $product): ?>
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
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="product-category-title">Sinkers</h2>
            <div class="category">
                <?php foreach($sinkers as $product): ?>
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
                                <input type="hidden" name="product-id" value="<?php echo $product['productID'] ?>">
                                <input type="SUBMIT" name="add-to-cart-button" value="Add">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</body>
</html>