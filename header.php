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
                                        <span class="qty"><?php if (!empty($_SESSION["itemcart"])) { echo $_SESSION["itemcart"]; }
										?></span>

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