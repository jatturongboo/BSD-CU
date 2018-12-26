<?php
require("conf/config_Session.php");
include("AddToCartlures.php");
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
                            <h3 class="title">เหยื่อปลอม (LURES)</h3>							
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
										if (!empty($_SESSION['checklures_type'])) {
											$key=array_search($_GET['lures_type'],$_SESSION['checklures_type']);
											if($key!==false)
											unset($_SESSION['checklures_type'][$key]);
										}
									}
									else {
										if (!empty($_SESSION['checklures_type']) && $_GET['chk'] == 'unChecked') {										
											$key=array_search($_GET['lures_type'],$_SESSION['checklures_type']);
											if($key===false)
											$_SESSION["checklures_type"][]= $_GET['lures_type'];
										}else{										
											if (!empty($_GET['lures_type'])) {
												$_SESSION["checklures_type"][]= $_GET['lures_type'];
											}
										}
										
									}
									
								if(!empty($_SESSION['checklures_type'])){
									foreach($_SESSION['checklures_type'] as $key_type => $value_type){
										$txt_type .= "".$value_type."|";
									}
								}

								if(!empty($_SESSION['final_species_fish'])){
									foreach($_SESSION['final_species_fish'] as $key_type_fish => $value_type_fish){
										$tmpvalue_type_fish = explode("|", $value_type_fish);
										$txt_type_fish .= "".$tmpvalue_type_fish[0]."|";
									}
								}

							$pageNo = 1;
							if (!empty($_GET['page'])) {
								$pageNo = $_GET['page'];
							}							
							$urlget = $REQUEST_URI.'api/lures.php?page='.$pageNo.'&session_lure_type='.$txt_type.'&sessionfish='.$txt_type_fish;
							echo $urlget;

							$contentget = file_get_contents($urlget);
							$jsonget = json_decode($contentget);
							foreach ($jsonget as $valuelures) {					
							?>
							<!--! Bar -->
							
							<div id="sidebar">
								<h4>ประเภทลักษณะรูปร่าง</h4>                   							
								<ul>
									<? 																	
									if($_GET['chk']== "checked"){
										if (!empty($_SESSION['checklures_type'])) {
											$key=array_search($_GET['lures_type'],$_SESSION['checklures_type']);
											if($key!==false)
											unset($_SESSION['checklures_type'][$key]);
										}
									}
									else {
										if (!empty($_SESSION['checklures_type']) && $_GET['chk'] == 'unChecked') {
											$key=array_search($_GET['lures_type'],$_SESSION['checklures_type']);
											if($key===false)
											$_SESSION["checklures_type"][]= $_GET['lures_type'];
										}else{
											if (!empty($_GET['lures_type'])) {
												$_SESSION["checklures_type"][]= $_GET['lures_type'];
											}
										}
									}

									foreach ($valuelures->lure_type1 as $luretype) {
										$checked = "unChecked";
										if (!empty($_SESSION['checklures_type'])){ 
												$keysearchchk=array_search($luretype->lure_type_id,$_SESSION['checklures_type']);											
												
												if($keysearchchk!==false){
													$checked = "checked";
											}
										}											
											$urlcheckbox = "location.href='lures.php?lures_type=".$luretype->lure_type_id."&chk=".$checked."';";
									?>
										<li>
										<label class="customcheck"><?=$luretype->lure_name_th?>										
										<input type="checkbox" class="custom-control-input" id="Check<?=$luretype->lure_type_id?>" onclick="<?=$urlcheckbox;?>" <?=$checked?>>									
										  <span class="checkmark"></span>
										</label>
										
								</li>
									<? } ?>
								</ul>		

								<font size="2">	
									<label class="btn-primary" data-toggle="modal" data-target="#exampleModalType1">Read More...</label>
								</font>
								
						<!-- Modal POPUP-->
						<div class="modal fade" id="exampleModalType1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalType1">
											<h3>เหยื่อปลอม (LURES) แบ่งตามประเภทการใช้งาน</h3>
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">																	
										<b>1.เหยื่อยาง</b>  ใช้การลาก หรือกระตุก เพื่อสร้างความสนใจ<br/>
										<b>2.เหยื่อจิ๊ก</b>  เป็นแผ่นเหล็ก ใช้วิธีจิ๊ก หรือหยกขึ้นลง<br/>
										<b>3.เหยื่อป๊อบเปอร์</b>  เหยื่อพวก ป๊อปเปอร์ ใช้ปากป๊อปน้ำสร้างความสนใจ<br/>
										<b>4.เหยื่อปลั๊ก</b>  คือเหยื่อที่เป็นตัวปลาแบ่งตามลักษณะของลิ้น ดำตื้น ดำลึก  แบ่งตามการลอย เช่นจม จมช้า ลอย  รวมทั้งแบบไม่มีลิ้น สร้างแอคชั่นด้วยการกระตุกให้เลื้อยซ้าย ขวา<br/>
										<b>5.เหยื่อประเภทใบพริ้วน้ำ</b> เช่น สปูน<br/>
										<b>6.เหยื่อใบหมุน</b> เช่น สปินเนอร์ สปินเนอร์เบท<br/>
										<b>7.เหยื่อดำน้ำหน้าดิน</b> จำพวกกระดี่<br/>
										<b>8.เหยื่อผิวน้ำ</b> จำพวก กบยาง กบไม้ หรือเหยื่อใบพัดต่าง ๆ<br/>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<!-- Modal POPUP-->
														
							<h4>ประเภทลักษณะการใช้งาน</h4>
							<ul>
									<? 																	
									if($_GET['chk']== "checked"){
										if (!empty($_SESSION['checklures_type'])) {
											$key=array_search($_GET['lures_type'],$_SESSION['checklures_type']);
											if($key!==false)
											unset($_SESSION['checklures_type'][$key]);
										}
									}
									else {
										if (!empty($_SESSION['checklures_type']) && $_GET['chk'] == 'unChecked') {
											$key=array_search($_GET['lures_type'],$_SESSION['checklures_type']);
											if($key===false)
											$_SESSION["checklures_type"][]= $_GET['lures_type'];
										}else{
											if (!empty($_GET['lures_type'])) {
												$_SESSION["checklures_type"][]= $_GET['lures_type'];
											}
										}
									}

									foreach ($valuelures->lure_type2 as $luretype) {
										$checked = "unChecked";
										if (!empty($_SESSION['checklures_type'])){ 
												$keysearchchk=array_search($luretype->lure_type_id,$_SESSION['checklures_type']);											
												
												if($keysearchchk!==false){
													$checked = "checked";
											}
										}											
											$urlcheckbox = "location.href='lures.php?lures_type=".$luretype->lure_type_id."&chk=".$checked."';";
									?>
										<li>
										<label class="customcheck"><?=$luretype->lure_name_th?>										
										<input type="checkbox" class="custom-control-input" id="Check<?=$luretype->lure_type_id?>" onclick="<?=$urlcheckbox;?>" <?=$checked?>>									
										  <span class="checkmark"></span>
										</label>
										

								</li>
									<? } ?>
								</ul>					
							
								<font size="2">									
									<div id="collapse<?=$luretype->lure_type_id?>" style="display:none">
									<p><?=$luretype->description?></p>
									</div>
									<a href="#collapse<?=$luretype->lure_type_id?>" class="nav-toggle" onclick="scrollTo()" >Read More</a>
								</font>
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
											$urllines = "location.href='lines.php';";
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
										$ItemID = $product->lure_id;		
									?>
								
										<div class="item col-xs-4 col-lg-4 "  >
											<div class="thumbnail">
												<img class="group list-group-image" src="<?=$product->image;?>"  alt=""  onclick=" window.open('detaillures.php?id=<?=$ItemID?>','_blank');" />
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
													<br>
													
													</p>
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
															if (!empty($_GET['page'])) {
																$urlPage .= "&page=".$_GET['page'];
															}
															$urlAdd = "location.href='lures.php?cart=".$product->price."&id=".$ItemID.$urlPage."';";
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
													<a class="page-link" <?=($pageNo == 1)?"":'href="lures.php?page='.($pageNo-1).'"';?> tabindex="-1">Previous</a>
												</li>
												<?
												//echo $value->total_page;
												$calngv = $pageNo;
												$i = 1;
												if($pageNo < 5){
													$calngv = $pageNo+3;
												}else {
													$i = $pageNo-4;
												}
												for($i; $i <=$calngv; $i++) {
													if($i <= $valuelures->total_page) {
														
												?>
												<li class="page-item <?=($pageNo == $i)?"active":""; ?>">
													<a class="page-link" href="lures.php?page=<?=$i?>"><?=$i?></a>
												</li>
												<?php
													}
												}
												?>
												<li class="page-item <?=($pageNo == $valuelures->total_page)?"disabled":"";?>">
													<a class="page-link"<?=($pageNo == $valuelures->total_page)?"":'href="lures.php?page='.($pageNo+1).'"';?>>Next</a>
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
