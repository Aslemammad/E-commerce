<?php
    require_once('includes/config.php');
    require_once('includes/functions.php');
    if(!isset($_SESSION['user_login'])){redirect("login.php");}
    echo "Your order successfully added.";
    echo "<a href='profile.php'>Back to profile.</a>";