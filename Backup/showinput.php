<?php
header('Content-Type: text/html; charset=utf-8');
require("conf/config_Session.php");
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

$_SESSION['post-data'] = $_POST;
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
    <?php	
		require("headScript.php");		
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
							if (isset($_SESSION['final_species_fish'])) {
								unset($_SESSION['final_species_fish']);
							}
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
								$_SESSION['final_species_fish'] = $species_fish;
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
                                <div class="col-md-6 col-sm-6 text-right"><button type="submit" class="btn btn-success" onclick="location.href='lures.php';">Next</button></div>
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
