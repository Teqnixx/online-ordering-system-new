<?php

        session_start();

        require('../db_conn.php');

        if(isset($_POST['add-to-cart-button'])){
            $data = array();
            $orderDetails = array();

            $productID = $_POST['product-id'];
            $quantity = $_POST['quantity'];
            $productSQL = "SELECT * FROM view_products WHERE productID = '$productID'";
            $productSQLresult = $conn->query($productSQL);
            $productRows = $productSQLresult->fetch_assoc();

            if($productRows['productType'] === 'Food' ){

                if($productRows['categoryName'] === 'Ala Carte Wings'){

                    $size = 'NA';
                    $getproductType = "SELECT * FROM product_sizes WHERE productSizeName = '$size'";
                    $sizes = $conn->query($getproductType);
                    $sizePrice = $sizes->fetch_assoc();
            
                    $flavorName = $_POST['size'];
                    $getflavorType = "SELECT * FROM product_flavors WHERE flavorName = '$flavorName'";
                    $flavor = $conn->query($getflavorType);
                    $flavorID = $flavor->fetch_assoc();
                    
                    $image = $productRows['productImage'];
                   
                    $data['sizeName'] = $size;
                    $data['flavorID'] =  $flavorID['flavorID'];
                    $data['flavorName'] = $flavorName;
                    $data['sizePrice'] = $sizePrice['productSizePrice'];
                    $data['productId'] = $productRows['productID'];
                    $data['quantity'] = $quantity;
                    $data['image'] = $image;
                    $data['productImage'] = $productRows['productID'];
                    $data['productName'] = $productRows['productName'];
                    $data['productPrice'] = $productRows['productPrice'];
                    $data["Total"] = $data['quantity'] * $data['productPrice'];
                    $_SESSION['items'][] = $data;
            
                    $orderDetails['userId'] =  $_SESSION['id'];
                    $orderDetails['quantity'] = $quantity;
                    $orderDetails['productid'] = $productID;
                    $orderDetails['sizeid'] =  $sizePrice['productSizeID'];
                    $orderDetails['flavorid'] = $flavorID['flavorID'];
                    $_SESSION['orderDetails'][] = $orderDetails;
                    echo"<script>alert('product added')</script>";
                    header('Location: ../products/alacartewingspage.php');

                }
                else{
                    
                $size = 'NA';
                $getproductType = "SELECT * FROM product_sizes WHERE productSizeName = '$size'";
                $sizes = $conn->query($getproductType);
                $sizePrice = $sizes->fetch_assoc();

                $image = $productRows['productImage'];
                
                $data['flavorID'] = 1;
                $data['sizeName'] = $size;
                $data['flavorName'] = "NA";
                $data['sizePrice'] = $sizePrice['productSizePrice'];
                $data['productId'] = $productRows['productID'];
                $data['quantity'] = $quantity;
                $data['image'] = $image;
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
              
                if($productRows['categoryName'] === 'Burger & Fries'){
                    echo"<script>window.location.href='burgersfriespage.php';alert('product added');</script>";
                }
                elseif($productRows['categoryName'] === 'Sandwiches & Fries'){
                    echo"<script>window.location.href='sandwichfriespage.php';alert('product added');</script>";
                }
                elseif($productRows['categoryName'] === 'Sizzling Meals'){
                    echo"<script>window.location.href='sizzlingmealpage.php';alert('product added');</script>";
                }
                elseif($productRows['categoryName'] === 'Pica Pica'){
                    echo"<script>window.location.href='picapica.php';alert('product added');</script>";
                }
                elseif($productRows['categoryName'] === 'Fries'){
                    echo"<script>window.location.href='fries.php';alert('product added');</script>";
                }
                elseif($productRows['categoryName'] === 'Rice'){
                    echo"<script>window.location.href='rice.php';alert('product added');</script>";
                }
                elseif($productRows['categoryName'] === 'Cheesecake Series'){
                    echo"<script>window.location.href='cheesecakeseriespage.php';alert('product added');</script>";
                }
                }

            }
            elseif($productRows['productType'] === 'Beverage' ){
                $image = $productRows['productImage'];

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
                $data['flavorName'] = "NA";
                $data['quantity'] = $quantity;
                $data['image'] = $image;
                $data['productName'] = $productRows['productName'];
                $data['productPrice'] = $productRows['productPrice'];
                $data["Total"] = $data['quantity'] * $data['productPrice'];
                $_SESSION['items'][] = $data;
        
                $orderDetails['flavorid'] = $data['flavorID'];
                $_SESSION['orderDetails'][] = $orderDetails;
    
                if($productRows['categoryName'] === 'Classic Milktea'){
                    echo"<script>window.location.href='classicmilkteapage.php';alert('product added');</script>";
                }
                elseif($productRows['categoryName'] === 'Frappe'){
                    echo"<script>window.location.href='frappepage.php';alert('product added');</script>";
                }
                elseif($productRows['categoryName'] === 'Premium Milktea'){
                    echo"<script>window.location.href='premiummilkteapage.php';alert('product added');</script>";
                }
                elseif($productRows['categoryName'] === 'Fruit Tea'){
                    echo"<script>window.location.href='fruitteapage.php';alert('product added');</script>";
                }
                elseif($productRows['categoryName'] === 'Iced Coffee'){
                    echo"<script>window.location.href='icedcoffepage.php';alert('product added');</script>";
                }
                elseif($productRows['categoryName'] === 'Hot Coffee'){
                    echo"<script>window.location.href='hotcoffepage.php';alert('product added');</script>";
                }
                elseif($productRows['categoryName'] === 'Sinkers'){
                    echo"<script>window.location.href='sinkerspage.php';alert('product added');</script>";
                }
            }
        }
?>