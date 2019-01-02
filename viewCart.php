<?php
require("conf/config_Session.php");
require("AddToCartlures.php");
?>
<!DOCTYPE html>
<html lang="en">
	<?php
		require("headScript.php");
	?>
    <body>
      	<?php
			require("header.php");		
			require("navigation.php");
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
                            <h3 class="title">กรอกข้อมูลเพื่อหาอุปกรณ์ตกปลาที่เหมาะสม</h3>

                        </div>
                    </div>
                    <!-- /section-title -->
					
					</br>
					<!-- Body -->
                    <div class="col-md-12">
					
						<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
						<div class="container">
							<table id="cart" class="table table-hover table-condensed">
											<thead>
												<tr>
													<th style="width:50%">Product</th>
													<th style="width:10%">Price</th>
													<th style="width:8%">Quantity</th>
													<th style="width:22%" class="text-center">Subtotal</th>
													<th style="width:10%"></th>
												</tr>
											</thead>										
											<tbody>
											<?
											$sumPrice = 0;
											if (!empty($_SESSION["itemcartID_lures"])){
												
												$arr = array_count_values($_SESSION["itemcartID_lures"]);
											
												foreach ($arr as $key => $value) {
													
													$url2 = $REQUEST_URI.'api/luresDetail.php?id='.$key;
													$content2 = file_get_contents($url2);	
													$json2 = json_decode($content2);
												
													foreach ($json2 as $value2) {
														$rownum = 1;
														foreach ($value2->items as $product2){
														$sumPricelures += ($product2->price * $value);												
														$sumPrice += $sumPricelures;
											?>
												<tr>
													<td data-th="Product">
														<div class="row">
															<div class="col-sm-2 hidden-xs"><img src="<?echo $product2->image; ?>" alt="..." class="img-responsive"/></div>
															<div class="col-sm-10">
																<h4 class="nomargin"><?echo $product2->model; ?></h4>
																<p><?=$product2->description;?></p>
															</div>
														</div>
													</td>
													<td data-th="Price">฿<?=$product2->price?></td>
													<td data-th="Quantity">
														<!--<input type="number" class="form-control text-center" value="<?=$value?>">-->
														<?=$value?>
													</td>
													<td data-th="Subtotal" class="text-center"><?=$sumPricelures?></td>
													<td class="actions" data-th="">							
														<button class="btn btn-danger btn-sm" onclick="location.href='delCartView.php?delID=<?=$key?>&fn=lures'"><i class="fa fa-trash-o"></i></button>								
													</td>
												</tr>	
																								
											<?php
														}
													}
												}
											}
											?>
												
											<?
											if (!empty($_SESSION["itemcartID_line"])){
												
												$arr = array_count_values($_SESSION["itemcartID_line"]);
											
												foreach ($arr as $key => $value) {
													
													$urlvline = $REQUEST_URI.'api/lineDetail.php?id='.$key;
													$contentvline = file_get_contents($urlvline);	
													$jsonvline = json_decode($contentvline);
												
													foreach ($jsonvline as $valuevline) {
														$rownum = 1;
														foreach ($valuevline->items as $productvline){
														$sumPricevline += ($productvline->price * $value);												
														$sumPrice += $sumPricevline;
											?>
											<tr>
													<td data-th="Product">
														<div class="row">
															<div class="col-sm-2 hidden-xs"><img src="<?echo $productvline->image; ?>" alt="..." class="img-responsive"/></div>
															<div class="col-sm-10">
																<h4 class="nomargin"><?echo $productvline->model; ?></h4>
																<p><?=$productvline->description;?></p>
															</div>
														</div>
													</td>
													<td data-th="Price">฿<?=$productvline->price?></td>
													<td data-th="Quantity">
														<!--<input type="number" class="form-control text-center" value="<?=$value?>">-->
														<?=$value?>
													</td>
													<td data-th="Subtotal" class="text-center"><?=$sumPricevline?></td>
													<td class="actions" data-th="">							
														<button class="btn btn-danger btn-sm" onclick="location.href='delCartView.php?delID=<?=$key?>&fn=line'"><i class="fa fa-trash-o"></i></button>								
													</td>
												</tr>	
																								
											<?php
														}
													}
												}
											}
											?>
											
											
											
											<?
											if (!empty($_SESSION["itemcartID_Reels"])){
												
												$arr = array_count_values($_SESSION["itemcartID_Reels"]);
											
												foreach ($arr as $key => $value) {
													
													$urlvline = $REQUEST_URI.'api/reelsDetail.php?id='.$key;
													$contentvline = file_get_contents($urlvline);	
													$jsonvline = json_decode($contentvline);
												
													foreach ($jsonvline as $valuevline) {
														$rownum = 1;
														foreach ($valuevline->items as $productvline){
														$sumPriceReel += ($productvline->Price * $value);												
														$sumPrice += $sumPriceReel;
											?>
												<tr>
													<td data-th="Product">
														<div class="row">
															<div class="col-sm-2 hidden-xs"><img src="<?echo $productvline->Images; ?>" alt="..." class="img-responsive"/></div>
															<div class="col-sm-10">
																<h4 class="nomargin"><?echo $productvline->Model; ?></h4>
																<p><?=$productvline->Description;?></p>
															</div>
														</div>
													</td>
													<td data-th="Price">฿<?=$productvline->Price?></td>
													<td data-th="Quantity">
														<!--<input type="number" class="form-control text-center" value="<?=$value?>">-->
														<?=$value?>
													</td>
													<td data-th="Subtotal" class="text-center"><?=$sumPriceReel?></td>
													<td class="actions" data-th="">							
														<button class="btn btn-danger btn-sm" onclick="location.href='delCartView.php?delID=<?=$key?>&fn=Reels'"><i class="fa fa-trash-o"></i></button>								
													</td>
												</tr>	
																								
											<?php
														}
													}
												}
											}
											?>
											
											
											<?
											if (!empty($_SESSION["itemcartID_rod"])){
												
												$arr = array_count_values($_SESSION["itemcartID_rod"]);
											
												foreach ($arr as $key => $value) {
													
													$urlvline = $REQUEST_URI.'api/rodDetail.php?id='.$key;
													$contentvline = file_get_contents($urlvline);	
													$jsonvline = json_decode($contentvline);
												
													foreach ($jsonvline as $valuevline) {
														$rownum = 1;
														foreach ($valuevline->items as $productvline){
														$sumPricerod += ($productvline->Price * $value);												
														$sumPrice += $sumPricerod;
											?>
												<tr>
													<td data-th="Product">
														<div class="row">
															<div class="col-sm-2 hidden-xs"><img src="<?echo $productvline->image; ?>" alt="..." class="img-responsive"/></div>
															<div class="col-sm-10">
																<h4 class="nomargin"><?echo $productvline->Model; ?></h4>
																<p><?=$productvline->Description;?></p>
															</div>
														</div>
													</td>
													<td data-th="Price">฿<?=$productvline->Price?></td>
													<td data-th="Quantity">
														<!--<input type="number" class="form-control text-center" value="<?=$value?>">-->
														<?=$value?>
													</td>
													<td data-th="Subtotal" class="text-center"><?=$sumPricerod?></td>
													<td class="actions" data-th="">							
														<button class="btn btn-danger btn-sm" onclick="location.href='delCartView.php?delID=<?=$key?>&fn=rod'"><i class="fa fa-trash-o"></i></button>								
													</td>
												</tr>	
																								
											<?php
														}
													}
												}
											}
											?>
											
											</tbody>
											<tfoot>
												<tr class="visible-xs">
													<td class="text-center"><strong>Total <?=$sumPrice;?></strong></td>
												</tr>
												<tr>
													<td><a href="#" class="btn btn-warning"  onclick="window.history.go(-1); return false;"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
													<td colspan="2" class="hidden-xs"></td>
													<td class="hidden-xs text-center"><strong>Total <?=$sumPrice;?></strong></td>
													<td><a href="#" class="btn btn-success btn-block" onclick="location.href='submitInvoice.php'">Checkout <i class="fa fa-angle-right"></i></a></td>
												</tr>
											</tfoot>
										</table>
						</div>
					
						
                    </div>
					<!-- Body -->
					
                </div>
				 <!-- row -->
                <!-- /container -->
            </div>
            <!-- /HOME -->
			<?php 
				require("footer.php"); 		
			?>
            

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
