<!DOCTYPE html>
<?php
require_once('includes/config.php');
require_once('includes/functions.php');
if (!isset($_SESSION['user_login'])){
    redirect("login.php");
}

$email = $_SESSION['user_login'];
$get_display_name = mysqli_query($db,"SELECT display_name FROM users WHERE email='$email'");
$get_display_name = mysqli_fetch_array($get_display_name);
$get_orders = mysqli_query($db,"SELECT * FROM orders WHERE user_email='$email'");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Orders</title>
    <link href="stylesheet/style.css" rel="stylesheet">
</head>
<body>
<div id="main">
    <?php require_once ('includes/public_header.php');?>
    <section>
        <h2>Orders list</h2>
        <hr>
        <ul>
        <?php while ($order = mysqli_fetch_array($get_orders)){ ?>
            <li><a href="order_details.php?id=<?php echo $order['id']; ?>">Order <?php echo $order['id']; ?></a></li>
        <?php } ?>
        </ul>
    </section>
</div>
</body>
</html>
