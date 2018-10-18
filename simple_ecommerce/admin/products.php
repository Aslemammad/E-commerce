<!DOCTYPE html>
<?php
    require_once('../includes/config.php');
    require_once('../includes/functions.php');

// Redirect if user in not logged in
    if ($_SESSION['admin_login'] != TRUE){
        redirect("login.php");
    }

    //Get all products
    $query = mysqli_query($db,"SELECT * FROM products");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Products list</title>
    <link href="../stylesheet/style.css" rel="stylesheet">
</head>
<body>
<div id="main">
    <h1>Products list</h1>
    <hr>
    <?php require_once('menu.php');?>
    <div class="admin_main">
        <div>
            <table>
                <tr>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_array($query)){ ?>
                    <tr>
                        <td><?php echo $row['product_name'];?></td>
                        <td><?php echo $row['product_price'];?></td>
                        <td><?php echo $row['product_desc'];?></td>
                        <td><img src="../images/<?php echo $row['product_image'];?>" width="200px" height="150px"></td>
                        <td>
                            <a href="edit_product.php?id=<?php echo $row['id'] ?>">Edit</a>
                            <a href="delete_product.php?id=<?php echo $row['id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
