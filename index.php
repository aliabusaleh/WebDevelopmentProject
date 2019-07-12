<!DOCTYPE html>
<?php
include 'DatabaseConfig.php';
if(!isset($_SESSION)){
session_start();}
//include 'loginpage.php';
//$query = "select * from user" ;
//$result = $db->query($query);
if(isset($_SESSION['login'])) {
    if ($_SESSION['login'] == 'no') {
        header('location:loginpage.php');

    }
    else{
        $query = "select * from user where Email ='" . $_SESSION['email'] . "'";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
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
		<title>Handmade Center</title>
        <?php

        if(!empty($_GET)) {

        }
        ?>


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
                        <li>
                            <div class="customColor" style="position: relative; top: 30px; margin-right: 2px;">
                                <label style="margin: 9px; margin-top: 0px" >
                                    <?php
                                    if(isset($row)){

                                    echo $row['Name'];}
                                    else
                                    {
                                        echo' Guest';
                                    }
                                    ?>
                                </label>

                            </div>
                        </li>

              <li class="dropdown my-cart">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-shopping-cart"></i></a>
                <ul role="menu" class="dropdown-menu header-cart_product_list">
                    <li class="added-items">
                      <div class="header-cart_product_list_item clearfix">
                        <a class="item-preview" href="product-details-1.php"><img src="images/W2HW.jpg" alt="Product"></a>
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

  					</ul>

                        <ul class="logo pull-right">
                            <li class="logo" >


                                <a href="index.php" class="logo" style="align-items : center;"></a>



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

			<section id="main-slider">
				<div id="owl-main-slider" class="enable-owl-carousel owl-main-slider owl-carousel owl-theme" data-navigation="true" data-pagination="false" data-single-item="true" data-auto-play="7000" data-transition-style="fadeUp" data-main-text-animation="true" data-after-init-delay="4000" data-after-move-delay="500" data-stop-on-hover="true">
					<div class="item slide1">
						<img src="images/main-slider/selling.jpg" width="1500px" height="400px" alt="Slide 1">
						<div class="main-slider_content">
							<div class="main-slider_smalltitle main-slider_zoomIn animated" style="visibility: hidden;"><span class="customColor">get upto 30% offer for order over $200!</span></div>
							<h3 class="main-slider_title font-additional font-weight-bold main-slider_fadeInLeft animated" style="visibility: hidden;">BIGGEST HANDMADE 2019<br>  COLLECTION</h3>
							<div class="main-slider_row">
								<div class="line-separator main-slider_zoomIn animated" style="visibility: hidden;">
									<img src="images/seperator.png" alt="seperator">
								</div>
							</div>
							<div class="main-slider_buttons">
								<a href="#" class="btn button-border font-additional font-weight-bold hvr-bounce-to-right main-slider_fadeInLeftBig animated before-bg customBorderColor customColor" style="visibility: hidden; ">SHOP NOW</a>
								<a href="#" class="btn button-border font-additional font-weight-bold hvr-bounce-to-right main-slider_fadeInRightBig animated before-bg customBorderColor customColor" style="visibility: hidden;">PURCHASE</a>
							</div>
						</div>
					</div>
					<div class="item slide2">
						<img src="images/main-slider/selling.jpg" width="1500px" height="400px" alt="Slide 2">
						<div class="main-slider_content">
							<div class="main-slider_row">
								<div class="line-separator main-slider_zoomIn animated" style="visibility: hidden;">
									<img src="images/seperator.png" alt="seperator">
								</div>
							</div>
							<div class="main-slider_smalltitle main-slider_zoomIn animated" style="visibility: hidden;"><span class="customColor">Best Quality</div>
							<span class="main-slider_smalltitle main-slider_zoomIn animated" style="visibility: hidden;"><span class="customColor">Handmade 2019/2020 products, best gifts ever </span><div class="main-slider_buttons">
								<a href="#" class="btn button-border font-additional font-weight-bold hvr-bounce-to-right main-slider_slideInUp animated before-bg customBorderColor customColor" style="visibility: hidden;">SHOP NOW</a>
							</div>
						</div>
					</div>
					<div class="item slide3">
						<img src="images/main-slider/selling.jpg" width="1500px" height="400px" alt="Slide 3">
						<div class="main-slider_content">
							
							<h1 class="main-slider_smalltitle main-slider_zoomIn animated" style="visibility: hidden;"><span class="customColor" >Made with Love</h1>
							<div class="main-slider_row">
								<div class="line-separator main-slider_zoomIn animated" style="visibility: hidden;">
									<img src="images/white-seperator.png" alt="seperator">
								</div>
							</div>
							<span class="main-slider_smalltitle main-slider_zoomIn animated" style="visibility: hidden; font-size:120%"><span class="customColor" >Everything here is made with Love for you, we choice our product carefully to handled your basics </span>
							<div class="main-slider_buttons">
								<a href="#" class="btn button-border font-additional font-weight-bold hvr-bounce-to-top main-slider_slideInUp animated before-bg customBorderColor customColor" style="visibility: hidden;">SHOP NOW</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="categories">
				<div class="container clearfix">
					<ul class="category-images">
						<li class="grid">
							<figure class="effect-ruby wow fadeIn" data-wow-delay="0.3s" data-wow-duration="2s">
								<img src="images/Men_main.jpg" width="40px" height="280px" alt="product">
								<figcaption>
									<div class="category-images_content">
										<p class="bottom-text font-additional font-weight-bold text-uppercase color-main customBgColor">You are the Best</p>
                    <h2 class="font-additional font-weight-bold text-uppercase color-main customBgColor">For Men</h2>
									</div>
									<a href="#">View more</a>
								</figcaption>			
							</figure>
						</li>

						<li class="grid left-space right-space">
							<figure class="effect-ruby wow fadeIn" data-wow-delay="0.6s" data-wow-duration="2s">
								<img src="images/acc_main.jpg" width="40px" height="280px"  alt="Category">
								<figcaption>
									<div class="category-images_content">
										<p class="bottom-text font-additional font-weight-bold text-uppercase color-main customBgColor">we care about both of you</p>
										<h2 class="font-additional font-weight-bold text-uppercase color-main customBgColor">Accessories</h2>
									</div>
									<a href="#">View more</a>
								</figcaption>
							</figure>
						</li>

						<li class="grid ">
							<figure class="effect-ruby wow fadeIn" data-wow-delay="0.6s" data-wow-duration="2s">
								<img src="images/Women_main.jpg"  width="40px" height="280px" alt="Category">
								<figcaption>
									<div class="category-images_content">
										<p class="bottom-text font-additional font-weight-bold text-uppercase color-main customBgColor">Your are the Kindness</p>
                    <h2 class="font-additional font-weight-bold text-uppercase color-main customBgColor">For Women</h2>
									</div>
									<a href="#">View more</a>
								</figcaption>			
							</figure>
						</li>

					</ul>
				</div>
			</section>

			<section id="collection" class="borderTopSeparator">
				<div class="container relative">
					
					<div class="isotopeBox">
						<h2 class="title font-additional font-weight-bold text-uppercase wow fadeInUp" data-wow-duration="2s">BEST Products</h2>
						<span class="subTitle font-additional font-weight-normal text-uppercase wow fadeIn" data-wow-duration="2s">BEST SELLER / TRENDY COLLECTION</span>
						<div class="line-seperatorBox clearfix">
							<div class="line-seperator">
								<img src="images/seperator.png" alt="seperator">
							</div>
							<ul id="filter" class="product-filter clearfix">
								<li>
									<a href="#addProduct.html" class="current btn font-additional font-weight-normal text-uppercase before-bg hvr-bounce-to-right" data-filter=".newproducts">NEW PRODUCTS</a>
								</li>
								<li>
									<a href="#" class="btn font-additional font-weight-normal text-uppercase before-bg hvr-bounce-to-right" data-filter=".popular">POPULAR</a>
								</li>
								<li>
									<a href="#" class="btn font-additional font-weight-normal text-uppercase before-bg hvr-bounce-to-right" data-filter=".discount">DISCOUNT</a>
								</li>
							</ul>
							<div class="isotope-frame">
								<div class="isotope-filter">
									<div class="isotope-item  newproducts discount">
										<div class="product-item hvr-underline-from-center">
											<div class="product-item_body">
												<img class="product-item_image" src="images/women%20cap.jpg" alt="Product">
												<a class="product-item_link" href="product-details-1.php">
													<span class="product-item_sale color-main font-additional customBgColor circle">-15%</span>
												</a>









												<div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div></div>

											<a href="product-details-1.php" class="product-item_footer">
												<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">Special HandMade for Cap</div>
												<div class="product-item_price font-additional font-weight-normal customColor">$240.00 <span>$2.00</span></div>

                                            </a>
										</div>
									</div>
									<div class="isotope-item  newproducts popular">
										<div class="product-item hvr-underline-from-center">
											<div class="product-item_body">
												<img class="product-item_image" src="images/products/dania1.jpg" alt="Product" width="1000px" height="700">
												<a class="product-item_link" href="product-details-1.php">
													<span class="product-item_new color-main font-additional text-uppercase circle">new</span>
												</a>
												<div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
											</div>
											<a href="product-details-1.php" class="product-item_footer">
												<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">stylish Socks</div>
												<div class="product-item_price font-additional font-weight-normal customColor">$60.00</div>
                                            </a>
										</div>
									</div>
									<div class="isotope-item  newproducts discount">
										<div class="product-item hvr-underline-from-center">
											<div class="product-item_body">
												<img class="product-item_image" src="images/blackDress.jpg" alt="Product" width="800" height="1000">
												<a class="product-item_link" href="product-details-1.php?name=HandMade Wear&price=70$&url=images/blackDress.jpg"></a>
												<div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
											</div>
											<a href="product-details-1.php" class="product-item_footer">
												<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">HandMade WEAR</div>
												<div class="product-item_price font-additional font-weight-normal customColor">$170.00</div>


                                            </a>
										</div>
									</div>
									<div class="isotope-item  newproducts popular">
										<div class="product-item hvr-underline-from-center">
											<div class="product-item_body">
												<img class="product-item_image" src="images/WomenCloth.jpg" alt="Product">
												<a class="product-item_link" href="product-details-1.php?name=HandMade Dress&price=300$&url=images/WomenCloth.jpg">
													<span class="product-item_sale color-main font-additional customBgColor circle">-20%</span>
													<span class="product-item_outofstock color-main font-additional circle">OUT OF STOCK</span>
												</a>
												<div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
											</div>
											<a href="product-details-1.php" class="product-item_footer">
												<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">HandMade Dresses</div>
												<div class="product-item_price font-additional font-weight-normal customColor">$300.00</div>


                                            </a>
										</div>
									</div>
									<div class="isotope-item  popular">
										<div class="product-item hvr-underline-from-center">
											<div class="product-item_body">
												<img class="product-item_image" src="images/H5.jpg" alt="Product">
												<a class="product-item_link" href="product-details-1.php?name=HandMade NoteBook&price=20&url=images/H5.jpg">
													<span class="product-item_sale color-main font-additional customBgColor circle">-15%</span>
												</a>
												<div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
											</div>
											<a href="product-details-1.php" class="product-item_footer">
												<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">HandMade Notebook</div>
												<div class="product-item_price font-additional font-weight-normal customColor">$20.00 <span>$250.00</span></div>


                                            </a>
										</div>
									</div>
									<div class="isotope-item  discount">
										<div class="product-item hvr-underline-from-center">
											<div class="product-item_body">
												<img class="product-item_image" src="images/ali.jpg" alt="Product">
												<a class="product-item_link" href="product-details-1.php?name=Book Mark HanMade&price=500$&url=images/ali.jpg">
													<span class="product-item_new color-main font-additional text-uppercase circle">new</span>
												</a>
												<div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
											</div>
											<a href="product-details-1.php" class="product-item_footer">
												<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">Book Mark HandMade</div>
												<div class="product-item_price font-additional font-weight-normal customColor">$500.00</div>

                                            </a>
										</div>
									</div>
									<div class="isotope-item  popular">
										<div class="product-item hvr-underline-from-center">
											<div class="product-item_body">
												<img class="product-item_image" src="images/blackDress.jpg" alt="Product">
												<a class="product-item_link" href="product-details-1.php?name=HandMade&price=15$&url=images/blackDress.jpg"></a>
												<div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
											</div>
											<a href="product-details-1.php" class="product-item_footer">
												<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">HandMade </div>
												<div class="product-item_price font-additional font-weight-normal customColor">$15.00</div>

                                            </a>
										</div>
									</div>
									<div class="isotope-item discount">
										<div class="product-item hvr-underline-from-center">
											<div class="product-item_body">
												<img class="product-item_image" src="images/H4.jpg" alt="Product">
												<a class="product-item_link" href="product-details-1.php?name=HandMade for Babies&price=150$&url=images/H4.jpg">
													<span class="product-item_sale color-main font-additional customBgColor circle">-20%</span>
													<span class="product-item_outofstock color-main font-additional circle">OUT OF STOCK</span>
												</a>
												<div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
											</div>
											<a href="product-details-1.php" class="product-item_footer">
												<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">HandMade For Babies</div>
												<div class="product-item_price font-additional font-weight-normal customColor">$150.00</div>


                                            </a>
										</div>
									</div>
                  <div class="isotope-item  newproducts">
                    <div class="product-item hvr-underline-from-center">
                      <div class="product-item_body">
                        <img class="product-item_image" src="images/H3.jpg" alt="Product">
                        <a class="product-item_link" href="product-details-1.php?name=NoteBook&price=220$&url=images/H3.jpg">
                          <span class="product-item_sale color-main font-additional customBgColor circle">-10%</span>
                        </a>
                        <div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
                      </div>
                      <a href="product-details-1.php" class="product-item_footer">
                        <div class="product-item_title font-additional font-weight-bold text-center text-uppercase">NoteBook</div>
                        <div class="product-item_price font-additional font-weight-normal customColor">$260.00 <span>$220.00</span></div>
                      </a>
                    </div>
                  </div>
                  <div class="isotope-item  newproducts">
                    <div class="product-item hvr-underline-from-center">
                      <div class="product-item_body">
                        <img class="product-item_image" src="images/H4.jpg" alt="Product">
                        <a class="product-item_link" href="product-details-1.php?name=Book Mark&price=460$&url=images/H4.jpg">
                          <span class="product-item_new color-main font-additional text-uppercase circle">new</span>
                        </a>
                        <div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
                      </div>
                      <a href="product-details-1.php" class="product-item_footer">
                        <div class="product-item_title font-additional font-weight-bold text-center text-uppercase">Book Mark</div>
                        <div class="product-item_price font-additional font-weight-normal customColor">$460.00</div>
                      </a>
                    </div>
                  </div>
                  <div class="isotope-item  newproducts">
                    <div class="product-item hvr-underline-from-center">
                      <div class="product-item_body">
                        <img class="product-item_image" src="images/Hm9.jpg" alt="Product">
                        <a class="product-item_link" href="product-details-1.php?name=HandMade &price=175$&url=images/Hm9.jpg"></a>
                        <div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
                      </div>
                      <a href="product-details-1.php" class="product-item_footer">
                        <div class="product-item_title font-additional font-weight-bold text-center text-uppercase">Hand Made</div>
                        <div class="product-item_price font-additional font-weight-normal customColor">$175.00</div>
                      </a>
                    </div>
                  </div>
                  <div class="isotope-item newproducts">
                    <div class="product-item hvr-underline-from-center">
                      <div class="product-item_body">
                        <img class="product-item_image" src="images/detail.jpg" alt="Product">
                        <a class="product-item_link" href="product-details-1.php?name=Babies Dress&price=200$&url=images/detail.jpg">
                          <span class="product-item_sale color-main font-additional customBgColor circle">-10%</span>
                          <span class="product-item_outofstock color-main font-additional circle">OUT OF STOCK</span>
                        </a>
                        <div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
                      </div>
                      <a href="product-details-1.php" class="product-item_footer">
                        <div class="product-item_title font-additional font-weight-bold text-center text-uppercase">Babies DRESS</div>
                        <div class="product-item_price font-additional font-weight-normal customColor">$200.00</div>
                      </a>
                    </div>
                  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="discount" class="discount background-container">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clearfix">
							<img class="discount-image wow fadeIn" data-wow-delay="0.3s" data-wow-duration="2s" src="images/drawing-33437_1280.png" width="420px" height="380px" alt="Discounts">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clearfix text-center">
							<div class="discount-info">
								<span class="discount-info_small_txt customColor text-uppercase wow fadeInUp text-center" data-wow-delay="0.6s" data-wow-duration="2s">get upto 40% offer for order over $499!</span>
								<span class="discount-info_shadow_txt font-additional font-weight-bold text-uppercase wow fadeIn text-center" data-wow-delay="0.8s" data-wow-duration="2s" style="color:#000;">The Best <BR>Painter Ever</span>
                <div class="line-separatorBox">
                  <div class="line-separator" style="visibility: hidden; margin-top:15px; margin-bottom:30px;">
                    <img src="images/seperator.png" alt="seperator">
                  </div>
                </div>
								<a href="#" class="discount-info_link button-border font-additional font-weight-bold customBorderColor text-uppercase hvr-bounce-to-right before-bg" >VIEW COLLECTION</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="slider" class="slider-container">
				<div class="container">
          <div class="row">
					<h2 class="title font-additional font-weight-bold text-uppercase wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="2s">LAST ARRIVALS</h2>
					<span class="subTitle font-additional font-weight-normal text-uppercase wow fadeIn" data-wow-duration="2s">MIX COLLECTION</span>
					  <div class="line-separatorBox text-center">
              <div class="line-separator animated" style="visibility: visible; margin-top:15px; margin-bottom:30px;">
                  <img src="images/cutedress.jpg" alt="seperator" width="800px" height="400px" style="opacity: 0.9;">
                </div>
            </div>
						<div id="owl-product-slider" class="enable-owl-carousel owl-product-slider owl-bottom-pagination owl-carousel owl-theme" data-navigation="true" data-pagination="false" data-single-item="false" data-auto-play="false" data-transition-style="false" data-main-text-animation="false" data-min600="2" data-min800="3" data-min1200="4">
							<div class="item">
								<div class="product-item hvr-underline-from-center">
									<div class="product-item_body product-border">
										<img alt="Product" src="images/arrive1.jpg" class="product-item_image">
										<a href="product-details-1.php?name=Spicial Book mark&price=240$&url=images/arrivel.jpg" class="product-item_link">
											<span class="product-item_sale color-main font-additional customBgColor circle">-10%</span>
										</a>
										<div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
									</div>
									<a class="product-item_footer" href="product-details-1.php?name=Spicial Book mark&price=240$&url=images/arrivel.jpg">
										<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">Special book mark</div>
										<div class="product-item_price font-additional font-weight-normal customColor">$240.00</div>
									</a>
								</div>
							</div>
							<div class="item">
								<div class="product-item hvr-underline-from-center">
									<div class="product-item_body product-border">
										<img alt="Product" src="images/summer.jpg" class="product-item_image">
										<a href="product-details-1.php?name=HandMade Accessoes&price=260$&url=images/summer.jpg" class="product-item_link">
											<span class="product-item_new color-main font-additional text-uppercase circle">new</span>
										</a>
										<div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
									</div>
									<a class="product-item_footer" href="product-details-1.php?name=HandMade Accessoes&price=260$&url=images/summer.jpg">
										<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">HandMade Accessories</div>
										<div class="product-item_price font-additional font-weight-normal customColor">$260.00 <span>$300.00</span></div>
									</a>
								</div>
							</div>
							<div class="item">
								<div class="product-item hvr-underline-from-center">
									<div class="product-item_body product-border">
										<img alt="Product" src="images/ali.jpg" class="product-item_image">
										<a href="product-details-1.php?name=Special HandMade for Ali&price=175$&url=images/ali.jpg" class="product-item_link">
											<span class="product-item_outofstock color-main font-additional circle">OUT OF STOCK</span>
										</a>
										<div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
									</div>
									<a class="product-item_footer" href="product-details-1.php">
										<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">Special HandMade For Ali</div>
										<div class="product-item_price font-additional font-weight-normal customColor">$175.00</div>
									</a>
								</div>
							</div>
							<div class="item">
								<div class="product-item hvr-underline-from-center">
									<div class="product-item_body product-border">
										<img alt="Product" src="images/arrive2.jpg" class="product-item_image">
										<a href="product-details-1.php?name=HandMade for your Home&price=300$&url=images/arrive2.jpg" class="product-item_link">
											<span class="product-item_sale color-main font-additional customBgColor circle">-20%</span>
										</a>
										<div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                        </div>
									</div>
									<a class="product-item_footer" href="product-details-1.php">
										<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">HandMade for your Home</div>
										<div class="product-item_price font-additional font-weight-normal customColor">$300.00</div>
									</a>
								</div>
							</div>
							<div class="item">
								<div class="product-item hvr-underline-from-center">
									<div class="product-item_body product-border">
										<img alt="Product" src="images/arrive3.jpg" class="product-item_image">
										<a href="product-details-1.php?name=Travel Bag&price=175$&url=images/arrive3.jpg" class="product-item_link">
											<span class="product-item_sale color-main font-additional customBgColor circle">-15%</span>
										</a>
										<div class="product-sidebar">
                          <a href="#" class="buy">
                            <span>BUY ITEM</span>
                          </a>

                          <a href="product-details-1.php" class="info">
                            <span>QUICK VIEW</span>
                          </a>

                          <a href="#" class="favorites">
                            <span>ADD TO FAVORITE</span>
                          </a>
                    </div>
									</div>
									<a class="product-item_footer" href="product-details-1.php">
										<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">TRAVEL BAG</div>
										<div class="product-item_price font-additional font-weight-normal customColor">$175.00</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>


			<section id="subscribe" class="subscribe-row">
				<div class="container">
					<div class="subscribe-container clearfix wow fadeInUp text-center" data-wow-delay="0.3s">
						<div class="col-sm-12 subscribe-desc font-additional font-weight-bold">SIGN UP FOR OUR MONTHLY NEWSLETTER</div>
						<div id="mc_embed_signup" class="col-sm-9 col-sm-offset-3 subscribe-form">
							<form action="" method="post">
                <div id="mc_embed_signup_scroll">
                  <div class="mc-field-group subscribe-field">
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

                      <?php
/*
                      $mail = new PHPMailer(true);
                      $send_using_gmail=$mail;
                      // Send mail using Gmail
                      if($send_using_gmail){
                          $mail->IsSMTP(); // telling the class to use SMTP
                          $mail->SMTPAuth = true; // enable SMTP authentication
                          $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
                          $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
                          $mail->Port = 465; // set the SMTP port for the GMAIL server
                          $mail->Username = "your-gmail-account@gmail.com"; // GMAIL username
                          $mail->Password = "your-gmail-password"; // GMAIL password
                      }

                      // Typical mail data

                      try{
                          $mail->Send();
                          echo "Success!";
                      } catch(Exception $e){
                          // Something went bad
                          echo "Fail :(";
                      }
*/
                      ?>

                  </div>
                </div>
              </form>
						</div>
					</div>
				</div>
                <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
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