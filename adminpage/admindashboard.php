<?php

    require('../db_conn.php');

    if(isset($_POST['confirm-order-button'])){
        $idToUpdate = $_POST['id-to-update'];
        
        $updateStatus = "UPDATE orders SET status = 'Preparing' WHERE orderID = '$idToUpdate'";

        mysqli_query($conn, $updateStatus);
    }

    if(isset($_POST['proceed-order-button'])){
        $idToUpdate = $_POST['id-to-update'];
        
        $updateStatus = "UPDATE orders SET status = 'Out For Delivery' WHERE orderID = '$idToUpdate'";

        mysqli_query($conn, $updateStatus);
    }

    if(isset($_POST['complete-order-button'])){
        $idToUpdate = $_POST['id-to-update'];
        
        $updateStatus = "UPDATE orders SET status = 'Delivered' WHERE orderID = '$idToUpdate'";

        mysqli_query($conn, $updateStatus);
    }

    $currentMonth = date('F');

    $getProductCountSQL = "SELECT * FROM view_product_count";
    $getTotalSalesMonthSQL = "SELECT * FROM view_total_sales_month";
    $getUserCountSQL = "SELECT * FROM view_user_count";
    $getOrdersThisDaySQL = "SELECT * FROM orders WHERE orderDate = CURRENT_DATE()";

    $productCount = mysqli_fetch_assoc(mysqli_query($conn, $getProductCountSQL));
    $totalSalesMonth = mysqli_fetch_assoc(mysqli_query($conn, $getTotalSalesMonthSQL));
    $userCount = mysqli_fetch_assoc(mysqli_query($conn, $getUserCountSQL));
    $ordersThisDay = mysqli_query($conn, $getOrdersThisDaySQL);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <title>Admin</title>
</head>
<body>
        
    <div class="wrapper">
        <?php include('adminsidebar.php'); ?>
        <div class="admin-dashboard-container">
            <h1>Dashboard</h1>
            <div class="dashboard-cards-container">
                <div class="dashboard-card">
                    <h3>Number of Products</h3>
                    <div class="card-description">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-packages" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 16.5l-5 -3l5 -3l5 3v5.5l-5 3z"></path>
                            <path d="M2 13.5v5.5l5 3"></path>
                            <path d="M7 16.545l5 -3.03"></path>
                            <path d="M17 16.5l-5 -3l5 -3l5 3v5.5l-5 3z"></path>
                            <path d="M12 19l5 3"></path>
                            <path d="M17 16.5l5 -3"></path>
                            <path d="M12 13.5v-5.5l-5 -3l5 -3l5 3v5.5"></path>
                            <path d="M7 5.03v5.455"></path>
                            <path d="M12 8l5 -3"></path>
                        </svg>
                        <p><?php echo $productCount['productCount']; ?></p>
                    </div>
                </div>
                <div class="dashboard-card">
                    <h3>Total Sales (<?php echo $currentMonth ?>)</h3>
                    <div class="card-description">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bar" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 12m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                            <path d="M9 8m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                            <path d="M15 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                            <path d="M4 20l14 0"></path>
                        </svg>
                        <p><?php echo "₱ ".$totalSalesMonth['totalSales']; ?></p>
                    </div>
                </div>
                <div class="dashboard-card">
                    <h3>Total Users</h3>
                    <div class="card-description">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                        </svg>
                        <p><?php echo $userCount['userCount']; ?></p>
                    </div>
                </div>
                <!-- <div class="dashboard-card">
                    <h3>Most Purchased</h3>
                    <div class="card-description">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M9 12l2 2l4 -4"></path>
                        </svg>
                        <p><?php //echo $userCount['userCount']; ?></p>
                    </div>
                </div> -->
            </div>
            <div class="middle-dashboard-container">
                <div class="pending-orders">
                    <h2>Orders this day</h2>
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($ordersThisDay as $order): ?>
                                <tr>
                                    <td><?php echo $order['orderID']; ?></td>
                                    <td><?php echo $order['status']; ?></td>
                                    <td>
                                        <form action="" method="POST">
                                            <?php if($order['status'] == "Pending"){ ?>
                                                <input type="hidden" name="id-to-update" value="<?php echo $order['orderID']; ?>">
                                                <button class="order-actions" name="confirm-order-button">
                                                    Confirm Order
                                                </button>
                                            <?php }else if($order['status'] == "Preparing"){ ?>
                                                <input type="hidden" name="id-to-update" value="<?php echo $order['orderID']; ?>">
                                                <button class="order-actions" name="proceed-order-button">
                                                    Proceed
                                                </button>
                                            <?php }else if($order['status'] == "Out For Delivery"){ ?>
                                                <input type="hidden" name="id-to-update" value="<?php echo $order['orderID']; ?>">
                                                <button class="order-actions" name="complete-order-button">
                                                    Complete
                                                </button>
                                            <?php } ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="charts">
                    <canvas id="top5-products"></canvas>
                </div>
            </div>
        </div>
    </div>

</body>
</html>