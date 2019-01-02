<?php
//session_destroy();
header('Content-Type: text/html; charset=utf-8');

require("conf/config_Session.php");

require("conf/config_mysqli.php");
mysqli_set_charset($Connect, "utf8");
$menu = 'registerAll';

if (isset($_SESSION['post-data'])) {
	unset($_SESSION['post-data']);
}
?>

<!DOCTYPE html>
<html lang="en">

   <?php
		include("headScript.php");
	?>
    <body>
        <!-- HEADER -->
      	<?php
			include("header.php");
			include("navigation.php");
		?>
        <!-- /HEADER -->

        <!-- HOME -->
        <div id="home">
            <!-- container -->
        <div class="container">
				<div class="row">
					<h2>กรุณากรอกข้อมูล</h2>
				</div>
				<form action="invoice.php"  method="post">
					<div class="row">
							<div class="col-md-3">
								<div class="form-group form-group-sm">
									<label for="firstname" class="control-label">ชื่อจริง</label>
									<input type="text" class="form-control" id="firstname" name="firstname" placeholder="ชื่อจริง">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="lastname" class="control-label">นามสกุล</label>
									<input type="text" class="form-control" id="lastname" name="lastname" placeholder="นามสกุล">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="lastname" class="control-label">เลขที่ประจำตัวผู้เสียภาษี</label>
									<input type="text" class="form-control" id="taxID" name="taxID" placeholder="เลขที่ประจำตัวผู้เสียภาษี">
								</div>
							</div>
					</div>
					<div class="row">						 
						 <div class="col-xs-3">
								<label for="lastname" class="control-label">ที่อยู่</label>
								<textarea class="form-control" name="address"   placeholder="ที่อยู่"></textarea>
							</div>
					</div>
					<div class="row">
						 <div class="col-xs-3">
								<button type="submit" class="btn btn-default">Submit</button>
							</div>
					</div>
				</form>



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
				  var demo1 = $('select[name="species_fish_f[]"]').bootstrapDualListbox();
				  var demo1 = $('select[name="species_fish_s[]"]').bootstrapDualListbox();

            </script>

    </body>

</html>
