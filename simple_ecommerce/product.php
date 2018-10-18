<!DOCTYPE html>
<?php
require_once('includes/config.php');
require_once('includes/functions.php');
$id = $_GET['id'];
$id = mysqli_real_escape_string($db,$id);
$x = 99999999999999999999;
if ( $id < 0 || $id > $x){redirect("product.php?id=1");}
//Get all products
$query = mysqli_query($db,"SELECT * FROM products WHERE id = $id LIMIT 1");
$lists = mysqli_query($db,"SELECT * FROM products LIMIT 10");
$comments = mysqli_query($db, "SELECT * FROM comments WHERE product_id = '$id' && confirmed = 1");
?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Products</title>
    <link href="stylesheet/style.css" rel="stylesheet">

</head>
<body>
<main>
    <?php require_once ('includes/public_header.php');?>
    <section class="products">
    <?php $row = mysqli_fetch_array($query)?>
            <div class="single_product">
                <img src="images/<?php echo $row['product_image'];?>" title="<?php echo $row['product_name'];?>" alt="test" width="250px" height="200px" class="product_photo">
                <h3><?php echo $row['product_name'];?></h3>
                <p align="justify" class="product_price"><?php echo $row['product_price'];?> BTC</p>
            </div>
        <div class="product_description">
            <p><?php echo $row['product_desc'];?></p>
            <a href="add_to_cart.php?product_id=<?php echo $row['id']; ?>" ><button class="add_to_basket_btn">Add to shop basket</button></a>
        </div>

        <hr>

        <div class="comments">
            <h1>Recent comments</h1>
            <?php while ($comment = mysqli_fetch_array($comments)){ ?>
            <div class="comment_items">
                <div class="username">
                    <strong><?php echo $comment['username']; ?>: </strong>
                </div>
                <div class="comment_text">
                    <p><?php echo $comment['text']; ?></p>
                </div>
            </div>
            <?php } ?>
            <hr>
            <?php
            if (isset($_POST['add_comment'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $comment = $_POST['comment'];

                if (!empty($username) && !empty($email) && !empty($comment)){
                    $query = mysqli_query($db,"INSERT INTO comments (username,email,text,product_id) VALUE ('$username','$email','$comment','$id')");
                    if ($query){
                        $status = 'Your comment after accept by admin will be displayed.';
                    }
                    else{
                        $status = 'something is wrong.';
                    }
                }
            }
            ?>
            <h1>Whats your idea?</h1>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="text" name="username" placeholder="Name...">
                <br>
                <input type="email" name="email" placeholder="Email...">
                <br>
                <textarea name="comment" placeholder="Type your comment here..."></textarea>
                <br>
                <input type="submit" name="add_comment" value="Add comment">
            </form>
            <?php if (isset($status)) {echo $status;}; ?>
        </div>
    </section>
    <?php require_once ('includes/sidebar.php');?>
    <?php require_once ('includes/footer.php');?>
</main>
</body>
</html>