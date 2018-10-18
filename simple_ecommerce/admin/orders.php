<!DOCTYPE html>
<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');
if (!isset($_SESSION['admin_login'])){
    redirect("login.php");
}
$get_orders = mysqli_query($db,"SELECT * FROM orders");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Orders</title>
    <link href="../stylesheet/style.css" rel="stylesheet">
</head>
<body>
<div id="main">
    <h1>orders</h1>
    <hr>
    <?php require_once ('menu.php');?>
    <hr>
    <section class="orders_admin">
        <h3 align="left">Here's recent orders:</h3>
        <ul align="left">
            <?php while ($order = mysqli_fetch_array($get_orders)){ ?>
                <li class="orders"><a href="order_details.php?id=<?php echo $order['id']; ?>">Order <?php echo $order['id']; ?></a></li>
                <li class="orders">by: <i><?php echo $order['user_email']; ?></i></li>
                <br>
            <?php } ?>
        </ul>
    </section>
</div>
</body>
</html>
