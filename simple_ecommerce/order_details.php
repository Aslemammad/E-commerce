<!DOCTYPE html>
<?php
require_once('includes/config.php');
require_once('includes/functions.php');
if (!isset($_SESSION['user_login'])){
    redirect("login.php");
}
$id = $_GET['id'];
$email = $_SESSION['user_login'];
$get_display_name = mysqli_query($db,"SELECT display_name FROM users WHERE email='$email'");
$get_display_name = mysqli_fetch_array($get_display_name);
$get_details = mysqli_query($db,"SELECT * FROM orders WHERE user_email='$email' AND id='$id'");
$details = mysqli_fetch_array($get_details);
$product_ids = $details['product_ids'];
$get_ids = explode(',',$product_ids,-1);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Order details</title>
    <link href="stylesheet/style.css" rel="stylesheet">
</head>
<body>
<div id="main">
    <?php require_once ('includes/public_header.php');?>
    <section id="main">
        <h2 align="center">Order details</h2>
        <hr>
        <h3>Total price: </h3>
        <p><?php echo $details['total_price']; ?> BTC</p>
        <h3>Order Items: </h3>
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
