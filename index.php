<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATN Shop</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

 
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <li>
                            <div class="dropdowna">
                                <button class="dropbtna">
                                    Product
                                    <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="dropdown-contenta">
                                    <?php 
                                    include_once('connection.php');
                                    $sq = pg_query($conn, "select cat_id, cat_name from category");
                                   while($row = pg_fetch_array($sq)){
                                       
                                   
                                    ?>
                                    <a href="?page=product&&id=<?php echo $row['cat_id'];?>">
                                        <?php echo $row['cat_name']; ?>
                                    </a>
                                    <?php }?>
                                </div>

                            </div>
                        </li>
                        <?php
                        if(!isset($_SESSION['admin']) or $_SESSION['admin']==0)
                        {
                        }
                        else{
                        ?>
                        <li>
                            <div class="dropdowna">
                                <button class="dropbtna">
                                    Management
                                    <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="dropdown-contenta">
                                    <a href="?page=category_management">Category</a>
                                    <a href="?page=product_management">Product</a>
                                    <a href="?page=shop_management">Shop</a>
                                    <a href="?page=order_management">Order</a>
                                    <a href="?page=eachshop_management">Each Shop</a>
                                </div>

                            </div>
                        </li>
                        <?php
                        }
                        ?>
                        <?php
                        if(isset($_SESSION['us'])&&$_SESSION['us']!="")
                        {
                        ?>
                        <li><a href="?page=update_customer"><i class="fa fa-user" aria-hidden="true">
        Hi, <?php echo $_SESSION['us'];?>
    </i>
</a></li>
                        <li><a href="?page=logout"><i class="fa fa-sign-out" aria-hidden="true"> Logout</i></a></li>
                        <?php
                        }
                        else
                        {
                        ?>
                        <li><a href="?page=login"><i class="fa fa-user" aria-hidden="true"> Login</i></a></li>
                        <li><a href="?page=register"><i class="fa fa-user-plus" aria-hidden="true"> Register</i></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
                <a href="?page=cart"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon"
                     onclick="menutoggle()">
            </div>
            <?php
            include_once('connection.php');
    if(isset($_GET['page'])){
        $page=$_GET['page'];
            if($page=="Content"||$page=="product"){

            }
            else{
            ?>
        </div>
    </div>
    <?php
    }}?>


    <?php
    include_once('connection.php');
    if(isset($_GET['page'])){
        $page=$_GET['page'];
        if($page=="login"){
            include_once('Login.php');
        }
        if($page=="register"){
            include_once('Register.php');
        }
        if($page=="logout"){
            include_once('Logout.php');
        }
        if($page=="product_management"){
            include_once('Product_Management.php');
        }
        if($page=="add_product"){
            include_once('Add_Product.php');
        }
        if($page=="update_product"){
            include_once('Update_Product.php');
        }
        if($page=="category_management"){
            include_once('Category_Management.php');
        }
        if($page=="add_category"){
            include_once('Add_Category.php');
        }
        if($page=="update_category"){
            include_once('Update_Category.php');
        }
        if($page=="update_customer"){
            include_once('Update_customer.php');
        }
        if($page=="aquarium"){
            include_once('Aquarium.php');
        }
        if($page=="collective"){
            include_once('Collective.php');
        }
        if($page=="feedback_management"){
            include_once('feedback_management.php');
        }
        if($page=="viewdetail"){
            include_once('viewdetail.php');
        }
        if($page=="add"){
            include_once('add.php');
        }
        if($page=="cart"){
            include_once('cart.php');
        }
         if($page=="shop_management"){
             include_once('shop_management.php');
        }
         if($page=="eachshop_management"){
             include_once('eachshop_management.php');
         }
         if($page=="add_shop"){
             include_once('add_shop.php');
         }
         if($page=="update_shop"){
             include_once('update_shop.php');
         }
         if($page=="order_management"){
             include_once('order_management.php');
         }
         if($page=="product"){
             include_once('product.php');
         }
    }
    else
    {
        include_once('content.php');
    }
    ?>
    
    
    
    <!-- ------------footer----------- -->

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone</p>
                    <div class="app-logo">
                        <img src="images/play-store.png">
                        <img src="images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logo.png">
                    <p>
                        Our Purpose Is To Sustainably Make the Pleasure and
                        Benefits of Sports Accessible to the Many
                    </p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube </li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="Copyright">Copyright 2020 - By Phan Chi Bao</p>
        </div>
    </div>
    <!-- ------------------- js for toggle menu-------------- -->
    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            }
            else {
                MenuItems.style.maxHeight = "0px";
            }
        }

    </script>
</body>
</html>