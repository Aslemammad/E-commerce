<?php
require_once('../includes/functions.php');
session_start();
if (isset($_SESSION['admin_login'])){
    unset($_SESSION['admin_login']);
    redirect("login.php");
}