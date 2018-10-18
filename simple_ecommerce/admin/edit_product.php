<!DOCTYPE html>
<?php
    require_once('../includes/config.php');
    require_once('../includes/functions.php');

if ($_SESSION['admin_login'] != TRUE){
        redirect("login.php");
    }
    $id = $_GET['id'];
    $query = mysqli_query($db,"SELECT * FROM products WHERE id = $id");
    $product = mysqli_fetch_array($query);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add product</title>
    <link href="../stylesheet/style.css" rel="stylesheet">
</head>
<body>
<div id="main">
    <h1>Add product</h1>
    <hr>
    <?php include('menu.php');?>
    <div class="admin_main">
        <div class="edit_product">
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" placeholder="Product name...">
                <input type="text" name="product_price" value="<?php echo $product['product_price']; ?>" placeholder="Product price...">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                <textarea name="product_desc" placeholder="Product description"><?php echo $product['product_desc']; ?></textarea>
                <br>
                <input type="text" name="image_name" value="<?php echo $product['product_image']; ?>" placeholder="Image name">
                <br>
                <input type="submit" name="edit_product" value="Edit product">
            </form>
</div>
    </div>
</body>
</html>
<?php
    $status = '';
    if(isset($_POST['edit_product'])) {
        $id = $_POST['id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $image_name = $_POST['image_name'];
        if (isset($product_name) && isset($product_price)) {
            $edit_status = mysqli_query($db, "UPDATE products SET
      product_name = '$product_name',
      product_price = '$product_price',
      product_desc = '$product_desc',
      product_image = '$image_name'
      WHERE id = '$id'");
            if ($edit_status) {
                $status = "The product successfully Edited.";
                redirect("edit_product.php?id=$id");
                exit;
            }
        }
        if ($product_name == '' || $product_price == '') {
            redirect("edit_product.php?id=$id");
            $status = "Please fill the required fields.";
        }
        echo $status;
    }
?>