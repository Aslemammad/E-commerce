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

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link href="stylesheet/style.css" rel="stylesheet">
</head>
<body>
    <div id="main">
        <?php require_once ('includes/public_header.php');?>
        <h1>User profile</h1>
        <hr>
                <ul>
                    <li>Name: <?= $get_display_name['display_name']; ?></li><br>
                    <li>Email:  <?= $email ?></li>
                </ul>
    </div>
</body>
</html>
