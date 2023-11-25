<?php

    require('../db_conn.php');

    $getProductsSQL = "SELECT * FROM view_products";

    $products = mysqli_query($conn, $getProductsSQL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <title>Admin</title>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</head>
<body>

    <div class="wrapper">
        <?php include('adminsidebar.php') ?>
        <div class="admin-products-container">
            <div class="products-table">
                <table class="products table table-bordered">
                    <thead>
                        <tr>
                            <th id="admin-product-id">Product ID</th>
                            <th id="admin-product-image">Product Image</th>
                            <th id="admin-product-name">Product Name</th>
                            <th id="admin-product-stock">Stock</th>
                            <th id="admin-product-price">Product Price</th>
                            <th id="admin-product-type">Product Type</th>
                            <th id="admin-product-category">Category</th>
                            <th id="admin-product-status">Status</th>
                            <th id="admin-product-action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $product): ?>
                            <?php echo "<tr data-id='".$product['productID']."'>" ?>
                                <td><?= $product['productID'] ?></td>
                                <td>
                                    <?php if($product['productImage'] != null){ ?>
                                        <?= "<img class='admin-product-image' src='data:image/jpeg;base64,".base64_encode($product['productImage'])."'/>" ?>
                                    <?php }else { ?>
                                        <div class="admin-product-image null-image">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M15 8h.01" />
                                                <path d="M7 3h11a3 3 0 0 1 3 3v11m-.856 3.099a2.991 2.991 0 0 1 -2.144 .901h-12a3 3 0 0 1 -3 -3v-12c0 -.845 .349 -1.608 .91 -2.153" />
                                                <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" />
                                                <path d="M16.33 12.338c.574 -.054 1.155 .166 1.67 .662l3 3" />
                                                <path d="M3 3l18 18" />
                                            </svg>
                                        </div>
                                    <?php } ?>
                                </td>
                                <?= "<td>".$product['productName']."</td>" ?>
                                <td><?= $product['stock'] ?></td>
                                <?= "<td>".$product['productPrice']."</td>" ?>
                                <?= "<td>".$product['productType']."</td>" ?>
                                <?= "<td>".$product['categoryName']."</td>" ?>
                                <?= "<td>".$product['status']."</td>" ?>
                                <td class="product-action-row">
                                    <?php if($product['status'] == "Available"){ ?>
                                        <input type="hidden" id="product-id" name="product-id" value="<?= $product['productID'] ?>">
                                        <button class="product-action add-stock-button" name="add-product-stock">
                                            Add Stock
                                        </button>
                                        <form action="admineditproduct.php" method="POST">
                                            <input type="hidden" name="product-id" value="<?= $product['productID'] ?>">
                                            <button class="product-action" name="edit-product">
                                                Edit
                                            </button>
                                        </form>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>