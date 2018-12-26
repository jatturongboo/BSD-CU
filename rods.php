<?php
require("conf/config_Session.php");
include("AddToCartrod.php");
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
                            <h3 class="title">เบ็ด (RODS)</h3>							
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
						<!------ Include the above in your HEAD tag ---------->
							<?php 
 									if($_GET['chk']== "checked"){
										if (!empty($_SESSION['checkrods_type'])) {
											$key=array_search($_GET['rod_type'],$_SESSION['checkrods_type']);
											if($key!==false)
											unset($_SESSION['checkrods_type'][$key]);
										}
									}
									else {
										if (!empty($_SESSION['checkrods_type']) && $_GET['chk'] == 'unChecked') {										
											$key=array_search($_GET['rod_type'],$_SESSION['checkrods_type']);
											if($key===false)
											$_SESSION["checkrods_type"][]= $_GET['rod_type'];
										}else{										
											if (!empty($_GET['rod_type'])) {
												$_SESSION["checkrods_type"][]= $_GET['rod_type'];
											}
										}
										
									}
								if (!empty($_SESSION['checkrods_type'])) {	
									foreach($_SESSION['checkrods_type'] as $key_type => $value_type){
										$txt_type .= "".$value_type."|";
									}
								}
									
							$pageNo = 1;
							if (!empty($_GET['page'])) {
								$pageNo = $_GET['page'];
							}							
							$urlget = $REQUEST_URI.'/api/rods.php?page='.$pageNo.'&session_rods_type='.$txt_type;
							//echo $urlget;
							$contentget = file_get_contents($urlget);
							$jsonget = json_decode($contentget);
							foreach ($jsonget as $valuelures) {	
							?>
							<!--! Bar -->
							
							<div id="sidebar">
								<h3>ประเภทเบ็ด</h3>							
									<ul>
									<? 																	
									if($_GET['chk']== "checked"){
										if (!empty($_SESSION['checkrods_type'])) {
											$key=array_search($_GET['rod_type'],$_SESSION['checkrods_type']);
											if($key!==false)
											unset($_SESSION['checkrods_type'][$key]);
										}
									}
									else {
										if (!empty($_SESSION['checkrods_type']) && $_GET['chk'] == 'unChecked') {
											//echo "1";
											$key=array_search($_GET['rod_type'],$_SESSION['checkrods_type']);
											if($key===false)
											$_SESSION["checkrods_type"][]= $_GET['rod_type'];
										}else{
											//echo "2";
											if (!empty($_GET['rod_type'])) {
												$_SESSION["checkrods_type"][]= $_GET['rod_type'];
											}
										}
									}

									if (!empty($valuelures->rod_type)) {
											foreach ($valuelures->rod_type as $luretype) {
												$checked = "unChecked";
												if (!empty($_SESSION['checkrods_type'])){
														$keysearchchk=array_search($luretype->rod_type_id,$_SESSION['checkrods_type']);											
														
														if($keysearchchk!==false){
															$checked = "checked";
													}
												}											
													$urlcheckbox = "location.href='rods.php?rod_type=".$luretype->rod_type_id."&chk=".$checked."';";
											?>
										<li>
											<label class="customcheck"><?=$luretype->rod_type_name?>										
											<input type="checkbox" class="custom-control-input" id="Check<?=$luretype->rod_type_id?>" onclick="<?=$urlcheckbox;?>" <?=$checked?>>									
												<span class="checkmark"></span>
											</label>

										</li>
									<? 
										}
									}
									?>
								</ul>
							
							<!------ Include Read More ---------->
							<script>
								$(document).ready(function () {
									$('.nav-toggle').click(function () {
										var collapse_content_selector = $(this).attr('href');
										var toggle_switch = $(this);
										$(collapse_content_selector).toggle(function () {
											if ($(this).css('display') == 'none') {
												toggle_switch.html('Read More');
											} else {
												toggle_switch.html('Read Less');
											}
										});
									});
								});						
							</script>	
							<!------ Include Read More ---------->
							</div>
							<!--! Bar -->
							
							<div id="grids">
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
										$ItemID = $product->rod_id;		
									?>
								
										<div class="item col-xs-4 col-lg-4 "  >
											<div class="thumbnail">
												<img class="group list-group-image" src="<?=$product->image;?>"  alt=""  onclick=" window.open('detailrods.php?id=<?=$ItemID?>','_blank');" />
												<div class="caption">
													<h4 class="group inner list-group-item-heading">
													<?
														echo $product->Model;
													?>
													</h4>
													<p class="group inner list-group-item-text">
													<?
														echo $product->Description;
													?>
													<br>
													<label class="btn-primary" data-toggle="modal" data-target="#exampleModal<?=$ItemID?>">เพิ่มเติม...</label>

														<!-- Modal POPUP-->
														<div class="modal fade" id="exampleModal<?=$ItemID?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														  <div class="modal-dialog" role="document">
															<div class="modal-content">
															  <div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel<?=$ItemID?>">ประโยชน์ ของ<?=$product->Model?></h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																  <span aria-hidden="true">&times;</span>
																</button>
															  </div>
															  <div class="modal-body">
																<?= $product->Description;?>
															  </div>
															  <div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															  </div>
															</div>
														  </div>
														</div>
														<!-- Modal POPUP-->
													</p>
													<div class="row">
														<div class="col-xs-12 col-md-6">
															<p class="lead">
															<?
																echo "฿".$product->Price;
															?>
															</p>
														</div>
														<div class="col-xs-12 col-md-6">
															<?
															if (!empty($_GET['page'])) {
																$urlPage .= "&page=".$_GET['page'];
															}
															$urlAdd = "location.href='rods.php?cart=1&id=".$ItemID."".$urlPage."';";
															?>
															<a class="btn btn-success cd-add-to-cart" data-price="<?=$product->Price?>"  onclick="<?=$urlAdd;?>" href="#0" > เลือก </a>
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
													<a class="page-link" <?=($pageNo == 1)?"":'href="rods.php?page='.($pageNo-1).'"';?> tabindex="-1">Previous</a>
												</li>
												<?
												//echo $value->total_page;
												for($i =1; $i <= 3; $i++) {
													if($i <= $valuelures->total_page) {
														
												?>
												<li class="page-item <?=($pageNo == $i)?"active":""; ?>">
													<a class="page-link" href="rods.php?page=<?=$i?>"><?=$i?></a>
												</li>
												<?php
													}
												}
												?>
												<li class="page-item <?=($pageNo == $valuelures->total_page)?"disabled":"";?>">
													<a class="page-link"<?=($pageNo == $valuelures->total_page)?"":'href="rods.php?page='.($pageNo+1).'"';?>>Next</a>
												</li>
											</ul>
										</nav>
									</div>
									</form>
									<?
									}
									?>
									<!-- Page navigation -->
								</div>
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
