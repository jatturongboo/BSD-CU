        <header>
            <!-- header -->
            <div id="header">
                <div class="container">
                    <div class="pull-left">
                        <!-- Logo -->
                        <div class="header-logo">
                            <a class="logo" href="#">
                                <img src="image/f-logo.jpg" alt="">
                            </a>
                        </div>
                        <!-- /Logo -->

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
                                <a href="#" class="text-uppercase">Login</a> 
                                <ul class="custom-menu">
                                    <li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>                                  
                                </ul>
                            </li>
                            <!-- /Account -->

                            <!-- Cart -->
                            <li class="header-cart dropdown default-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <div class="header-btns-icon">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="qty"><?php if (!empty($_SESSION["itemcart"])){ echo $_SESSION["itemcart"]; }
										?></span>

                                    </div>
                                    <strong class="text-uppercase">My Cart:</strong>
                                    <br>
                                    <span><?php echo (!empty($_SESSION["sumPrice"])?$_SESSION["sumPrice"]:"0" )?>$</span>
									
                                </a>
                                <div class="custom-menu">
                                    <div id="shopping-cart">
                                        <div class="shopping-cart-list">
										<?php										
										if (!empty($_SESSION["itemcartID"])){
											$_SESSION["itemcart"] = 0;
											$sumPrice = 0;
											$arr = array_count_values($_SESSION["itemcartID"]);
											
											foreach ($arr as $key => $value) {
												
												$url2 = 'http://localhost/Fishing_Equipment_Store/api/luresDetail.php?id='.$key;
												$content2 = file_get_contents($url2);	
												$json2 = json_decode($content2);												
												$_SESSION["itemcart"] += $value;
												foreach ($json2 as $value2) {
													$rownum = 1;
													foreach ($value2->items as $product2) {	
													$sumPrice += ($product2->price* $value);												
													$_SESSION["sumPrice"] = $sumPrice;
										?>
												<div class="product product-widget">
												  <div class="product-body">
														<h3 class="product-price">฿<?echo $product2->price; ?> <span class="qty">x<?php echo $value;?></span></h3>
														<h2 class="product-name"><a href="#"><?echo $product2->model; ?></a></h2>
													</div>
													<?
														if (!empty($_GET['page'])) {
															$urldel .= "&page=".$_GET['page'];
														}
													?>
													<button class="cancel-btn"onclick="location.href='delCart.php?delID=<?=$key.$urldel?>'"><i class="fa fa-trash" ></i></button>
												</div>
										<?php
													}
												}
											}
										}
										?>
											
                                        </div>
                                        
										<div class="shopping-cart-btns">
                                            <button class="main-btn" onclick="location.href='viewCart.php'">View Cart</button>
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