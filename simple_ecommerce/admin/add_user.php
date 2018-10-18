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
        <title>Add user</title>
        <link href="../stylesheet/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="main">
            <h1>Add product</h1>
            <hr>
            <?php require_once ('menu.php');?>
                <hr>
                <div class="admin_main">
                    <div class="add_product">
                        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                            <input type="text" name="display_name" placeholder="Display name...">
                            <br>
                            <input type="email" name="email" placeholder="Email ...">
                            <br>
                            <input type="password" name="password" placeholder="password">
                            <br>
                            <input type="submit" name="add_user" value="Add user">
                        </form>
                        <?php
                            $status = '';
                            if(isset($_POST['add_user']))
                            {
                                $display_name = $_POST['display_name'];
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                if (isset($display_name) && isset($email) && isset($password)) {
                                    $add_status = mysqli_query($db, "INSERT INTO users (display_name,email,password)
                                    VALUES  ('$display_name','$email','$password')");

                                    if ($add_status) {
                                        $status = "The product successfully added.";
                                    }
                                }
                                if ($display_name == '' || $email == '' || $password = '')
                                {
                                    $status = "Please fill the required fields.";
                                }
                            }
                            echo $status;
                        ?>
                    </div>
                </div>
        </div>
    </body>
</html>
