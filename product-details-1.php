<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Product Detail 1</title>
		
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
            <header id="header" >
                <div class="header-top">
                    <div class="container" >
                        <ul class="nav nav-pills nav-top navbar-left" >
                            <li class="logo">
                                <div class="container relative">
                                    <a href="index.php" class="logo "></a>
                                    <div class="header-search pull-right"></div></div>

                            </li>

                            <li class="dropdown langs">

                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <img src="images/UK.png" alt="uk"> <i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#"> <img src="images/arabic.png" alt="uk"></a></li>

                                    <li><a href="#"><img src="images/dutch.png" alt="uk"></a></li>
                                    <li><a href="#"><img src="images/german.png" alt="uk"></a></li>
                                </ul>
                            </li>



                            <li class="dropdown currency">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-usd"></i> <i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-eur"></i></a></li>
                                    <li><a href="#"><i class="fa fa-jpy"></i></a></li>
                                </ul>
                            </li>


                        </ul>
                        <ul class="nav nav-pills nav-top navbar-right" style="margin-top: 4px">
                            <nav>
                                <li>
                                    <div class="header-search pull-right">
                                        <div class="header-search_filter">
                                            <select class="formDropdown font-additional font-weight-normal" name="filterby" id="filterby">
                                                <option value="0">Filter By</option>
                                                <option value="date">Date</option>
                                                <option value="title">Title</option>
                                            </select>
                                            <i class="fa fa-angle-down customColor"></i>
                                        </div>






                                        <div class="header-search_form">
                                            <form class="product-search form-inline" action="#" method="POST">
                                                <div class="form-group">
                                                    <label class="sr-only" for="searchQuery">What are you looking for today.. ?</label>
                                                    <input type="search" class="product-search_field font-main font-weight-normal" id="searchQuery" placeholder="What are you looking for today.. ?">
                                                </div>
                                                <button type="submit" class="product-search_btn hvr-bounce-to-right">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </nav>
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

      <section id="pageTitleBox" class="paralax breadcrumb-container"  style="background-image: url('images/abo4.jpg'); height:350px">
        <div class="overlay"></div>
        <div class="container relative">
          <h1 class="title font-additional font-weight-normal color-main text-uppercase wow zoomIn" data-wow-delay="0.3s">Detailes about Product</h1>
          <ul class="breadcrumb-list">
            <li>
              <a href="index.php" class="font-additional font-weight-normal color-main text-uppercase">HOME</a>
              <span><i class="fa fa-angle-double-right"></i> </span>
            </li>

            <li>
              <a href="category.php" class="font-additional font-weight-normal color-main text-uppercase">Products</a>
            </li>
          </ul>
        </div>
      </section>
            <?php
            if(isset($_GET)) {
                $name = $_GET['name'];
                $price = $_GET['price'];
                $url = $_GET['url'];
            }
            ?>
			<section id="productDetails" class="product-details">
				<div class="container">
					<div class="row narrow-content">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clearfix">
							<div class="product-gallery vertical-pager">

								<ul class="bxslider" data-mode="fade" data-slide-margin="0" data-min-slides="1" data-move-slides="1" data-pager="true" data-pager-custom="#bx-pager" data-controls="false">
									<li><img src="<?php
                                        echo $url;
                                       ?>" alt="product-image" /></li>
									<li><img src="images/arrive3.jpg" alt="product-image" /></li>
									<li><img src="images/product-detail/detail-img-3.jpg" alt="product-image" /></li>
									<li><img src="images/product-detail/detail-img-4.jpg" alt="product-image" /></li>
								</ul>
							</div>
						</div>
						<div class="product-cart product-details-narrow col-lg-6 col-md-6 col-sm-12 col-xs-12 clearfix">
							<div class="product-options_header clearfix wow fadeIn" data-wow-delay="0.3s">

                                <h3 class="font-additional font-weight-bold text-uppercase"><?php
                                    echo $name
                                    ?></h3>
                                <div class="product-item_price font-additional font-weight-normal customColor"><?php
                                    echo $price;
                                    ?> <span>$265.00</span></div>
								<ul class="rating">
									<li><span aria-hidden="true" class="icon-star customColor"></span></li>
									<li><span aria-hidden="true" class="icon-star customColor"></span></li>
									<li><span aria-hidden="true" class="icon-star customColor"></span></li>
									<li><span aria-hidden="true" class="icon-star customColor"></span></li>
									<li><span aria-hidden="true" class="icon-star color-additional"></span></li>
								</ul>
							</div>
							<div class="product-options_body clearfix wow fadeIn" data-wow-delay="0.3s">
								<h4 class="font-additional font-weight-bold text-uppercase">PRODUCT DESCRIPTION</h4>
                                <?php
                                echo '';
                                ?>
								<div class="product-options_desc font-main color-third">Handmade goods is a unique experience and drastically differs from marketing mass-produced goods.<br> Owner Contact <br> Name : Dania Shukry <br> Phone: 0525513929</div>
							</div>
							<div class="product-options_cart clearfix wow fadeIn" data-wow-delay="0.3s">
								<div class="select pull-left">
									<select id="size" name="size" class="select-field font-additional">
										<option value="">Select Size</option>
										<option value="trending">extra large</option>
										<option value="sales">Large</option>
										<option value="rating">medium</option>
										<option value="price-asc">small</option>
										<option value="price-desc">extra small</option>
									</select>
									<i class="fa fa-angle-down customColor"></i>
								</div>
								<div class="select pull-right">
									<select id="color" name="color" class="select-field font-additional">
										<option value="">Select COLOR</option>
										<option value="trending">White</option>
										<option value="sales">green</option>
										<option value="rating">black</option>
										<option value="price-asc">red</option>
										<option value="price-desc">blue</option>
									</select>
									<i class="fa fa-angle-down customColor"></i>
								</div>

							</div>
							<div class="product-options_footer clearfix wow fadeIn" data-wow-delay="0.3s">
								<div class="product-options_row">									
									<h4 class="font-additional font-weight-bold text-uppercase">Share this product</h4>
									<ul class="social-list">
										<li><a href="#" class="hover-focus-border hvr-bounce-to-right before-bg"><span class="social_facebook" aria-hidden="true"></span></a></li>
										<li><a href="#" class="hover-focus-border hvr-bounce-to-right before-bg"><span class="social_twitter" aria-hidden="true"></span></a></li>
										<li><a href="#" class="hover-focus-border hvr-bounce-to-right before-bg"><span class="social_googleplus" aria-hidden="true"></span></a></li>
										<li><a href="#" class="hover-focus-border hvr-bounce-to-right before-bg"><span class="social_pinterest" aria-hidden="true"></span></a></li>
										<li><a href="#" class="hover-focus-border hvr-bounce-to-right before-bg"><span class="social_instagram" aria-hidden="true"></span></a></li>
									</ul>
								</div>
							</div>
						</div>

			</section>



      <section id="subscribe" class="subscribe-row">
        <div class="container">
          <div class="subscribe-container clearfix wow fadeInUp text-center" data-wow-delay="0.3s">
            <div class="col-sm-12 subscribe-desc font-additional font-weight-bold">SIGN UP FOR OUR MONTHLY NEWSLETTER</div>
            <div id="mc_embed_signup" class="col-sm-9 col-sm-offset-3 subscribe-form">
              <form action="#" method="post">
                  <div id="mc_embed_signup_scroll">
                      <div class="mc-field-group subscribe-field">
                          <input type="email" name="Email" class="required email font-main color-third" id="Email" required>
                      </div>
                      <div class="subscribe-button">
                          <button type="submit" value="Subscribe" name="subscribe" class="btn btn-primary font-additional hvr-bounce-to-right before-bg"> SUBSCRIBE </button>



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
                              <span class="font-main font-weight-normal color-additional">IcartHandMade Our MiniProject to buy all The HandMade</span>
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
                          <span class="footer_copyright font-main" style="color:#fff;">Created by <span class="font-main font-weight-semibold">AliProject</span> &copy; 2019 All rights reserved.</span>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
                          <ul class="footer-payments pull-right">
                              <li><img src="images/C-1.jpg" alt="Payments"></li>
                              <li><img src="images/C-2.jpg" alt="Payments"></li>
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
		<script src="js/modernizr.custom.js"></script>
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