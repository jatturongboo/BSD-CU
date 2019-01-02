<?php

header('Content-Type: text/html; charset=utf-8');

require("conf/config_Session.php");

require("conf/config_mysqli.php");
mysqli_set_charset($Connect, "utf8");
$menu = 'registerAll';

if (isset($_SESSION['post-data'])) {
	unset($_SESSION['post-data']);
}
session_destroy();
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
                <!-- row -->
                <div class="row">
                    <!-- section-title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">กรุณากรอกข้อมูลเพื่อหาอุปกรณ์ตกปลาที่เหมาะสม</h3>

                        </div>
                    </div>
                    <!-- /section-title -->
					          </br>

                    <div class="col-md-12">
                        <form name='recommend' method="post" action="showinput.php">
                            <div class="form-group col-md-12">
                                <label for="budget">งบประมาณ</label>
                                <select class="input" name="budget" id="budget">
                                    <option value="1">น้อยกว่า 2,500 บาท</option>
                                    <option value="2">2,501 - 5,000 บาท</option>
                                    <option value="3">5,001 - 7,500 บาท</option>
                                    <option value="4">7,501 - 10,000 บาท</option>
									                  <option value="5">มากกว่า 10,000 บาท</option>
                                </select>
                            </div>

              </br>
							<div class="form-group col-md-12">
                                <label for="budget">มือข้างที่ถนัด</label>
                                <select class="input" name="choosehand" id="choosehand">
                                    <option value="ALL">ทั้งสองข้าง</option>
                                    <option value="LH">มือซ้าย</option>
                                    <option value="RH">มือขวา</option>
                                </select>
                            </div>
							</br>
              <div class="form-group col-md-12">
                <label>เคยมีประสบการณ์ตกปลามาแล้วหรือไม่ ?</label>
                <div class="input-checkbox">
                    <input type="radio" name="exp" value="N" checked  >
                    <label class="font-weak" for="experience0">ยังไม่เคยตกปลามาก่อน</label> &nbsp;&nbsp;
                    <input type="radio" name="exp" value="Y"  >
                    <label class="font-weak" for="experience1">มีประสบการณ์ตกปลามาบ้างแล้ว</label>
                </div>
            </div> </diV>

            </div>
            <div class="form-group col-md-12">
               <label>ประเภทของแหล่งน้ำ ?</label>
               <div class="input-checkbox">
                   <input type="checkbox" name="watertype_f" value="Y" onclick="toggle('.myClass',1, this)" id="watertype_f" class="chkbox">
                   <label class="font-weak" for="experience0">น้ำจืด</label> &nbsp;&nbsp;
                   <input type="checkbox" name="watertype_s" value="Y" onclick="toggle('.myClass1',2, this)" id="watertype_s" class="chkbox">
                   <label class="font-weak" for="experience1">น้ำเค็ม</label>
               </div>
           </div>
                            <div class="form-group col-md-12 myClass1" style="display: none;">
                                <label>แหล่งน้ำเค็ม</label>
                                <div class="input-checkbox">

                                  <?php

                                  $strSQL = 'SELECT * FROM `water_source` where `water_id` = 2 order by water_source_id';
                                  $objQuery = mysqli_query($Connect, $strSQL);

                                  while ($element = mysqli_fetch_assoc($objQuery)) {
                                    echo '<input type="checkbox" name="water_source_2[]" value="'.$element['water_source_id'].'|'.$element['water_source_name'].'" id="'.$element['water_source_id'].'" >';
                                    echo ' <label class="font-weak" for="fishing_grounds0">'.$element['water_source_name'].'</label>';
                                  }
                                  ?>


                                </div>
                            </div>
							<script>
							$( ".chkbox" ).click(function() {
								$(".chkflgA").hide();
								$(".chkflgf").hide();
								$(".chkflgs").hide();
								if ($( "#watertype_f" ).prop('checked') && $( "#watertype_s" ).prop('checked')){
									$(".chkflgA").show();
								}
								else if ($( "#watertype_f" ).prop('checked')){
									$(".chkflgf").show();
								}
								else if ($( "#watertype_s" ).prop('checked')){
									$(".chkflgs").show();
								}
							});

							function toggle(classShow,value, obj) {
								var $input = $(obj);
								if ($input.prop('checked')){
									$(classShow).show();
								}else{
								  $(classShow).hide();
								}
							}



							</script>
							<div class="form-group col-md-12 myClass" style="display: none;">
                                <label>แหล่งน้ำจืด</label>
                                <div class="input-checkbox">

                                  <?php

                                  $strSQL = 'SELECT * FROM `water_source` where `water_id` = 1 order by water_source_id';
                                  $objQuery = mysqli_query($Connect, $strSQL);

                                  while ($element = mysqli_fetch_assoc($objQuery)) {
                                    echo '<input type="checkbox" name="water_source_1[]" value="'.$element['water_source_id'].'|'.$element['water_source_name'].'" id="'.$element['water_source_id'].'" >';
                                    echo '<label class="font-weak" for="fishing_grounds0">'.$element['water_source_name'].'</label>  ';
                                  }
                                  ?>

                                </div>

                            </div>

							</br>
                            <div class="form-group col-md-12">
                                <label>ประเภทปลา</label>
								<div class="chkflgA" style="display: none;">
									<select multiple="multiple" size="10" name="species_fish[]">

									  <?php

									  $strSQL = 'SELECT * FROM fish_type order by fish_name';
									  $objQuery = mysqli_query($Connect, $strSQL);

									  while ($element = mysqli_fetch_assoc($objQuery)) {
										   echo '<option value="'.$element["fish_id"].'|'.$element['fish_name'].'">'.$element["fish_name"].'</option>';
										 }
									  ?>
									</select>
								</div>

								<div class="chkflgf" style="display: none;">
									 <select multiple="multiple" size="10" name="species_fish_f[]" >

									  <?php

									  $strSQL = "SELECT * FROM fish_type where WaterID ='1' order by fish_name";
									  $objQuery = mysqli_query($Connect, $strSQL);

									  while ($element = mysqli_fetch_assoc($objQuery)) {
										   echo '<option value="'.$element["fish_id"].'|'.$element['fish_name'].'">'.$element["fish_name"].'</option>';
										 }
									  ?>

									</select>
								</div>

								<div class="chkflgs" style="display: none;">
									 <select multiple="multiple" size="10" name="species_fish_s[]" >

									  <?php

									  $strSQL = "SELECT * FROM fish_type where WaterID ='2' order by fish_name";
									  $objQuery = mysqli_query($Connect, $strSQL);

									  while ($element = mysqli_fetch_assoc($objQuery)) {
										   echo '<option value="'.$element["fish_id"].'|'.$element['fish_name'].'">'.$element["fish_name"].'</option>';
										 }
									  ?>

									</select>
								</div>

                            </div>

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
				  var demo1 = $('select[name="species_fish_f[]"]').bootstrapDualListbox();
				  var demo1 = $('select[name="species_fish_s[]"]').bootstrapDualListbox();

            </script>

    </body>

</html>
