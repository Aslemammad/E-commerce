<?php
    require_once('includes/config.php');
    require_once('includes/functions.php');
    if(!isset($_SESSION['user_login'])){redirect("login.php");}
    $product_ids = $_POST['product_ids_list'];
    $user_email = $_SESSION['user_login'];
    $ids = explode(",",$product_ids,-1);
    // Fetch prices by id and calculate the total price and insert to order table in DB.
    foreach ($ids as $id) {
        $query = mysqli_query($db,"SELECT product_price FROM products WHERE id='$id'");
        $list = mysqli_fetch_array($query);
        $price = $list['product_price'];
        $total_price += $price;
    }
    $pay = mysqli_query($db,"INSERT INTO orders (total_price,product_ids,user_email,paid) VALUES($total_price,'$product_ids','$user_email',1)");
    if ($pay){
        redirect("success_pay.php");
    }