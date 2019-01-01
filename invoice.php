<?
require("conf/config_Session.php");
$REQUEST_URI ="http://" . $_SERVER['HTTP_HOST'] ."/Fishing_Equipment_Store/";
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<link href="css/invoice.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<script>
 $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>	

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0 invoice">
                    <div class="row p-4">
                        <div class="col-md-6">
                            <img src="image/f-logo.jpg" alt="">
                        </div>

                        <div class="col-md-6 text-right">							
                            <p class="font-weight-bold mb-1">Invoice #550</p>
                            <p class="text-muted">Due to: <?=date("Y/m/d")?></p>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
									<?php
										$sumPrice = 0;
										$num = 1;
										if (!empty($_SESSION["itemcartID_lures"])){
											$arr = array_count_values($_SESSION["itemcartID_lures"]);
											foreach ($arr as $key => $value) {												
												$url2 = $REQUEST_URI.'api/luresDetail.php?id='.$key;
												//echo $url2;
												$content2 = file_get_contents($url2);	
												$json2 = json_decode($content2);
												foreach ($json2 as $value2) {
													$rownum = 1;
													foreach ($value2->items as $product2) {	
													$sumPrice += ($product2->price* $value);												
													$_SESSION["sumPrice"] = $sumPrice;
										?>
										 <tr>
												<td><?=$num++;?></td>
												<td><?=$product2->model; ?></td>
												<td><?=$product2->model; ?></td>
												<td><?=$value;?></td>
												<td>฿<?=$product2->price; ?></td>
												<td>฿<?=number_format(($product2->price* $value),2)?></td>
										 </tr>
												
										<?php
													}
												}
											}
										}
										?>
										
										<?php
										
										if (!empty($_SESSION["itemcartID_line"])){
											$arr = array_count_values($_SESSION["itemcartID_line"]);
											foreach ($arr as $key => $value) {												
												$url2 = $REQUEST_URI.'api/lineDetail.php?id='.$key;
												//echo $url2;
												$content2 = file_get_contents($url2);	
												$json2 = json_decode($content2);
												foreach ($json2 as $value2) {
													$rownum = 1;
													foreach ($value2->items as $product2) {	
													$sumPrice += ($product2->price* $value);												
													$_SESSION["sumPrice"] = $sumPrice;
										?>
										 <tr>
												<td><?=$num++;?></td>
												<td><?=$product2->model; ?></td>
												<td><?=$product2->model; ?></td>
												<td><?=$value;?></td>
												<td>฿<?=$product2->price; ?></td>
												<td>฿<?=number_format(($product2->price* $value),2)?></td>
										 </tr>
												
										<?php
													}
												}
											}
										}
										?>
										
										
										<?php
										
										if (!empty($_SESSION["itemcartID_Reels"])){
											$arr = array_count_values($_SESSION["itemcartID_Reels"]);
											foreach ($arr as $key => $value) {												
												$url2 = $REQUEST_URI.'api/reelsDetail.php?id='.$key;
												//echo $url2;
												$content2 = file_get_contents($url2);	
												$json2 = json_decode($content2);
												foreach ($json2 as $value2) {
													$rownum = 1;
													foreach ($value2->items as $product2) {	
													$sumPrice += ($product2->Price* $value);												
													$_SESSION["sumPrice"] = $sumPrice;
										?>
										 <tr>
												<td><?=$num++;?></td>
												<td><?=$product2->Model; ?></td>
												<td><?=$product2->Model; ?></td>
												<td><?=$value;?></td>
												<td>฿<?=$product2->Price; ?></td>
												<td>฿<?=number_format(($product2->Price* $value),2)?></td>
										 </tr>
												
										<?php
													}
												}
											}
										}
										?>
										
										
										<?php
										
										if (!empty($_SESSION["itemcartID_rod"])){
											$arr = array_count_values($_SESSION["itemcartID_rod"]);
											foreach ($arr as $key => $value) {												
												$url2 = $REQUEST_URI.'api/rodDetail.php?id='.$key;
												//echo $url2;
												$content2 = file_get_contents($url2);	
												$json2 = json_decode($content2);
												foreach ($json2 as $value2) {
													$rownum = 1;
													foreach ($value2->items as $product2) {	
													$sumPrice += ($product2->Price* $value);												
													$_SESSION["sumPrice"] = $sumPrice;
										?>
										 <tr>
												<td><?=$num++;?></td>
												<td><?=$product2->Model; ?></td>
												<td><?=$product2->Model; ?></td>
												<td><?=$value;?></td>
												<td>฿<?=$product2->Price; ?></td>
												<td>฿<?=number_format(($product2->Price* $value),2) ?></td>
										 </tr>
												
										<?php
													}
												}
											}
										}
										?>
										
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                         <div class="py-3 px-5 text-right">
                            <div class="mb-2">Sub - Total amount</div>
                            <div class="h2 font-weight-light">฿<?=number_format($sumPrice,2)?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank">Fishing Equipment Store</a></div>

</div>


