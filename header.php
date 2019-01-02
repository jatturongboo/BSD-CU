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
										<?
										$sumAllqty =0;
										if (!empty($_SESSION["itemcartID_lures"])){
											$sumAllqty +=count($_SESSION["itemcartID_lures"]);
										}
										
										if (!empty($_SESSION["itemcartID_line"])){
											$sumAllqty +=count($_SESSION["itemcartID_line"]);
										}
										
										if (!empty($_SESSION["itemcartID_Reels"])){
											$sumAllqty +=count($_SESSION["itemcartID_Reels"]);
										}
										
										if (!empty($_SESSION["itemcartID_rod"])){
											$sumAllqty +=count($_SESSION["itemcartID_rod"]);
										}
										
										?>
                                        <span class="qty"><?=$sumAllqty?></span>

                                    </div>
                                    <strong class="text-uppercase">My Cart:</strong>
                                    <br>
                                    <span><?php echo (!empty($_SESSION["sumPrice"])?$_SESSION["sumPrice"]:"0" )?>$</span>
									
                                </a>
                                <div class="custom-menu">
                                    <div id="shopping-cart">
                                        <div class="shopping-cart-list">
										<?php
											$sumPrice = 0;
										if (!empty($_SESSION["itemcartID_lures"])){
											$arr = array_count_values($_SESSION["itemcartID_lures"]);
											foreach ($arr as $key => $value) {												
												$url2 = $REQUEST_URI.'api/luresDetail.php?id='.$key;
												$content2 = file_get_contents($url2);	
												$json2 = json_decode($content2);
												foreach ($json2 as $value2) {
													$rownum = 1;
													foreach ($value2->items as $product2) {	
													$sumPrice += ($product2->price* $value);												
													$_SESSION["sumPrice"] = $sumPrice;
										?>
												<div class="product product-widget">
													<div class="product-thumb">
														<img src="<?=$product2->image;?>" alt="">
													</div>
												  <div class="product-body">
														<h3 class="product-price">฿<?echo $product2->price; ?> <span class="qty">x<?php echo $value;?></span></h3>
														<h2 class="product-name"><a href="#"><?echo $product2->model; ?></a></h2>
													</div>
													<?
														if (!empty($_GET['page'])) {
															$urldel .= "&page=".$_GET['page'];
														}
													?>
													<button class="cancel-btn"onclick="location.href='delCart.php?delID=<?=$key.$urldel?>&fn=lures'"><i class="fa fa-trash" ></i></button>
												</div>
										<?php
													}
												}
											}
										}
										?>
										
										
										<?php											
										if (!empty($_SESSION["itemcartID_line"])){
											
											$arrline = array_count_values($_SESSION["itemcartID_line"]);
											
											foreach ($arrline as $key => $value) {												
												$urlline = $REQUEST_URI.'api/lineDetail.php?id='.$key;
												
												$contentline = file_get_contents($urlline);	
												$jsonline = json_decode($contentline);
												foreach ($jsonline as $valueline) {
													$rownum = 1;
													foreach ($valueline->items as $productline) {	
													$sumPrice += ($productline->price* $value);												
													$_SESSION["sumPrice"] = $sumPrice;
										?>
												<div class="product product-widget">
													<div class="product-thumb">
														<img src="<?=$productline->image;?>" alt="">
													</div>
												  <div class="product-body">
														<h3 class="product-price">฿<?echo $productline->price; ?> <span class="qty">x<?php echo $value;?></span></h3>
														<h2 class="product-name"><a href="#"><?echo $productline->model; ?></a></h2>
													</div>
													<?
														if (!empty($_GET['page'])) {
															$urldel .= "&page=".$_GET['page'];
														}
													?>
													<button class="cancel-btn"onclick="location.href='delCart.php?delID=<?=$key.$urldel?>&fn=line'"><i class="fa fa-trash" ></i></button>
												</div>
										<?php
													}
												}
											}
										}
										?>
										
										<?php											
										if (!empty($_SESSION["itemcartID_Reels"])){
											
											$arrReels = array_count_values($_SESSION["itemcartID_Reels"]);
											
											foreach ($arrReels as $key => $value) {												
												$urlReels = $REQUEST_URI.'api/reelsDetail.php?id='.$key;
												//echo $urlReels;
												$contentReels = file_get_contents($urlReels);	
												$jsonReels = json_decode($contentReels);
												foreach ($jsonReels as $valueReels) {
													$rownum = 1;
													foreach ($valueReels->items as $productReels) {	
													$sumPrice += ($productReels->Price* $value);												
													$_SESSION["sumPrice"] = $sumPrice;
										?>
												<div class="product product-widget">
													<div class="product-thumb">
														<img src="<?=$productReels->image;?>" alt="">
													</div>
												  <div class="product-body">
														<h3 class="product-price">฿<?echo $productReels->Price; ?> <span class="qty">x<?php echo $value;?></span></h3>
														<h2 class="product-name"><a href="#"><?echo $productReels->Model; ?></a></h2>
													</div>
													<?
														if (!empty($_GET['page'])) {
															$urldel .= "&page=".$_GET['page'];
														}
													?>
													<button class="cancel-btn"onclick="location.href='delCart.php?delID=<?=$key.$urldel?>&fn=Reels'"><i class="fa fa-trash" ></i></button>
												</div>
										<?php
													}
												}
											}
										}
										?>
										
										<?php											
										if (!empty($_SESSION["itemcartID_rod"])){
											
											$arrReels = array_count_values($_SESSION["itemcartID_rod"]);
											
											foreach ($arrReels as $key => $value) {												
												$urlrod = $REQUEST_URI.'api/rodDetail.php?id='.$key;
												//echo $urlrod;
												$contentrod = file_get_contents($urlrod);	
												$jsonrod = json_decode($contentrod);
												foreach ($jsonrod as $valuerod) {
													$rownum = 1;
													foreach ($valuerod->items as $productrod) {	
													$sumPrice += ($productrod->Price* $value);												
													$_SESSION["sumPrice"] = $sumPrice;
										?>
												<div class="product product-widget">
													<div class="product-thumb">
														<img src="<?=$productrod->image;?>" alt="">
													</div>
												  <div class="product-body">
														<h3 class="product-price">฿<?echo $productrod->Price; ?> <span class="qty">x<?php echo $value;?></span></h3>
														<h2 class="product-name"><a href="#"><?echo $productrod->Model; ?></a></h2>
													</div>
													<?
														if (!empty($_GET['page'])) {
															$urldel .= "&page=".$_GET['page'];
														}
													?>
													<button class="cancel-btn"onclick="location.href='delCart.php?delID=<?=$key.$urldel?>&fn=rod'"><i class="fa fa-trash" ></i></button>
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
                                            <button class="primary-btn" onclick="location.href='submitInvoice.php'">Checkout <i class="fa fa-arrow-circle-right"></i></button>
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