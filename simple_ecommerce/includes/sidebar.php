<aside class="sidebar">
    <div class="recent_products_box">
        <div class="recent_product_title">
            <h3>Recent products</h3>
            <hr>
        </div>
        <div class="recent_products_content">
            <ul class="recent_products_list">
                <?php while ($list = mysqli_fetch_array($lists)){?>
                    <a href="product.php?id=<?php echo $list['id']; ?>"><li><?php echo $list['product_name'];?></li></a>
                <?php } ?>
            </ul>
        </div>
    </div>
</aside>