<!DOCTYPE html>
<?php
include  'DatabaseConfig.php';
if(!isset($_SESSION)){
    session_start();}
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
        <script>


</script>

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

			<section id="pageTitleBox" class="paralax breadcrumb-container "   style="background-image: url('images/perfect.jpg'); height: 300px;margin-top: 0px;">

				<div class="container relative">
					<h1 class="title font-additional font-weight-normal color-main text-uppercase wow zoomIn customColor" data-wow-delay="0.3s"> Our Shopping </h1>
					<ul class="breadcrumb-list">
						<li>
							<a href="index-1.html" class="font-additional font-weight-normal color-main text-uppercase">HOME</a>
							<span><i class="fa fa-angle-double-right"></i> </span>
						</li>
						<li class="font-additional font-weight-normal color-main text-uppercase">Category</li>
					</ul>
				</div>
			</section>





                            <section id="pageContent" class="page-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="sidebar col-lg-3 col-md-3 col-sm-3 col-xs-12 clearfix">
                                            <h3 class="sidebar-title font-additional font-weight-bold text-uppercase customColor wow fadeIn" data-wow-delay="0.3s">Shopping</h3>
                                            <ul class="categories-tree wow fadeIn" data-wow-delay="0.6s">
                                                <li>
                                                    <a href="#" class="font-additional font-weight-normal hover-focus-color color-third text-uppercase">
                                                        <span class="pull-left">New</span>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="font-additional font-weight-normal hover-focus-color color-third text-uppercase">
                                                        <span class="pull-left">FOOTWEAR</span>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="font-additional font-weight-normal hover-focus-color color-third text-uppercase">
                                                        <span class="pull-left">JEWELLRY</span>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="font-additional font-weight-normal hover-focus-color color-third text-uppercase">
                                                        <span class="pull-left">MEN</span>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="font-additional font-weight-normal hover-focus-color color-third text-uppercase">
                                                        <span class="pull-left">ACCESSORIES</span>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="font-additional font-weight-normal hover-focus-color color-third text-uppercase">
                                                        <span class="pull-left">WOMEN</span>

                                                    </a>
                                                </li>
                                            </ul>



              <h3 class="sidebar-title font-additional font-weight-bold text-uppercase customColor wow fadeIn" data-wow-delay="0.3s">by price</h3>
              <div class="sidebar-slider wow fadeIn" data-wow-delay="0.6s">
                <div class="slider-range" data-min="50" data-max="450" data-default-min="50" data-default-max="350" data-range="true" data-value-container-id="priceAmount"></div>
                <div class="filter-container">
                  <div class="slider-range-value pull-left">
                    <label class="font-main font-weight-normal" for="priceAmount">Price:</label>
                    <input class="font-main font-weight-normal" type="text" id="priceAmount" readonly>
                  </div>
                  <a class="btn button-border font-additional font-weight-bold hvr-bounce-to-right hover-focus-border before-bg pull-right" href="#">Filter</a>
                </div>
              </div>
              <ul class="category-images sidebar-product wow fadeIn" data-wow-delay="0.3s">
                <li class="grid">
                 <figure class="effect-ruby">
                    <img src="images/Hot%20coll.jpg" alt="product">
                    <figcaption>
                      <div class="category-images_content">
                        <h2 class="font-additional font-weight-bold text-uppercase color-main customBgColor" style="font-size:20px;">Best COLLECTION</h2>
                      </div>
                      <a href="#">View more</a>
                    </figcaption>     
                 </figure>
                </li>
              </ul>
                                        <h3 class="sidebar-title font-additional font-weight-bold text-uppercase customColor wow fadeIn" data-wow-delay="0.3s">Most Saled</h3>
                                        <ul class="sidebar-popular-product wow fadeIn" data-wow-delay="0.6s">
                                            <li>
                                                <a class="popular-product-item" href="product-details-1.php?name=Women ring&price=80$&url=images/rong.jpg">
                                                    <img src="images/rong.jpg" alt="Product">
                                                    <span class="popular-product-item_title font-additional font-weight-bold text-uppercase">WOMEN ring</span>
                                                    <span class="popular-product-item_price font-additional color-third">$80.00</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="popular-product-item" href="product-details-1.php?name=Men Accesories&price=105$&url=images/menAw.jpg">
                                                    <img src="images/menAw.jpg" alt="Product">
                                                    <span class="popular-product-item_title font-additional font-weight-bold text-uppercase">MEN Accesories</span>
                                                    <span class="popular-product-item_price font-additional color-third">$105.00</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="popular-product-item" href="product-details-1.php?name=Women wear&price=350$&url=images/wear.jpg">
                                                    <img src="images/wear.jpg" alt="Product">
                                                    <span class="popular-product-item_title font-additional font-weight-bold text-uppercase">women wear</span>
                                                    <span class="popular-product-item_price font-additional color-third">$350.00</span>
                                                    <span class="product-item_sale color-main font-additional customBgColor circle">-5%</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="popular-product-item" href="product-details-1.php?name=Bags&price=240$&url=images/bagh.jpg">
                                                    <img src="images/bagh.jpg" alt="Product">
                                                    <span class="popular-product-item_title font-additional font-weight-bold text-uppercase">Bags </span>
                                                    <span class="popular-product-item_price font-additional color-third">$240.00</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix">
							<div class="content-box">
								<div class="category-filter clearfix wow fadeIn" data-wow-delay="0.3s">
									<div class="grd-lst pull-left">
                    <span>View as:</span>
                    <a href="category.php" class="grid-type category-active">
                      Grid
                    </a>
                    <span class="slash-seperator">/</span>
                    <a href="category-1.php" class="grid-type">
                      List
                    </a>
                  </div>
                  <div class="select sort-select pull-left">
										<label for="sort">Sort by: </label>
                    <select class="select-field font-main color-third" name="sort" id="sort">
											<option value="sales">Best sellers</option>
											<option value="rating">Best rated</option>
											<option value="price-asc">Price: low to high</option>
											<option value="price-desc">Price: high to low</option>
										</select>
										<i class="fa fa-angle-down customColor"></i>
									</div>
									<div class="select pull-right">


										<i class="fa fa-angle-down customColor"></i>
									</div>                  
								</div>
								<div class="products-cat clearfix">
                  <div class="category-pagination col-sm-12">

                    <nav>
                      <ul class="pagination pagination-small pull-right">
                        <li>

                      </ul>
                    </nav>
                  </div>


                                     <ul class="products-grid">

										<li class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
											<div class="product-item hvr-underline-from-center">
												<div class="product-item_body">

													<img class="product-item_image" src="images/SocksHM.jpg" alt="Product">
													<a class="product-item_link" href="product-details-1.php?name=Socks HandMade&price=200$&url=images/SocksHM.jpg">
														<span class="product-item_sale color-main font-additional customBgColor circle">15%</span>
													</a>


												</div>
												<a href="product-details-1.php?name=Socks HandMade&price=200$&url=images/SocksHM.jpg" class="product-item_footer">
													<div class="product-item_title font-additional font-weight-bold text-center text-uppercase"> Socks HandMade</div>
													<div class="product-item_price font-additional font-weight-normal customColor">$200.00 <span>$235.00</span></div>
												</a>
											</div>
										</li>

										<li class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
											<div class="product-item hvr-underline-from-center">
												<div class="product-item_body">

													<img class="product-item_image" src="images/BabiHM.jpg" alt="Product">
													<a class="product-item_link" href="product-details-1.php?name=Babies HandMade&price=175$&url=images/BabiHM.jpg"></a>

												</div>
												<a href="product-details-1.php?name=Babies HandMade&price=175$&url=images/BabiHM.jpg" class="product-item_footer">
													<div class="product-item_title font-additional font-weight-bold text-center text-uppercase"> Babies HandMade</div>
													<div class="product-item_price font-additional font-weight-normal customColor">$175.00</div>
												</a>
											</div>
										</li>
                    <li class="clearfix visible-sm"></li>
										<li class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
											<div class="product-item hvr-underline-from-center">
												<div class="product-item_body">

													<img class="product-item_image" src="images/W3Hw.jpg" alt="Product">
													<a class="product-item_link" href="product-details-1.php?name=HandMade for Women&price=9$&url=images/W3Hw.jpg">
														<span class="product-item_sale color-main font-additional customBgColor circle">-10%</span>
														<span class="product-item_outofstock color-main font-additional circle">Saled</span>
													</a>

												</div>
												<a href="product-details-1.php?name=HandMade for Women&price=9$&url=images/W3Hw.jpg" class="product-item_footer">
													<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">HandMade for women</div>
													<div class="product-item_price font-additional font-weight-normal customColor">$9.00</div>
												</a>
											</div>
										</li>
										<li class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
											<div class="product-item hvr-underline-from-center">
												<div class="product-item_body product-border">

													<img alt="Product" src="images/Menj.jpg" class="product-item_image">
													<a href="product-details-1.php" class="product-item_link">
														<span class="product-item_new color-main font-additional text-uppercase circle">new</span>
													</a>

												</div>
												<a class="product-item_footer" href="product-details-1.php?name=Men HandMade&price=240$&url=images/Menj.jpg">
													<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">MenHandMade</div>
													<div class="product-item_price font-additional font-weight-normal customColor">$240.00</div>
												</a>
											</div>
										</li>
                                        <li class="clearfix visible-sm"></li>
                                        <li class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                            <div class="product-item hvr-underline-from-center">
                                                <div class="product-item_body">

                                                    <img class="product-item_image" src="images/wowring.jpg" alt="Product">
                                                    <a class="product-item_link" href="product-details-1.php">
                                                        <span class="product-item_sale color-main font-additional customBgColor circle">-20%</span>
                                                    </a>

                                                </div>
                                                <a href="product-details-1.php?name=Ring HandMade&price=200$&url=images/wowring.jpg" class="product-item_footer">
                                                    <div class="product-item_title font-additional font-weight-bold text-center text-uppercase">  Ring HandMade</div>
                                                    <div class="product-item_price font-additional font-weight-normal customColor">$200.00</div>
                                                </a>
                                            </div>
                                        </li>

                                        <li class="clearfix visible-sm"></li>
                                        <li class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                            <div class="product-item hvr-underline-from-center">
                                                <div class="product-item_body">

                                                    <img class="product-item_image" src="images/soap.jpg" alt="Product">
                                                    <a class="product-item_link" href="product-details-1.php">
                                                        <span class="product-item_sale color-main font-additional customBgColor circle">-10%</span>
                                                    </a>

                                                </div>
                                                <a href="product-details-1.php?name=Soap HandMade&price=200$&url=images/soap.jpg" class="product-item_footer">
                                                    <div class="product-item_title font-additional font-weight-bold text-center text-uppercase"> Soap HandMade</div>
                                                    <div class="product-item_price font-additional font-weight-normal customColor">$200.00</div>
                                                </a>
                                            </div>
                                        </li>
                    <li class="clearfix visible-sm"></li>
										<li class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
											<div class="product-item hvr-underline-from-center">
												<div class="product-item_body product-border">

													<img alt="Product" src="images/newbag.jpg" class="product-item_image">
													<a href="product-details-1.php?nameBag HandMade&price=175$&url=images/newbag.jpg" class="product-item_link"></a>

                                                </div>
												<a class="product-item_footer" href="product-details-1.php">
													<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">BagHandMade</div>
													<div class="product-item_price font-additional font-weight-normal customColor">$175.00</div>
												</a>
											</div>
										</li>
									   	<li class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
											<div class="product-item hvr-underline-from-center">
												<div class="product-item_body product-border">

													<img alt="Product" src="images/key.jpg" class="product-item_image">
													<a href="product-details-1.php?name=Key HandMade&price=300$&url=images/key.jpg" class="product-item_link"></a>

												</div>
												<a class="product-item_footer" href="product-details-1.php">
													<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">HandMade</div>
													<div class="product-item_price font-additional font-weight-normal customColor">$300.00</div>
												</a>
											</div>
										</li>
                    <li class="clearfix visible-sm"></li>										
										<li class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
											<div class="product-item hvr-underline-from-center">
												<div class="product-item_body">

													<img class="product-item_image" src="images/Hm6.jpg" alt="Product">
													<a class="product-item_link" href="product-details-1.php?name=Fun HandMade&price=200$&url=images/Hm6.jpg"></a>

												</div>
												<a href="product-details-1.php" class="product-item_footer">
													<div class="product-item_title font-additional font-weight-bold text-center text-uppercase">Fun HandMade</div>
													<div class="product-item_price font-additional font-weight-normal customColor">$200.00 <span>$220.00</span></div>
												</a>
											</div>
										</li>
										<li class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
											<div class="product-item hvr-underline-from-center">
												<div class="product-item_body">

													<img class="product-item_image" src="images/soof.jpg" alt="Product">
													<a class="product-item_link" href="product-details-1.php?name=Scarf HandMade&price=175$&url=images/soof.jpg"></a>

												</div>
												<a href="product-details-1.php" class="product-item_footer">

													<div class="product-item_title font-additional font-weight-bold text-center text-uppercase"> scraf HandMade</div>
													<div class="product-item_price font-additional font-weight-normal customColor">$175.00</div>
												</a>
											</div>
										</li>
                    <li class="clearfix visible-sm"></li>
										<li class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
											<div class="product-item hvr-underline-from-center">
												<div class="product-item_body">

													<img class="product-item_image" src="images/HM5.jpg" alt="Product">
													<a class="product-item_link" href="product-details-1.php?name=Phone acc HandMade&price=200$&url=images/HM5.jpg">
														<span class="product-item_sale color-main font-additional customBgColor circle">-20%</span>
													</a>

												</div>
												<a href="product-details-1.php" class="product-item_footer">
													<div class="product-item_title font-additional font-weight-bold text-center text-uppercase"> Phone Accescories HandMade</div>
													<div class="product-item_price font-additional font-weight-normal customColor">$200.00</div>
												</a>
											</div>
										</li>
									</ul>
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
              <form action="#" method="post">
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