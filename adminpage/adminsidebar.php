<?php

    session_start();

    if(isset($_POST['admin-logout'])){
        session_destroy();
        header('Location: ../loginpage/adminlogin.php');
    }

    if(isset($_POST['admin-dashboard'])){
        header('Location: admindashboard.php');
    }
    
    if(isset($_POST['admin-transactions'])){
        header('Location: admintransaction.php');
    }

    if(isset($_POST['admin-products'])){
        
    }

?>

<div class="admin-sidebar">
    <div class="admin-top-buttons">
        <form action="" method="POST">
            <button class="sidebar-buttons" name="admin-dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M13.45 11.55l2.05 -2.05"></path>
                    <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                </svg>
                Dashboard
            </button>
            <button class="sidebar-buttons" name="admin-transactions">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-history" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 8l0 4l2 2"></path>
                    <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5"></path>
                </svg>
                Order History
            </button>
            <button class="sidebar-buttons" name="admin-products">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                    <path d="M12 12l8 -4.5" />
                    <path d="M12 12l0 9" />
                    <path d="M12 12l-8 -4.5" />
                    <path d="M16 5.25l-8 4.5" />
                </svg>
                Products
            </button>
        </form>
    </div>
    <div class="admin-bottom-buttons">
        <form class="bottom-buttons" action="adminsidebar.php" method="POST">
            <button class="sidebar-buttons" type="submit" name="admin-profile">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                </svg>
                Profile
            </button>
            <button class="sidebar-buttons" type="submit" name="admin-logout">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2"></path>
                    <path d="M15 12h-12l3 -3"></path>
                    <path d="M6 15l-3 -3"></path>
                </svg>
                Logout
            </button>
        </form>
    </div>
</div>