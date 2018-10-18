<!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/config.php');
require_once('includes/functions.php');
if(isset($_SESSION['user_login'])){redirect("profile.php");} ?>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
      <meta charset="utf-8">
      <title>Login</title>
      <link href="stylesheet/style.css" rel="stylesheet">
      <link href="admin/css/main.css" rel="stylesheet">
      <link href="admin/css/util.css" rel="stylesheet">
      <!-- Including section !-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
      <!--End of including section -->
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

              <div id="register">
                  <span class="login100-form-title"> User login </span>
                  <form action="<?=$_SERVER['PHP_SELF'];?>" class="login100-form validate-form" method="post">
                      <input type="text" class="input100" name="name" value="" placeholder="Display name ..."><br>
                      <div class="wrap-input100 validate-input" data-validate = "Valid email is required: example@site.xom">
                          <input class="input100" type="email" name="email" maxlength="30" placeholder="Email">
                          <span class="focus-input100"></span>
                          <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                      </div>                      <input type="password" class="input100" name="password" value="" placeholder="Enter your password here..."><br>
                      <input type="password"class="input100" name="password_repeat" value="" placeholder="Enter your password again..."><br>
                      <input type="submit" name="register" class="login100-form-btn" value="Register">
                    </form>
          </div>
            <?php
                if (isset($_POST['register']))
                {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);
                    $password_repeat = md5($_POST['password_repeat']);

                    if ($password != $password_repeat)
                    {
                        echo 'your password and repeat password is not same.';
                    }
                    else{
                        $select = mysqli_query($db, "SELECT email FROM `users` WHERE email = '$email'");
                        if(mysqli_num_rows($select)>0) {
                            die('This email is already being used');
                            exit;
                        }
                        $process = mysqli_query($db,"INSERT INTO users (display_name,email,password) VALUES ('$name','$email','$password')");
                        if ($process){
                            echo "your account registered.<a href=\"login.php\" >Login into admin panel</a>";
                        }
                    }
                }
            ?>
        </div>
          </div>
    <?php require_once('includes/footer.php');?>
  </main>
  </body>
</html>