<?php

    require('../db_conn.php');

    $getUsersSQL = "SELECT * FROM users";

    $users = mysqli_query($conn, $getUsersSQL);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Admin</title>
</head>
<body>
    
    <div class="wrapper">
        <?php include('adminsidebar.php') ?>
        <div class="admin-dashboard-container">
            <div class="admin-users-container">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th id="user-id">User ID</th>
                            <th id="username">Username</th>
                            <th id="user-role">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                            <tr>
                                <td><?= $user['userID'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['role'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>