<!DOCTYPE html>
<html lang="en">
<?php
    require_once('../includes/config.php');
    require_once('../includes/functions.php');
if(isset($_SESSION['admin_login'])){
        redirect("index.php");
    }
?>
<head>
    <meta charset="utf-8">
    <title>Admin login</title>
    <link href="../stylesheet/style.css" rel="stylesheet">
    <!-- Include files !-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <!--==============================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- End -->

</head>
<body>
<div class="limiter">
    <div class="container-login100">

        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-01.png" alt="IMG">
            </div>

            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" class="login100-form validate-form">
                        <span class="login100-form-title"> Admin login </span>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" maxlength="30" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" maxlength="30" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                </div>

                <div class="container-login100-form-btn">
                    <input  type="submit" name="admin_login" class="login100-form-btn" value="Login"/>
                </div>

                <div class="text-center p-t-12">
                            <span class="txt1">
                                Forgot
                            </span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST['admin_login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $login_check = mysqli_query($db,"SELECT * FROM admins WHERE email='$email' AND password= '$password'");
    if (mysqli_num_rows($login_check)>0)
    {
        $_SESSION['admin_login'] = $email;
        redirect("index.php");
    }
    else{
        echo 'Login was failed.';
    }
}
?>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>
</body>
</html>
