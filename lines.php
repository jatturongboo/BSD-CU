<?php
require("conf/config_Session.php");
include("AddToCartline.php");

$waterlet = "100";
$watertype_f = "";

if (!empty($_SESSION["post-data"]["watertype_f"])) {
  $watertype_f =  $_SESSION["post-data"]["watertype_f"];
  $waterlet = "100";
}


$watertype_s = "";
if (!empty($_SESSION["post-data"]["watertype_s"])) {
  $watertype_s =  $_SESSION["post-data"]["watertype_s"];
  $waterlet = "200";
}

?>
<!DOCTYPE html>
<html lang="en">
	<?php
		include("headScript.php");
	?>
    <body>
      	<?php
			include("header.php");		
			include("navigation.php");
		?>
        <!-- HOME -->
        <div id="home">
            <!-- container -->
            <div class="container">			
                <!-- row -->
                <div class="row">
				
                    <!-- section-title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">เอ็น (lines)</h3>							
                        </div>
						
                    </div>
                    <!-- /section-title -->
					
					</br>
					<!-- Body -->
                    <div class="col-md-12">
                        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
						<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
						<link href="css/pageProduct.css" rel="stylesheet" >
						<link href="css/pageProduct2.css" rel="stylesheet" />
						<link href="css/checkbox.css" rel="stylesheet" />
						<!------ Include the above in your HEAD tag ---------->
							<script type="text/javascript">
								$(document).ready(function() {
									$('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
									$('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
																		
								});
							</script>
						
							<?php

							$txt_type_fish ="";
								if(isset($_SESSION['final_species_fish'])){
									foreach($_SESSION['final_species_fish'] as $key_type_fish => $value_type_fish){
										$tmpvalue_type_fish = explode("|", $value_type_fish);
										$txt_type_fish .= "".$tmpvalue_type_fish[0]."|";
									}
								}							
																	
							$pageNo = 1;
							if (!empty($_GET['page'])) {
								$pageNo = $_GET['page'];
							}							
							$urlget = $REQUEST_URI.'/api/lines.php?page='.$pageNo.'&sessionfish='.$txt_type_fish.'&lenght='.$waterlet;
							//echo $urlget;
							$contentget = file_get_contents($urlget);
							$jsonget = json_decode($contentget);
							foreach ($jsonget as $valuelures) {			
							?>
							<!--! Bar -->

							<!--! Bar -->
							
							
								<div class="container" > 
									<div class="well well-sm">
										<strong>Category Title</strong>
										<div class="btn-group">
											<a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
											</span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
												class="glyphicon glyphicon-th"></span>Grid</a>
										</div>										
									</div>
									<?
										if (!empty($valuelures->items)) {
											$urllines = "location.href='reels.php';";
									?>
									
									<div class="text-right"><button type="submit" class="btn btn-success" onclick="<?=$urllines;?>">Next</button></div>
									<?
										}
									?>
									<div id="products" class="row list-group">
									<?php
										$rownum = 1;
										if (!empty($valuelures->items)) {
											
										foreach ($valuelures->items as $product) {
										$ItemID = $product->line_id;		
									?>
								
										<div class="item col-xs-4 col-lg-4 "  >
											<div class="thumbnail">
												<img class="group list-group-image" src="<?=$product->image;?>"  alt=""  onclick=" window.open('detaillines.php?id=<?=$ItemID?>','_blank');" />
												<div class="caption">
													<h4 class="group inner list-group-item-heading">
													<?
														echo $product->model;
													?>
													</h4>
													<p class="group inner list-group-item-text">
													<?
														echo $product->description;
													?>													
												<!--<label class="btn-primary" data-toggle="modal" data-target="#exampleModal<?=$ItemID?>">เพิ่มเติม...</label> --->

													<?
														require("conf/config_mysqli.php");
														mysqli_set_charset($Connect,"utf8");
													if (!empty($product->line_type_id)) {
														$sqlline = "SELECT line_type_name,line_type_desc FROM `line_type` ";
														$sqlline .= "where line_type_id = '".$product->line_type_id."'";
														
														$resultline = $Connect->query($sqlline);
														while ($rowline = $resultline->fetch_assoc()) {
														?>
														<h4>ประเภทสาย: <span><?echo $rowline["line_type_name"]; ?></span></h4>
														<?
														}//while ($row = $result->fetch_assoc()) {
													}//if (!empty($product->lure_type)) {
													?>
													</p>
													ความยาว :
													<?
														echo $product->lenght;
													?>
													<div class="row">
														<div class="col-xs-12 col-md-6">
															<p class="lead">
															<?
																echo "฿".$product->price;
															?>
															</p>
														</div>
														<div class="col-xs-12 col-md-6">
															<?
															$urlPage ="";
															if (!empty($_GET['page'])) {
																$urlPage = "&page=".$_GET['page'];
															}
															if($waterlet>$product->lenght){
																$urlAdd = "location.href='lines.php?cart=1&id=".$ItemID."".$urlPage."&loop=".ceil($waterlet/$product->lenght)."';";
																
															}
															else {
																$urlAdd = "location.href='lines.php?cart=1&id=".$ItemID."".$urlPage."';";
															}
															
															?>
															<a class="btn btn-success cd-add-to-cart" data-price="<?=$product->price?>"  onclick="<?=$urlAdd;?>" href="#0" > เลือก </a>
														</div>
														
													</div>
												</div>
											</div>
										</div>
									</a>
										<?php 
											} 											
										}
										else{ 
												echo "      <h2>Not Found</h2>";
											}
										?>
									</div><!-- <div id="products" class="row list-group">-->
									<!-- Page navigation -->
									<?
										if (!empty($valuelures->items)) {
									?>
									<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
									<div align="right">
										<nav aria-label="Page navigation example">
											<ul class="pagination justify-content-center">
												<li class="page-item <?=($pageNo == 1)?"disabled":"";?>">
													<a class="page-link" <?=($pageNo == 1)?"":'href="lines.php?page='.($pageNo-1).'"';?> tabindex="-1">Previous</a>
												</li>
												<?
												//echo $value->total_page;
												for($i =1; $i <= 3; $i++) {
													if($i <= $valuelures->total_page) {
														
												?>
												<li class="page-item <?=($pageNo == $i)?"active":""; ?>">
													<a class="page-link" href="lines.php?page=<?=$i?>"><?=$i?></a>
												</li>
												<?php
													}
												}
												?>
												<li class="page-item <?=($pageNo == $valuelures->total_page)?"disabled":"";?>">
													<a class="page-link"<?=($pageNo == $valuelures->total_page)?"":'href="lines.php?page='.($pageNo+1).'"';?>>Next</a>
												</li>
											</ul>
										</nav>
									</div>
									</form>
									<?
									}
									
									include("filter.php");
									include("filterfishType.php");
									?>
									<!-- Page navigation -->
								</div>
							
							<?php 
								}
							?>
						
                    </div>
					<!-- Body -->
					
                </div>
				 <!-- row -->
                <!-- /container -->
            </div>
            <!-- /HOME -->
			
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
			<!-- jQuery Plugins -->
			
    </body>

</html>
