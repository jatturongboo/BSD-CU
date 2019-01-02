<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="css/luresDetail.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eCommerce Product Detail</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

  </head>

  <body>
	<?php 
	
	$url = 'http://localhost/Fishing_Equipment_Store/api/rodDetail.php?id='.$_GET['id'];
	//echo $url;
	$content = file_get_contents($url);	
	$json = json_decode($content);
	
	foreach ($json as $value) {
		$rownum = 1;
		foreach ($value->items as $product) {
		$ItemID = $product->rod_id;		
				
	?>
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="<?=$product->image;?>" /></div>
						  <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
						</div>
						
						
					</div>
					
					<div class="details col-md-6">
						<h3 class="product-title">
						<?
							echo $product->Model;
						?>
						</h3>

						<p class="product-description">
						<?
							echo $product->Description;
						?>
						</p>
						<h4 class="price">current price: <span>$<?echo $product->Price; ?></span></h4>
						
						<?
						require("conf/config_mysqli.php");
						mysqli_set_charset($Connect,"utf8");
					  
						if (!empty($product->BRAND_ID)) {
							$sql = "SELECT BRAND_NAME FROM `brand` ";
							$sql .= "where BRAND_ID = '".$product->BRAND_ID."'";
							
							$result = $Connect->query($sql);
							while ($row = $result->fetch_assoc()) {
						?>
						<h4>BRAND: <span><?echo $row["BRAND_NAME"]; ?></span></h4>
						<?							
							}
						}
						?>
						
						<p class="product-description"> Lenght :
						<?
							echo $product->Lenght;
						?>
						</p>
						
						<p class="product-description"> section :
						<?
							echo $product->section;
						?>
						</p>
						
						<p class="product-description"> Guide :
						<?
							echo $product->Guide;
						?>
						</p>
						
						<p class="product-description"> 
						<?
							if (!empty($product->Type)) {
							$sql = "SELECT rod_type_name FROM `rod_type` ";
							$sql .= "where rod_type_id = '".$product->Type."'";
							
							$result = $Connect->query($sql);
							while ($row = $result->fetch_assoc()) {
							?>
							<h4>Type: <span><?echo $row["rod_type_name"]; ?></span></h4>
							<?							
								}
							}
							?>

						</p>	

						
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<?php 
		}
	}
	?>
  </body>
</html>
