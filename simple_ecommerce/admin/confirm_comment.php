<?php
    require_once ('../includes/config.php');
    require_once ('../includes/functions.php');
    $id = $_GET['id'];
    $query = mysqli_query($db,"UPDATE comments SET confirmed = '1' WHERE id = '$id'");
    if ($query){
        redirect("comments.php");
    }