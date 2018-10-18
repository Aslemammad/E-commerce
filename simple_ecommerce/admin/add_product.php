<!DOCTYPE html>
<?php
    require_once('../includes/config.php');
    require_once('../includes/functions.php');

if ($_SESSION['admin_login'] != TRUE){
        redirect("login.php");
    }
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
            <?php require_once('menu.php') ;?>
            <div class="admin_main">
                <div class="add_product">
                    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                        <input type="text" name="product_name" placeholder="Product name...">
                        <input type="text" name="product_price" placeholder="Product price...">
                        <textarea name="product_desc" placeholder="Product description"></textarea>
                        <br>
                        <input type="text" name="image_name" placeholder="Image name">
                        <br>
                        <input type="submit" name="add_product" value="Add product">
                    </form>
                    <?php
                    $status = '';
                    if(isset($_POST['add_product']))
                    {
                        $product_name = mysqli_real_escape_string($db,$_POST['product_name']);
                        $product_price = mysqli_real_escape_string($db,$_POST['product_price']);
                        $product_desc = mysqli_real_escape_string($db,$_POST['product_desc']);
                        $image_name = mysqli_real_escape_string($db,$_POST['image_name']);
                        if (isset($product_name) && isset($product_price)) {
                            $add_status = mysqli_query($db, "INSERT INTO products (product_name,product_price,product_desc,product_image)
                                    VALUES  ('$product_name','$product_price','$product_desc','$image_name')");

                            if ($add_status) {
                                $status = "The product successfully added.";
                            }
                        }
                        if ($product_name == '' || $product_price == '')
                        {
                            $status = "Please fill the required fields.";
                        }
                    }
                    echo $status;
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
