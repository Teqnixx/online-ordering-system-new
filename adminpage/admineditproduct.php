<?php

    require('../db_conn.php');

    $productID = $_POST['product-id'];

    $getProductSQL = "SELECT * FROM view_products WHERE productID = $productID";
    $getProductTypesSQL = "SELECT * FROM product_type";
    $getProductCategory = "SELECT * FROM product_categories";

    $product = mysqli_fetch_assoc(mysqli_query($conn, $getProductSQL));
    $productType = mysqli_query($conn, $getProductTypesSQL);
    $productCategory = mysqli_query($conn, $getProductCategory);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js">
        import Swal from 'sweetalert2/dist/sweetalert2.js'
    </script>
    <title>Admin</title>
</head>
<body onload="">
    
    <div class="wrapper">
        <?php include('adminsidebar.php') ?>
        <div class="admin-edit-product-container">
            <div class="product-edit-container">
                <h3>Product Details</h3>
                <form action="" method="POST">
                    <div class="col1">
                        <?= "<img class='admin-edit-product-image' src='data:image/jpeg;base64,".base64_encode($product['productImage'])."'/>" ?>
                        <p>Product Image</p>
                        <input type="file" id="product-image-chooser" class="admin-edit-field" name="image-field" accept="image/jpeg">
                    </div>
                    <div class="col2">
                        <p>Status</p>
                        <input type="text" id="status" class="admin-edit-field" name="product-status" value="<?= $product['status'] ?>" disabled>
                        <br>
                        <br>
                        <p>Product ID</p>
                        <input type="text" id="product-id-field" class="admin-edit-field" name="product-id" value="<?= $product['productID'] ?>" disabled>
                        <br>
                        <br>
                        <p>Product Name</p>
                        <input type="text" autocomplete="off" id="product-name-field" class="admin-edit-field" name="product-name" value="<?= $product['productName'] ?>">
                        <br>
                        <br>
                        <p>Product Price</p>
                        <input type="number" autocomplete="off" id="product-price-field" class="admin-edit-field" name="product-price" value="<?= $product['productPrice'] ?>">
                    </div>
                    <div class="col3">
                        <div>
                            <p>Product Type</p>
                            <select id="product-type-selector" name="product-type-selector">
                                <?php foreach($productType as $item): ?>
                                    <option>
                                        <?= $item['productTypeID']." - ".$item['productType'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <br>
                            <p>Product Category</p>
                            <select id="product-category-selector" name="product-category-selector">
                                <?php foreach($productCategory as $item): ?>
                                    <option>
                                        <?= $item['categoryID']." - ".$item['categoryName'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="bottom-button-container">
                    <div>
                        <button name="save-button" class="save-button">
                            Save
                        </button>
                    </div>
                    <div>
                        <button name="retire-button" class="retire-button">
                            Retire
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>