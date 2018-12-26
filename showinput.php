<?php
header('Content-Type: text/html; charset=utf-8');

require("conf/config_mysqli.php");
mysqli_set_charset($Connect, "utf8");
$menu = 'registerAll';

include("util.php");

//Get Value From recommend.php
$budgetvalue = $_POST["budget"];
$budgettxt = getBudget($budgetvalue);
$handvalue = $_POST["choosehand"];
$handtxt = getHand($handvalue);
$expvalue = $_POST["exp"];
$exptxt = getExperience($expvalue);

$waterf_txt = "";
$watertype_f = "";

if (!empty($_POST["watertype_f"])) {
  $watertype_f =  $_POST["watertype_f"];
  $waterf_txt = "น้ำจืด";
}

$waters_txt = "";
$watertype_s = "";
if (!empty($_POST["watertype_s"])) {
  $watertype_s =  $_POST["watertype_s"];
  $waters_txt = "น้ำเค็ม";
}


/* foreach ($_POST as $key => $value) {
    echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
} */
print_r($_POST)


?>

<!DOCTYPE html>
<html lang="en">
	<style>
	table {
	  font-family: arial, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	}

	td, th {
	  border: 1px solid #f7f7f7;
	  text-align: left;
	  padding: 8px;
	}

	tr:nth-child(even) {
	  background-color: #f7f7f7;
	}
	</style>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>E-Fishing Equipment Store</title>

        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

        <!-- Slick -->
        <link type="text/css" rel="stylesheet" href="css/slick.css" />
        <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

        <!-- nouislider -->
        <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />


        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <link rel="stylesheet" href="css/bootstrap-duallistbox.css">

        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="css/style.css" />

		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->

    </head>
    <body>
        <!-- HEADER -->
        <header>
            <!-- top Header -->
            <div id="top-header">
                <div class="container">
                    <div class="pull-left">
                        <span>Welcome to E-Fishing Equipment Store</span>
                    </div>
                    <div class="pull-right">
                        <ul class="header-top-links">
                            <li><a href="#">Store</a></li>
                            <li class="dropdown default-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">TH <i class="fa fa-caret-down"></i></a>
                                <ul class="custom-menu">
                                    <li><a href="#">English (ENG)</a></li>
                                    <li><a href="#">Thai (TH)</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /top Header -->

            <!-- header -->
            <div id="header">
                <div class="container">
                    <div class="pull-left">
                        <!-- Logo -->
                        <div class="header-logo">
                            <a class="logo" href="#">
                                <img src="" alt="">
                            </a>
                        </div>
                        <!-- /Logo -->

                        <!-- Search -->
                        <div class="header-search">
                            <form>
                                <input class="input search-input" type="text" placeholder="Enter your keyword">
                                <select class="input search-categories">
                                    <option value="0">All Categories</option>
                                    <option value="1">Category 01</option>
                                    <option value="1">Category 02</option>
                                </select>
                                <button class="search-btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!-- /Search -->
                    </div>
                    <div class="pull-right">
                        <ul class="header-btns">
                            <!-- Account -->
                            <li class="header-account dropdown default-dropdown">
                                <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                    <div class="header-btns-icon">
                                        <i class="fa fa-user-o"></i>
                                    </div>
                                    <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
                                </div>
                                <a href="#" class="text-uppercase">Login</a> / <a href="#" class="text-uppercase">Join</a>
                                <ul class="custom-menu">
                                    <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
                                    <li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li>
                                    <li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li>
                                </ul>
                            </li>
                            <!-- /Account -->

                            <!-- Cart -->
                            <li class="header-cart dropdown default-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <div class="header-btns-icon">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="qty">3</span>
                                    </div>
                                    <strong class="text-uppercase">My Cart:</strong>
                                    <br>
                                    <span>35.20$</span>
                                </a>
                                <div class="custom-menu">
                                    <div id="shopping-cart">
                                        <div class="shopping-cart-list">
                                            <div class="product product-widget">
                                                <div class="product-thumb">
                                                    <img src="./img/thumb-product01.jpg" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                                                    <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                                </div>
                                                <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                            </div>
                                            <div class="product product-widget">
                                                <div class="product-thumb">
                                                    <img src="./img/thumb-product01.jpg" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                                                    <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                                </div>
                                                <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                        <div class="shopping-cart-btns">
                                            <button class="main-btn">View Cart</button>
                                            <button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- /Cart -->

                            <!-- Mobile nav toggle-->
                            <li class="nav-toggle">
                                <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                            </li>
                            <!-- / Mobile nav toggle -->
                        </ul>
                    </div>
                </div>
                <!-- header -->
            </div>
            <!-- container -->
        </header>
        <!-- /HEADER -->

        <!-- NAVIGATION -->
        <div id="navigation">
            <!-- container -->
            <div class="container">
                <div id="responsive-nav">
                    <!-- menu nav -->
                    <div class="menu-nav">
                        <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                        <ul class="menu-list">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">แนะนำอุปกรณ์ตกปลา</a></li>
                            <li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">เหยื่อปลอม <i class="fa fa-caret-down"></i></a>
                                <div class="custom-menu">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <ul class="list-links">
                                                <li>
                                                    <h3 class="list-links-title">Categories</h3></li>
                                                <li><a href="#">Women’s Clothing</a></li>
                                                <li><a href="#">Men’s Clothing</a></li>
                                                <li><a href="#">Phones & Accessories</a></li>
                                                <li><a href="#">Jewelry & Watches</a></li>
                                                <li><a href="#">Bags & Shoes</a></li>
                                            </ul>
                                            <hr class="hidden-md hidden-lg">
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-links">
                                                <li>
                                                    <h3 class="list-links-title">Categories</h3></li>
                                                <li><a href="#">Women’s Clothing</a></li>
                                                <li><a href="#">Men’s Clothing</a></li>
                                                <li><a href="#">Phones & Accessories</a></li>
                                                <li><a href="#">Jewelry & Watches</a></li>
                                                <li><a href="#">Bags & Shoes</a></li>
                                            </ul>
                                            <hr class="hidden-md hidden-lg">
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-links">
                                                <li>
                                                    <h3 class="list-links-title">Categories</h3></li>
                                                <li><a href="#">Women’s Clothing</a></li>
                                                <li><a href="#">Men’s Clothing</a></li>
                                                <li><a href="#">Phones & Accessories</a></li>
                                                <li><a href="#">Jewelry & Watches</a></li>
                                                <li><a href="#">Bags & Shoes</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row hidden-sm hidden-xs">
                                        <div class="col-md-12">
                                            <hr>
                                            <a class="banner banner-1" href="#">
                                                <img src="./img/banner05.jpg" alt="">
                                                <div class="banner-caption text-center">
                                                    <h2 class="white-color">NEW COLLECTION</h2>
                                                    <h3 class="white-color font-weak">HOT DEAL</h3>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">สายเบ็ด<i class="fa fa-caret-down"></i></a>
                                <div class="custom-menu">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="hidden-sm hidden-xs">
                                                <a class="banner banner-1" href="#">
                                                    <img src="./img/banner06.jpg" alt="">
                                                    <div class="banner-caption text-center">
                                                        <h3 class="white-color text-uppercase">Women’s</h3>
                                                    </div>
                                                </a>
                                                <hr>
                                            </div>
                                            <ul class="list-links">
                                                <li>
                                                    <h3 class="list-links-title">Categories</h3></li>
                                                <li><a href="#">Women’s Clothing</a></li>
                                                <li><a href="#">Men’s Clothing</a></li>
                                                <li><a href="#">Phones & Accessories</a></li>
                                                <li><a href="#">Jewelry & Watches</a></li>
                                                <li><a href="#">Bags & Shoes</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="hidden-sm hidden-xs">
                                                <a class="banner banner-1" href="#">
                                                    <img src="./img/banner07.jpg" alt="">
                                                    <div class="banner-caption text-center">
                                                        <h3 class="white-color text-uppercase">Men’s</h3>
                                                    </div>
                                                </a>
                                            </div>
                                            <hr>
                                            <ul class="list-links">
                                                <li>
                                                    <h3 class="list-links-title">Categories</h3></li>
                                                <li><a href="#">Women’s Clothing</a></li>
                                                <li><a href="#">Men’s Clothing</a></li>
                                                <li><a href="#">Phones & Accessories</a></li>
                                                <li><a href="#">Jewelry & Watches</a></li>
                                                <li><a href="#">Bags & Shoes</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="hidden-sm hidden-xs">
                                                <a class="banner banner-1" href="#">
                                                    <img src="./img/banner08.jpg" alt="">
                                                    <div class="banner-caption text-center">
                                                        <h3 class="white-color text-uppercase">Accessories</h3>
                                                    </div>
                                                </a>
                                            </div>
                                            <hr>
                                            <ul class="list-links">
                                                <li>
                                                    <h3 class="list-links-title">Categories</h3></li>
                                                <li><a href="#">Women’s Clothing</a></li>
                                                <li><a href="#">Men’s Clothing</a></li>
                                                <li><a href="#">Phones & Accessories</a></li>
                                                <li><a href="#">Jewelry & Watches</a></li>
                                                <li><a href="#">Bags & Shoes</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="hidden-sm hidden-xs">
                                                <a class="banner banner-1" href="#">
                                                    <img src="./img/banner09.jpg" alt="">
                                                    <div class="banner-caption text-center">
                                                        <h3 class="white-color text-uppercase">Bags</h3>
                                                    </div>
                                                </a>
                                            </div>
                                            <hr>
                                            <ul class="list-links">
                                                <li>
                                                    <h3 class="list-links-title">Categories</h3></li>
                                                <li><a href="#">Women’s Clothing</a></li>
                                                <li><a href="#">Men’s Clothing</a></li>
                                                <li><a href="#">Phones & Accessories</a></li>
                                                <li><a href="#">Jewelry & Watches</a></li>
                                                <li><a href="#">Bags & Shoes</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">รอก <i class="fa fa-caret-down"></i></a>
                                <ul class="custom-menu">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="products.html">Products</a></li>
                                    <li><a href="product-page.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                </ul>
                            </li>
							<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">คันเบ็ด <i class="fa fa-caret-down"></i></a>
                                <ul class="custom-menu">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="products.html">Products</a></li>
                                    <li><a href="product-page.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- menu nav -->
                </div>
            </div>
            <!-- /container -->
        </div>
        <!-- /NAVIGATION -->

        <!-- HOME -->
        <div id="home">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- section-title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">ข้อมูลเพื่อหาอุปกรณ์ตกปลาที่เหมาะสม</h3>
                        </div>
                    </div>
                    <!-- /section-title -->
					          </br>
              </br>
				<div class="form-group col-md-12">
					<table class="table table-bordered">
						<thead>
							<tr>
								<TH width="5%" SCOPE="COL"/>
								<TH width="20%" SCOPE="COL">INPUT</TH>
								<TH width="15%" SCOPE="COL">VALUE</TH>
								<TH width="15%" SCOPE="COL">DESC</TH>
								<TH width="15%" SCOPE="COL">OUTPUT</TH>
								<TH width="15%" SCOPE="COL">VALUE</TH>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>งบประมาณ</td>
								<td><?=$budgetvalue;?></td>
								<td><?=$budgettxt;?></td>
								<td/>
								<td/>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>มือข้างที่ถนัด</td>
								<td><?=$handvalue;?></td>
								<td><?=$handtxt;?></td>
								<td/>
								<td/>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>ระดับประสบการณ์</td>
								<td><?=$expvalue;?></td>
								<td><?=$exptxt;?></td>
								<td/>
								<td/>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>ประเภทของแหล่งน้ำจืด</td>
								<td><?=$watertype_f;?></td>
								<td><?=$waterf_txt;?></td>
								<td/>
								<td/>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>ประเภทของแหล่งน้ำเค็ม</td>
								<td><?=$watertype_s;?></td>
								<td><?=$waters_txt;?></td>
								<td/>
								<td/>
							</tr>
						</tbody>
					</table>
				</div>
				</br>
							<?
							///ประเภทของแหล่งน้ำจืด
							if(!empty($_POST['water_source_1'])){
							?>
								<div class="form-group col-md-12"> <br/><h4>ประเภทของแหล่งน้ำจืด</h4>
									<table class="table table-bordered">
										<thead>
											<tr>
												<TH width="5%" SCOPE="COL"></TH>
												<TH width="20%" SCOPE="COL">INPUT</TH>
												<TH width="15%" SCOPE="COL">VALUE</TH>											
											</tr>
										</thead>
										<tbody>
										<?
										$countrow =1;
										  foreach($_POST['water_source_1'] as $selected){
											$selectedValue = explode("|", $selected);
										?>
											<tr>
												<td ><?=$countrow++;?></td>
												<td><?echo $selectedValue[1];?></td>
												<td><?echo $selectedValue[0];?></td>
											</tr>
										<?
										 }
										?>
										</tbody>
									</table>
								</div>
							<?
							 }
							 ///ประเภทของแหล่งน้ำจืด
							?>
							
							<?
							///ประเภทของแหล่งน้ำเค็ม
							if(!empty($_POST['water_source_2'])){
							?>							
								<div class="form-group col-md-12"> <br/><h4>ประเภทของแหล่งน้ำเค็ม</h4>
									<table class="table table-bordered">
										<thead>
											<tr>
												<TH width="5%" SCOPE="COL"></TH>
												<TH width="20%" SCOPE="COL">INPUT</TH>
												<TH width="15%" SCOPE="COL">VALUE</TH>
												
											</tr>
										</thead>
										<tbody>
										<?
										$countrow =1;
										  foreach($_POST['water_source_2'] as $selected){
											$selectedValue = explode("|", $selected);
										?>
											<tr>
												<td ><?=$countrow++;?></td>
												<td><?echo $selectedValue[1];?></td>
												<td><?echo $selectedValue[0];?></td>
												
											</tr>
										<?
										 }
										?>
										</tbody>
									</table>
								</div>
							<?
							 }
							///ประเภทของแหล่งน้ำเค็ม
							?>
							
							<?
							$species_fish = null;
							if (!empty($_POST["watertype_f"]) && !empty($_POST["watertype_s"])) {
								if(!empty($_POST["species_fish"]))
									$species_fish =	$_POST["species_fish"];
							}
							else if (!empty($_POST["watertype_f"])) {
								if(!empty($_POST["species_fish_f"]))
									$species_fish =	$_POST["species_fish_f"];
							}
							else if (!empty($_POST["watertype_s"])) {
								if(!empty($_POST["species_fish_s"]))
									$species_fish =	$_POST["species_fish_s"];
							}
							
							?>
							
														<?
							///ประเภทของแหล่งน้ำเค็ม
							if(!empty($species_fish)){
							?>							
								<div class="form-group col-md-12"> <br/><h4>ประเภทปลา</h4>
									<table class="table table-bordered">
										<thead>
											<tr>
												<TH width="5%" SCOPE="COL"></TH>
												<TH width="20%" SCOPE="COL">INPUT</TH>
												<TH width="15%" SCOPE="COL">VALUE</TH>
												
											</tr>
										</thead>
										<tbody>
										<?
										$countrow =1;
										  foreach($species_fish as $selected){
											$selectedValue = explode("|", $selected);
										?>
											<tr>
												<td ><?=$countrow++;?></td>
												<td><?echo $selectedValue[1];?></td>
												<td><?echo $selectedValue[0];?></td>
												
											</tr>
										<?
										 }
										?>
										</tbody>
									</table>
								</div>
							<?
							 }
							///ประเภทของแหล่งน้ำเค็ม
							?>
							
                            <div class="form-group col-md-12">
                                <div class="col-md-6 col-sm-6"><button type="reset" class="btn btn-warning">Clear</button></div>
                                <div class="col-md-6 col-sm-6 text-right"><button type="submit" class="btn btn-success">Next</button></div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- /container -->
            </div>
            <!-- /HOME -->



            <!-- FOOTER -->
            <footer id="footer" class="section section-grey">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <!-- footer widget -->
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="footer">
                                <!-- footer logo -->
                                <div class="footer-logo">
                                    <a class="logo" href="#">
                                        <!-- <img src="./img/logo.png" alt=""> -->
                                    </a>
                                </div>
                                <!-- /footer logo -->

                                <!-- footer social
                                <ul class="footer-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                                /footer social -->
                            </div>
                        </div>
                        <!-- /footer widget -->

                        <!-- footer widget
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-header">My Account</h3>
                                <ul class="list-links">
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">My Wishlist</a></li>
                                    <li><a href="#">Compare</a></li>
                                    <li><a href="#">Checkout</a></li>
                                    <li><a href="#">Login</a></li>
                                </ul>
                            </div>
                        </div>
						/footer widget -->

                        <div class="clearfix visible-sm visible-xs"></div>

                        <!-- footer widget
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-header">Customer Service</h3>
                                <ul class="list-links">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Shiping & Return</a></li>
                                    <li><a href="#">Shiping Guide</a></li>
                                    <li><a href="#">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                         /footer widget -->

                        <!-- footer subscribe
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-header">Stay Connected</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                                <form>
                                    <div class="form-group">
                                        <input class="input" placeholder="Enter Email Address">
                                    </div>
                                    <button class="primary-btn">Join Newslatter</button>
                                </form>
                            </div>
                        </div>
                         /footer subscribe -->
                    </div>
                    <!-- /row -->
                    <hr>
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <!-- footer copyright
                            <div class="footer-copyright">
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            </div>
                             /footer copyright -->
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </footer>
            <!-- /FOOTER -->

            <!-- jQuery Plugins -->
            <script src="js/jquery.min.js"></script>
            <script src="js/jquery.bootstrap-duallistbox.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/slick.min.js"></script>
            <script src="js/nouislider.min.js"></script>
            <script src="js/jquery.zoom.min.js"></script>

            <script src="js/main.js"></script>
            <script>
                                    var demo1 = $('select[name="species_fish[]"]').bootstrapDualListbox();

            </script>

    </body>

</html>
