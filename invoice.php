<?
require("conf/config_Session.php");
$REQUEST_URI ="http://" . $_SERVER['HTTP_HOST'] ."/Fishing_Equipment_Store/";
//print_r($_POST);
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

<?php   
function num2wordsThai($num){   
    $num=str_replace(",","",$num);
    $num_decimal=explode(".",$num);
    $num=$num_decimal[0];
    $returnNumWord;   
    $lenNumber=strlen($num);   
    $lenNumber2=$lenNumber-1;   
    $kaGroup=array("","สิบ","ร้อย","พัน","หมื่น","แสน","ล้าน","สิบ","ร้อย","พัน","หมื่น","แสน","ล้าน");   
    $kaDigit=array("","หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ต","แปด","เก้า");   
    $kaDigitDecimal=array("ศูนย์","หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ต","แปด","เก้า");   
    $ii=0;   
    for($i=$lenNumber2;$i>=0;$i--){   
        $kaNumWord[$i]=substr($num,$ii,1);   
        $ii++;   
    }   
    $ii=0;   
    for($i=$lenNumber2;$i>=0;$i--){   
        if(($kaNumWord[$i]==2 && $i==1) || ($kaNumWord[$i]==2 && $i==7)){   
            $kaDigit[$kaNumWord[$i]]="ยี่";   
        }else{   
            if($kaNumWord[$i]==2){   
                $kaDigit[$kaNumWord[$i]]="สอง";        
            }   
            if(($kaNumWord[$i]==1 && $i<=2 && $i==0) || ($kaNumWord[$i]==1 && $lenNumber>6 && $i==6)){   
                if($kaNumWord[$i+1]==0){   
                    $kaDigit[$kaNumWord[$i]]="หนึ่ง";      
                }else{   
                    $kaDigit[$kaNumWord[$i]]="เอ็ด";       
                }   
            }elseif(($kaNumWord[$i]==1 && $i<=2 && $i==1) || ($kaNumWord[$i]==1 && $lenNumber>6 && $i==7)){   
                $kaDigit[$kaNumWord[$i]]="";   
            }else{   
                if($kaNumWord[$i]==1){   
                    $kaDigit[$kaNumWord[$i]]="หนึ่ง";   
                }   
            }   
        }   
        if($kaNumWord[$i]==0){   
            if($i!=6){
                $kaGroup[$i]="";   
            }
        }   
        $kaNumWord[$i]=substr($num,$ii,1);   
        $ii++;   
        $returnNumWord.=$kaDigit[$kaNumWord[$i]].$kaGroup[$i];   
    }      
    if(isset($num_decimal[1])){
        $returnNumWord.="จุด";
        for($i=0;$i<strlen($num_decimal[1]);$i++){
                $returnNumWord.=$kaDigitDecimal[substr($num_decimal[1],$i,1)];  
        }
    }       
    return $returnNumWord;   
}   
?> 
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
                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">ร้านขายอุปกรณ์ตกปลา (ฟิชชิ่ง)</p>
                            <p class="mb-1">299/118 ถ.สายไหม แขวงสายไหม</p>
                            <p>เขตสายไหม กรุงเทพมหานคร 10220</p>
                            <p class="font-weight-bold mb-1">เลขที่ประจำตัวผู้เสียภาษี</p>
                            <p class="mb-1">1259700069296</p>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">ลูกค้า</p>
                            <p class="mb-1"><span class="text-muted">คุณ: </span><?=$_POST['firstname']?> <?=$_POST['lastname']?></p>                           
                            <p class="mb-1"><span class="text-muted"><?=nl2br($_POST['address'])?> </span></p>
							<? if(!empty($_POST['taxID'])) { ?>
                            <p class="font-weight-bold mb-1">เลขที่ประจำตัวผู้เสียภาษี</p>
                            <p class="mb-1"><?=$_POST['taxID']?></p>
							<? } ?>
                        </div>
                    </div>
					<hr class="my-1">
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

                    <div class="d-flex flex-row bg-dark text-white">
						
						<div class="col-md-6">
                            <div class="mb-2"> </div>	
                            <div class="h2 font-weight-light">(<?=num2wordsThai($sumPrice)?>บาทถ้วน) </div>
                        </div>
						
                          <div class="col-md-6 text-right">
                            <div class="mb-2">รวมทั้งสิ้นเป็นเงิน</div>	
                            <div class="h2 font-weight-light">฿<?=number_format($sumPrice,2)?></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank">Fishing Equipment Store</a></div>

</div>


