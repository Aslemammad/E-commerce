<?php
    require_once('includes/config.php');
    require_once('includes/functions.php');
    if(!isset($_SESSION['user_login'])){redirect("login.php");}
$product_id = $_GET['product_id'];
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $check_cart = mysqli_query($db,"SELECT * FROM cart WHERE product_id='$product_id' AND user_ip='$user_ip'");
    if (mysqli_num_rows($check_cart)>0){
        redirect("cart.php");
    }
    else{
    $query = mysqli_query($db,"INSERT INTO cart (user_ip,product_id) VALUES ('$user_ip','$product_id')");

    if ($query){
        redirect("cart.php");
    }
    else{
        echo 'Something is wrong!';
    }
    }