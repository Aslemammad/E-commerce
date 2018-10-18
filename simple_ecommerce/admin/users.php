<!DOCTYPE html>
<?php
    require_once('../includes/config.php');
    require_once('../includes/functions.php');


    // Redirect if user in not logged in
    if ($_SESSION['admin_login'] != TRUE){
        redirect("login.php");
    }

    //Get all products
    $query = mysqli_query($db,"SELECT * FROM users ORDER BY id ASC");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Users list</title>
    <link href="../stylesheet/style.css" rel="stylesheet">
</head>
<body>
<div id="main">
    <h1>Users list</h1>
    <hr>
    <?php require_once('menu.php');?>
    <div class="admin_main">
        <div class="users">
            <table>
                <tr>
                    <th>Display name</th>
                    <th>E-mail</th>
                    <th>password</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_array($query)){ ?>
                    <tr>
                        <td><?php echo $row['display_name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['password'];?></td>
                        <td>
                            <a href="edit_user.php?id=<?php echo $row['id'] ?>">Edit</a>
                            <a href="delete_user.php?id=<?php echo $row['id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
