<!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/config.php');
require_once('includes/functions.php');
if(isset($_SESSION['user_login'])){redirect("profile.php");} ?>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="stylesheet/style.css" rel="stylesheet">
    <link href="admin/css/main.css" rel="stylesheet">
    <link href="admin/css/util.css" rel="stylesheet">
    <!-- hi !-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--===========================================-->

</head>
<body>
<main>
    <?php require_once('includes/public_header.php');?>
    <div class="limiter">
        <div class="container-login100">

            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="admin/images/img-01.png" alt="IMG">
                </div>

                <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" class="login100-form validate-form">
                        <span class="login100-form-title"> User login </span>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: example@site.xom">
                        <input class="input100" type="email" name="email" maxlength="30" placeholder="Email">
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
                        <input  type="submit" name="login" class="login100-form-btn" value="Login"/>
                    </div>

                    <div class="text-center p-t-12">
                            <span class="txt1">
                                Forgot
                            </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center">
                        <a class="txt2" href="register.php">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if (isset($_POST['login']))
            {
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $login_check = mysqli_query($db,"SELECT * FROM users WHERE email='$email' AND password= '$password'");
                if (mysqli_num_rows($login_check)>0)
                {
                    $_SESSION['user_login'] = $email;
		            redirect("profile.php");
                }
                else{
                    echo 'Login was failed.';
                }
            }
        ?>
    </div>
    <?php require_once('includes/footer.php');?>

</main>
</body>
</html>
