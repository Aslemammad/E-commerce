<!DOCTYPE html>
<?php
require_once('includes/config.php');
require_once ('includes/functions.php');
//Get all products
$query = mysqli_query($db,"SELECT * FROM products LIMIT 10");
$lists = mysqli_query($db,"SELECT * FROM products LIMIT 10");
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Simple E-commerce</title>
    <link href="stylesheet/style.css" rel="stylesheet">

  </head>
  <body>
    <main>
        <?php require_once ('includes/public_header.php');?>

        <section class="products">
            <?php while ($rows = mysqli_fetch_array($query)){?>
            <div class="product">
                <img src="images/<?php echo $rows['product_image'];?>" title="<?php echo $rows['product_name'];?>" alt="test" width="250px" height="200px" class="product_photo">
                <h3 align="center"><?php echo $rows['product_name'];?></h3>
                <p align="justify" class="product_description"><?php custom_echo($rows['product_desc'], 120); ?></p>
                <a href="product.php?id=<?php echo $rows['id']; ?>"><button class="visit_product">Visit</button></a>
            </div>
            <?php } ?>
        </section>
        <?php require_once ('includes/sidebar.php');?>
        <?php require_once ('includes/footer.php');?>
    </main>
  </body>
</html>