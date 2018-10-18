<?php
    require_once('../includes/config.php');
    require_once('../includes/functions.php');

    if ($_SESSION['admin_login'] != TRUE){
        redirect("login.php");
    }
    $id = $_GET['id'];
    $query = mysqli_query($db,"DELETE FROM products WHERE id = $id");
    if ($query)
    {
        redirect("products.php");
    }
    else{
        echo 'Something is wrong!';
    }