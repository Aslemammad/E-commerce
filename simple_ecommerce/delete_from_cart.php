<?php
    require_once ('includes/config.php');
    require_once ('includes/functions.php');

    $product_id = $_GET['product_id'];
    $user_ip = $_SERVER['REMOTE_ADDR'];

    $delete_from_cart = mysqli_query($db,"DELETE FROM cart WHERE product_id='$product_id' AND user_ip='$user_ip'");
    if ($delete_from_cart){
        redirect("cart.php");
    }
