<!DOCTYPE html>
<?php
    require_once('../includes/config.php');
    require_once('../includes/functions.php');
    if ($_SESSION['admin_login'] != TRUE){
        redirect("login.php");
    }
    $id = $_GET['id'];
    $query = mysqli_query($db,"SELECT * FROM users WHERE id = $id");
    $user = mysqli_fetch_array($query);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit user</title>
    <link href="../stylesheet/style.css" rel="stylesheet">
</head>
<body>
<div id="main">
    <h1>Edit user</h1>
    <hr>
    <?php require_once('menu.php');?>
    <div class="admin_main">
        <div class="edit_user">
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <input type="text" name="display_name" value="<?php echo $user['display_name']; ?>" placeholder="Display name...">
                <br>
                <input type="email" name="email" value="<?php echo $user['email']; ?>"  placeholder="Email ...">
                <br>
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <input type="password" name="password" value="<?php echo $user['password']; ?>"  placeholder="password">
                <br>
                <input type="submit" name="edit_user" value="Edit user">
            </form>
</div>
    </div>
</body>
</html>
<?php
    $status = '';
    if(isset($_POST['edit_user'])) {
        $id = $_POST['id'];
        $display_name = $_POST['display_name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        if (isset($display_name) && isset($password) && isset($email)) {
            $edit_status = mysqli_query($db, "UPDATE users SET
      display_name = '$display_name',
      email = '$email',
      password = '$password'
      WHERE id = '$id'");
            if ($edit_status) {
                $status = "The user successfully Edited.";
                redirect("Location: edit_user.php?id=$id");
            }
        }
        if ($display_name == '' || $password == '' || $email = '') {
            redirect("Location: edit_user.php?id=$id");
            $status = "Please fill the required fields.";
        }
        echo $status;
    }
?>