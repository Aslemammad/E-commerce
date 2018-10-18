<?php
    require_once ('includes/config.php');
    require_once ('includes/functions.php');
    if(!isset($_SESSION['user_login'])){redirect("login.php");}
$query = mysqli_query($db,"SELECT * FROM products LIMIT 10");
    $lists = mysqli_query($db,"SELECT * FROM products LIMIT 10");
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $get_cart_items = mysqli_query($db,"SELECT * FROM cart WHERE user_ip = '$user_ip'");
    $product_ids_for_payment = mysqli_query($db,"SELECT * FROM cart WHERE user_ip = '$user_ip'");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cart</title>
    <link href="stylesheet/style.css" rel="stylesheet">

  </head>
  <body>
    <main>
        <?php require_once ('includes/public_header.php');?>

        <section class="cart">
            <table>
                <thead>
                    <th>id</th>
                    <th>Product name</th>
                    <th>price</th>
                    <th>Image</th>
                    <th>Action</th>
                </thead>
                <?php while ($cart_items = mysqli_fetch_array($get_cart_items)){
                    $id = $cart_items['product_id'];
                    $get_product = mysqli_query($db,"SELECT * FROM products WHERE id = '$id'");
                    $product = mysqli_fetch_array($get_product);
                ?>
                <tbody>
                <?php
                    if (mysqli_num_rows($get_cart_items)>0){ ?>
                        <tr>
                            <td><?php echo $cart_items['product_id']; ?></td>
                            <td><?php echo $product['product_name']; ?></td>
                            <td><?php echo $product['product_price']; ?></td>
                            <td><img src="images/<?php echo $product['product_image']; ?>" title="<?php echo $product['product_name'];?> width="250px" height="200px"></td>
                            <td><a href="delete_from_cart.php?product_id=<?php echo $cart_items['product_id']; ?>">Delete</a></td>
                        </tr>
                        <?php }}?>
                        <tr>
                            <?php if (mysqli_num_rows($get_cart_items)>0){ ?>
                                <td colspan="5" class="payment">
                                    <form action="payment.php" method="post">
                                        <input type="hidden" name="product_ids_list" value="<?php while ($row = mysqli_fetch_array($product_ids_for_payment)) {echo $row['product_id'].",";} ?>">
                                        <button name="payment" class="pay_btn">Connect to Payment Getway</button>
                            <?php } ?>
                                </form>
                            </td>
                        </tr>
                        <?php if (mysqli_num_rows($get_cart_items)<1) { ?>
                            <tr>
                                <td  class="cart_blank" colspan="5">There is Nothing to display</td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </section>
        <?php require_once ('includes/sidebar.php');?>
        <?php require_once ('includes/footer.php');?>
    </main>
  </body>
</html>