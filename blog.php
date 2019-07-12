<!DOCTYPE html>
<?php

if(!isset($_SESSION)){
    session_start();}
//include 'loginpage.php';
//$query = "select * from user" ;
//$result = $db->query($query);
if(isset($_SESSION['login'])) {
    if ($_SESSION['login'] == 'no') {
        header('location:loginpage.php');

    }
}
else {
    header('location:loginpage.php');
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HandMade</title>

    <link href="css/master.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <link href="css/icon-menu.css" rel="stylesheet">

    <!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="plugins/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="plugins/switcher/css/color1.css" title="color1" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="plugins/switcher/css/color2.css" title="color2" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="plugins/switcher/css/color3.css" title="color3" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="plugins/switcher/css/color4.css" title="color4" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="plugins/switcher/css/color5.css" title="color5" media="all" />

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="animated-css" data-scrolling-animations="false">
<div class="sp-body">

    <!-- Loader Landing Page -->
    <div id="loader">
        <div class="loader"></div>
    </div>
    <!-- Loader end -->

    <!-- Start Switcher -->
    <div class="switcher-wrapper">
        <div class="demo_changer">
            <div class="demo-icon customBgColor"><i class="fa fa-cog fa-spin fa-2x"></i></div>
            <div class="form_holder">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="predefined_styles">
                            <div class="skin-theme-switcher">
                                <h4>Color</h4>
                                <a href="#" data-switchcolor="color1" class="styleswitch" style="background-color:#e94d38;"> </a>
                                <a href="#" data-switchcolor="color2" class="styleswitch" style="background-color:#0078ff;"> </a>
                                <a href="#" data-switchcolor="color3" class="styleswitch" style="background-color:#00ac00;"> </a>
                                <a href="#" data-switchcolor="color4" class="styleswitch" style="background-color:#e8c500;"> </a>
                                <a href="#" data-switchcolor="color5" class="styleswitch" style="background-color:#c23eff;"> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Switcher -->

    <header id="header">
        <div class="header-top">
            <div class="container">
                <ul class="nav nav-pills nav-top navbar-left">

                    <li class="dropdown langs">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><img src="images/uk.png" alt="UK"> <i class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="#"><img src="images/arabic.png" alt="Arabic"></a></li>
                            <li><a href="#"><img src="images/dutch.png" alt="dutch"></a></li>
                            <li><a href="#"><img src="images/german.png" alt="german"></a></li>
                        </ul>
                    </li>
                    <li class="dropdown currency">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-usd"></i> <i class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-eur"></i></a></li>
                            <li><a href="#"><i class="fa fa-jpy"></i></a></li>
                        </ul>
                    </li>
                    <li class="dropdown my-account">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">My Account <i class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Account</a></li>
                            <li><a href="#">Orders</a></li>
                        </ul>
                    </li>
                    <li class="dropdown my-cart">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-shopping-cart"></i></a>
                        <ul role="menu" class="dropdown-menu header-cart_product_list">
                            <li class="added-items">
                                <div class="header-cart_product_list_item clearfix">
                                    <a class="item-preview" href="product-details-1.php"><img src="images/cart-img-1.jpg" alt="Product"></a>
                                    <h4><a class="font-additional font-weight-normal hover-focus-color cart-product-title" href="product-details-1.php">Stylish Wear</a></h4>
                                    <span class="item-cat font-main font-weight-normal"><a class="hover-focus-color cart-product-category" href="#">Men</a></span>
                                    <span class="item-price font-additional font-weight-normal customColor">37.15 USD</span>
                                    <a class="item-del hover-focus-color" href="#"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </li>
                            <li class="added-items">
                                <div class="header-cart_product_list_item clearfix">
                                    <a class="item-preview" href="product-details-1.php"><img src="images/cart-img-2.jpg" alt="Product"></a>
                                    <h4><a class="font-additional font-weight-normal hover-focus-color cart-product-title" href="product-details-1.php">Bag</a></h4>
                                    <span class="item-cat font-main font-weight-normal"><a class="hover-focus-color cart-product-category" href="#">Accessories</a></span>
                                    <span class="item-price font-additional font-weight-normal customColor">60.10 USD</span>
                                    <a class="item-del hover-focus-color" href="#"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul><ul class="nav nav-pills nav-top navbar-right">
                <li class="logo">

                    <div class="container relative">
                        <a href="index.php" class="logo pull-left"></a>

                    </div>

                </li>

            </ul>
            </div>
            <div class="container-fluid trigger-container">
                <div class="row text-center">
                    <button class="menu-trigger"><i class="fa fa-bars"></i></button>
                </div>
            </div>
        </div>

    </header>

    <!-- icon-menu -->
    <nav id="icon-menu" class="main-menu" style="z-index: 1">

        <div class="scrollbar" id="style-1">
            <ul>
                <li class="lightli">
                    <a href="index.php">
                        <i class="fa fa-home fa-lg"></i>
                        <span class="nav-text">Home</span>
                    </a>
                </li>
                <li class="lightli">
                    <a href="contact.php">
                        <i class="fa fa-envelope-o fa-lg"></i>
                        <span class="nav-text">Connect us</span>
                    </a>
                </li>
                <li class="lightli">
                    <a href="addProduct.php">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="nav-text">AddProduct</span>
                    </a>
                </li>
                <li class="darkerli">
                    <a href="category.php">
                        <i class="fa fa-male fa-lg"></i>
                        <span class="nav-text">Men</span>
                    </a>
                </li>
                <li class="darkerli">
                    <a href="category-1.php">
                        <i class="fa fa-female fa-lg"></i>
                        <span class="nav-text">Women</span>
                    </a>
                </li>
                <li class="darkerli">
                    <a href="category.php">
                        <i class="fa fa-picture-o fa-user-secret"></i>
                        <span class="nav-text">Accesories</span>
                    </a>
                </li>
                <li class="darkerli">

                </li>
                <li class="darkerli">

                </li>
                <li class="darkerli">
                    <a href="blog.php">
                        <i class="fa fa-pencil-square-o fa-lg"></i>
                        <span class="nav-text">About us</span>
                    </a>
                </li>
                </li>
                <li class="lightli">
                    <a href="loginpage.php">
                        <i class="fa fa-user fa-lg"></i>
                        <span class="nav-text">log out</span>
                    </a>
                </li>
            </ul>
        </div>

    </nav>


    <!-- icon-menu -->

    <section id="pageTitleBox" class="paralax breadcrumb-container"  style="background-image: url('images/co.jpg');">
        <div class="overlay"></div>
        <div class="container relative">
            <h1 class="title font-additional font-weight-normal color-main text-uppercase wow zoomIn" data-wow-delay="0.3s">About us</h1>
            <ul class="breadcrumb-list">
                <li>
                    <a href="index.php" class="font-additional font-weight-normal color-main text-uppercase">HOME</a>
                    <span><i class="fa fa-angle-double-right"></i> </span>
                </li>
                <li>
                    <a href="#" class="font-additional font-weight-normal color-main text-uppercase">About</a>
                </li>
            </ul>
        </div>
    </section>









    <section id="blogContent" class="blog-row">


<div class="container">
    <div class="blog">
        <div class="blog-item clearfix wow fadeIn" data-wow-delay="0.3s" data-wow-duration="2s">
            <a class="blog-item_img" href="blog.html">
                <div class="blog-preview_posted customBgColor">
                    <span class="blog-preview_date font-additional font-weight-bold text-uppercase color-main">15 FEB</span>
                    <span class="blog-preview_comments font-additional font-weight-normal text-uppercase color-main">9 COMMENTS</span>
                </div>
                <img class="hvr-grow" src="images/people1.png" alt="Blog">
            </a>

            <div class="blog-item_desc">
                <div class="blog-item_body">
                    <h3 class="font-additional font-weight-bold text-uppercase">
                        <a href="blog.html">
                            Ali AbuSaleh
                        </a>
                    </h3>
                    <div class="blog-item_header">
                        <span class="blog-item_posted font-additional">Posted by</span>
                        <a href="#" class="blog-item_posted_name font-additional hover-focus-color">Web Proj</a>
                        <span class="blog-item_posted_sepparator"></span>
                        <ul class="blog-item-cats">
                            <li><a class="font-additional hover-focus-color" href="category.php">Dania</a></li>
                            <li><a class="font-additional hover-focus-color" href="category-2.html">Tubaileh</a></li>
                        </ul>
                    </div>
                    <div class="blog-item_text font-main color-third"> Looking at younger artists, like Dania and Lilac, I see that their work has something in common that is new to my generation. There's an effort to value the evidence of the hand and the handmade thing while also acknowledging the way in which the making of things with hands has such a complex, alienated place in our culture.</div>

                </div>
            </div>
        </div>





















                <div class="blog-item clearfix wow fadeIn" data-wow-delay="0.3s" data-wow-duration="2s">
                    <a class="blog-item_img" href="blog.html">
                        <div class="blog-preview_posted customBgColor">
                            <span class="blog-preview_date font-additional font-weight-bold text-uppercase color-main">15 Oct</span>
                            <span class="blog-preview_comments font-additional font-weight-normal text-uppercase color-main">15 COMMENTS</span>
                        </div>
                        <img class="hvr-grow" src="images/people1.png" alt="Blog">
                    </a>
                    <div class="blog-item_desc">
                        <div class="blog-item_body">
                            <h3 class="font-additional font-weight-bold text-uppercase">
                                <a href="blog.html">
                                    Abeer Artisit
                                </a>
                            </h3>
                            <div class="blog-item_header">
                                <span class="blog-item_posted font-additional">Posted by</span>
                                <a href="#" class="blog-item_posted_name font-additional hover-focus-color">Hadeel</a>
                                <span class="blog-item_posted_sepparator"></span>
                                <ul class="blog-item-cats">
                                    <li><a class="font-additional hover-focus-color" href="category.php">Hanki</a></li>
                                </ul>
                            </div>
                            <div class="blog-item_text font-main color-third">  I always have my journal with me. It was handmade by a guy at the San Telmo market in Buenos Aires. If you go there he can make you one. It's leather and bronze and I'm able to replace the paper when it runs out. It has a lion on the cover that I say is there to protect my thoughts </div>

                        </div>
                    </div>
                </div>


                <div class="blog-item clearfix wow fadeIn" data-wow-delay="0.3s" data-wow-duration="2s">
                    <a class="blog-item_img" href="blog.html">
                        <div class="blog-preview_posted customBgColor">
                            <span class="blog-preview_date font-additional font-weight-bold text-uppercase color-main"> 14,Dec </span>
                            <span class="blog-preview_comments font-additional font-weight-normal text-uppercase color-main">9 comments </span>
                        </div>
                        <img class="hvr-grow" src="images/people1.png" alt="Blog">
                    </a>
                    <div class="blog-item_desc">
                        <div class="blog-item_body">
                            <h3 class="font-additional font-weight-bold text-uppercase">
                                <a href="blog.html">
                                    Isamaeel Yas
                                </a>
                            </h3>
                            <div class="blog-item_header">
                                <span class="blog-item_posted font-additional">Posted by</span>
                                <a href="#" class="blog-item_posted_name font-additional hover-focus-color">Design</a>
                                <span class="blog-item_posted_sepparator"></span>
                                <ul class="blog-item-cats">
                                    <li><a class="font-additional hover-focus-color" href="category.php">Loreen,</a></li>
                                    <li><a class="font-additional hover-focus-color" href="category-2.html">Artist</a></li>
                                </ul>
                            </div>
                            <div class="blog-item_text font-main color-third">(I've always wanted to sail around the world in a handmade boat ) making what we need for life is a way of expressing creativity and of gaining greater confidence. Emotional security comes from providing the necessities of life in personal, meaningful ways, by our own hands or those of friends and loved ones. Another value in studying how things are made is to increase our appreciation for them as we better understand what makes them work. The knowledge that comes from shaping the things around us helps us build relationships with the world that are more intimate</div>

                        </div>
                    </div>
                </div>

    </div>
</div>
        <section id="blogContent1 class="blog-row" >
            <div class="container">
    <div id="blog-contact" class="col-sm-8 contact-form">
        <h3 class="font-additional font-weight-bold text-uppercase">Message</h3>
        <form id="contactForm" class="message-form form-inline">
            <div class="form-group half-wigth pull-left">
                <label class="sr-only" for="user-name">NAME</label>
                <input type="text" class="message-field font-additional font-weight-normal color-third text-uppercase" id="user-name" placeholder="NAME" required>
            </div>
            <div class="form-group half-wigth pull-right">
                <label class="sr-only" for="user-email">EMAIL</label>
                <input type="email" class="message-field font-additional font-weight-normal color-third text-uppercase" id="user-email" placeholder="EMAIL" required>
            </div>
            <div class="form-group full-width pull-left">
                <label class="sr-only" for="user-message">Message</label>
                <textarea class="message-field font-additional font-weight-normal color-third text-uppercase" id="user-message" placeholder="Message" required></textarea>
            </div>
            <button type="submit" class="btn send-button font-additional font-weight-normal btn-block hvr-bounce-to-right hover-focus-border before-bg">Send Message</button>
        </form>
    </div>
            </div> </section>
    <section id="subscribe" class="subscribe-row">
        <div class="container">
            <div class="subscribe-container clearfix wow fadeInUp text-center" data-wow-delay="0.3s">
                <div class="col-sm-12 subscribe-desc font-additional font-weight-bold">SIGN UP FOR OUR MONTHLY NEWSLETTER</div>
                <div id="mc_embed_signup" class="col-sm-9 col-sm-offset-3 subscribe-form">
                    <form action="#" method="post">
                        <div id="mc_embed_signup_scroll">
                            <<div class="mc-field-group subscribe-field">
                                <input type="email" name="Email" class="required email font-main color-third" id="Email" required>
                            </div>
                            <div class="subscribe-button">
                                <button type="submit" value="Subscribe" name="subscribe" class="btn btn-primary font-additional hvr-bounce-to-right before-bg"> SUBSCRIBE </button>
                                <input type="hidden" name="button_pressed" value="1" />

                                <?php
                                if( isset($_POST['button_pressed'])&& !empty($_POST["button_pressed"])) {
                                    $mail= $_POST["Email"];
                                    $mysql = "insert into subscribe(`mail`) VALUE ('$mail');";
                                    $result = $db->query($mysql);
                                    if(!$result){
                                        echo'again plz!';
                                    }
                                    else{
                                        echo'thanks for your subscribe';
                                    }
                                    $db->close();
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <a class="goToTop font-additional color-main text-uppercase" href="#" id="scrollTop">
            <i class="fa fa-angle-up"></i>
            <span>Top</span>
        </a>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 clearfix wow fadeIn" data-wow-delay="0.3s" data-wow-duration="2s">
                        <a href="index.php" class="footer-top_logo"></a>
                        <div class="footer-top_container clearfix">
                            <span class="font-main font-weight-normal color-additional">IcartHandMade Our MiniProject to buy all The HandMade </span>
                            <ul class="footer-social-list">
                                <li><a href="#"><span class="social_facebook" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="social_twitter" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="social_googleplus" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="social_pinterest" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="social_youtube" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="social_instagram" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 clearfix wow fadeIn" data-wow-delay="0.6s" data-wow-duration="2s">
                        <h4><span class="footer-top_title color-main font-additional font-weight-bold text-uppercase">QUICK LINKS</span></h4>
                        <div class="footer-top_container clearfix">
                            <ul class="footer-nav">
                                <li><a href="#" class="font-main font-weight-normal color-additional"><i class="fa fa-caret-right customColor"></i> My Account</a></li>
                                <li><a href="#" class="font-main font-weight-normal color-additional"><i class="fa fa-caret-right customColor"></i> My Wishlist</a></li>
                                <li><a href="#" class="font-main font-weight-normal color-additional"><i class="fa fa-caret-right customColor"></i> Order Tracking</a></li>
                                <li><a href="#" class="font-main font-weight-normal color-additional"><i class="fa fa-caret-right customColor"></i> Order History</a></li>
                                <li><a href="#" class="font-main font-weight-normal color-additional"><i class="fa fa-caret-right customColor"></i> Shipping Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 clearfix wow fadeIn" data-wow-delay="0.9s" data-wow-duration="2s">
                        <h4><span class="footer-top_title color-main font-additional font-weight-bold text-uppercase">INFORMATION</span></h4>
                        <div class="footer-top_container clearfix">
                            <ul class="footer-nav">
                                <li><a href="#" class="font-main font-weight-normal color-additional"><i class="fa fa-caret-right customColor"></i> About us</a></li>
                                <li><a href="#" class="font-main font-weight-normal color-additional"><i class="fa fa-caret-right customColor"></i> Contact us</a></li>
                                <li><a href="#" class="font-main font-weight-normal color-additional"><i class="fa fa-caret-right customColor"></i> Privacy Policy</a></li>
                                <li><a href="#" class="font-main font-weight-normal color-additional"><i class="fa fa-caret-right customColor"></i> Terms &amp; Conditions</a></li>
                                <li><a href="#" class="font-main font-weight-normal color-additional"><i class="fa fa-caret-right customColor"></i> Return Policy</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 clearfix wow fadeIn" data-wow-delay="1.2s" data-wow-duration="2s">
                        <h4><span class="footer-top_title color-main font-additional font-weight-bold text-uppercase">GET IN TOUCH</span></h4>
                        <div class="footer-top_container clearfix">
                            <ul class="footer-contact">
                                <li class="font-main font-weight-normal color-additional">
                                    <span class="icon_pin" aria-hidden="true"></span>
                                    Nablus <br>Palestine
                                </li>
                                <li class="font-main font-weight-normal color-additional oneLine">
                                    <span class="icon_phone" aria-hidden="true"></span>
                                    (00972)599283598
                                </li>
                                <li class="font-main font-weight-normal color-additional oneLine">
                                    <span class="icon_mail" aria-hidden="true"></span>
                                    Aliabusaleh@gmail.com
                                </li>
                                <li class="font-main font-weight-normal color-additional">
                                    <span class="icon_clock" aria-hidden="true"></span>
                                    Sun to thurs : 08:30 AM - 09:30 PM <br> Sat : 10:00 PM - 4:00 PM
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
                        <span class="footer_copyright font-main" style="color:#fff;">Created by <span class="font-main font-weight-semibold">AliProject </span> &copy; 2019 All rights reserved.</span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
                        <ul class="footer-payments pull-right">
                            <li><img src="images/C-1.jpg" alt="Payments"></li>
                            <li><img src="images/C-2.jpg" alt="Payments"></li>  <! -- visa image >
                            <li><img src="images/C-3.jpg" alt="Payments"></li>
                            <li><img src="images/C-4.jpg" alt="Payments"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.placeholder.min.js"></script>
<script src="js/smoothscroll.min.js"></script>
<script src="js/classie.js"></script>

<script src="plugins/owl-carousel/owl.carousel.min.js"></script>

<script src="plugins/bxslider/jquery.bxslider.min.js"></script>

<script src="plugins/switcher/js/bootstrap-select.js"></script>
<script src="plugins/switcher/js/evol.colorpicker.min.js" type="text/javascript"></script>
<script src="plugins/switcher/js/dmss.js"></script>

<script type="text/javascript" src="plugins/isotope/jquery.isotope.min.js"></script>

<script src="js/wow.min.js"></script>
<script src="js/cssua.min.js"></script>
<script src="js/theme.js"></script>
</body>
</html>