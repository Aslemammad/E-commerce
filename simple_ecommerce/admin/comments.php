<!DOCTYPE html>
<?php
    require_once('../includes/config.php');
    require_once('../includes/functions.php');

    if ($_SESSION['admin_login'] != TRUE){
        redirect("login.php");
    }
    $comments = mysqli_query($db,"SELECT * FROM comments WHERE confirmed = 0");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User comments</title>
    <link href="../stylesheet/style.css" rel="stylesheet">
</head>
<body>
<div id="main">
    <h1>User comments</h1>
    <hr>
    <?php require_once('menu.php');?>
    <div class="admin_main">
        <h2>Users comment</h2>
        <?php while ($comment = mysqli_fetch_array($comments)){ ?>
            <div class="comment_item">

                <div class="username">
                    <strong><?php echo $comment['username']; ?></strong>
                    <i><?php echo $comment['email']; ?></i>
                </div>

                <div class="text">
                    <p><?php echo $comment['text']; ?></p>
                </div>

                <div class="action">
                    <a class="confirm" href="confirm_comment.php?id=<?php echo $comment['id']; ?> ">Confirm</a>
                    &nbsp;&nbsp;&nbsp;
                    <a class="delete" href="delete_comment.php?id=<?php echo $comment['id']; ?>">Delete</a>
                </div>

            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
