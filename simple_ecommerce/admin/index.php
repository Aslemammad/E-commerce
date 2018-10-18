<!DOCTYPE html>
<?php
    require_once('../includes/config.php');
    require_once('../includes/functions.php');

    if ($_SESSION['admin_login'] != TRUE){
        redirect("login.php");
    }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin panel</title>
    <link href="../stylesheet/style.css" rel="stylesheet">
</head>
<body>
<div id="main">
    <h1>Admin panel</h1>
    <hr>
    <?php require_once('menu.php');?>

</div>
</body>
</html>
