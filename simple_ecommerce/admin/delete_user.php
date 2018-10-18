<?php
    require_once('../includes/config.php');
    require_once('../includes/functions.php');

    if ($_SESSION['admin_login'] != TRUE){
        redirect("login.php");
    }
    $id = $_GET['id'];
    $query = mysqli_query($db,"DELETE FROM users WHERE id = $id");
    if ($query)
    {
        redirect("users.php");
    }
    else{
        echo 'Something is wrong!';
    }