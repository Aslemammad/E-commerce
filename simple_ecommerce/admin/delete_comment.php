<?php
    require_once ('../includes/config.php');
    require_once ('../includes/functions.php');
    $id = $_GET['id'];
    $query = mysqli_query($db,"DELETE FROM comments WHERE id = '$id'");
    if ($query){
        redirect("comments.php");
    }