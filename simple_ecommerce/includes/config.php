<?php
  $db = mysqli_connect('localhost','root','','simple_ecommerce');

  //show errors
  if (!$db) {
    mysqli_connect_error();
    // Adnvence error reportng
    ini_set('display_errors',1);
    error_reporting(E_ALL);
  }
  session_start();

  define("admin_user","edris.qeshm2@gmail.com");
  define("admin_pass","123");
?>