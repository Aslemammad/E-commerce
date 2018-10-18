<!DOCTYPE html>
<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');
if (!isset($_SESSION['admin_login'])){
    redirect("login.php");
}
$id = $_GET['id'];
$get_details = mysqli_query($db,"SELECT * FROM orders WHERE id='$id'");
$details = mysqli_fetch_array($get_details);
$product_ids = $details['product_ids'];
$get_ids = explode(',',$product_ids,-1);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Order details</title>
    <link href="../stylesheet/style.css" rel="stylesheet">
</head>
<body>
<div id="main">
    <h1>orders</h1>
    <hr>
    <?php require_once ('menu.php');?>
    <hr>
    <section id="main">
        <h3 align="left" style="float: left;">Total price: </h3>
        <p align="left" style="margin-left: 5px;"><?php echo $details['total_price']; ?> BTC</p>
        <h3 align="left">Order Items: </h3>
        <ul>
            <?php foreach ($get_ids as $get_id){
                $get_products = mysqli_query($db,"SELECT * FROM products WHERE id=$get_id");
                $products = mysqli_fetch_array($get_products);
                echo "<li>". $products['product_name'] . "</li>";
            } ?>
        </ul>
    </section>
</div>
</body>
</html>
