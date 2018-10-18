<header class="header">
    <div class="wrapper">
        <div class="logo"></div>
        <h1>Simple E-commerce</h1>
        <h2>an easy and free open source E-commerce</h2>
    </div>
</header>
<nav class="menu">
    <ul>
        <?php if(!isset($_SESSION['user_login'])){ ?>
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">login</a></li>
        <li><a href="register.php">Register</a></li>
        <?php }
        else{ ?>
            <li><a href="index.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="orders.php">Recent orders</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php } ?>
    </ul>
</nav>