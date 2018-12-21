<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="css/pageProduct.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->


	<script type="text/javascript">
		$(document).ready(function() {
			$('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
			$('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
		});
	</script>
	
	<?php 
	
	$pageNo = 1;
	if (!empty($_GET['page'])) {
		$pageNo = $_GET['page'];
	}
	
	$url = 'http://localhost/Fishing_Equipment_Store/api/lures.php?page='.$pageNo;
	$content = file_get_contents($url);	
	$json = json_decode($content);
	
	foreach ($json as $value) { 
	
	?>

	<div class="container">
		<div class="well well-sm">
			<strong>Category Title</strong>
			<div class="btn-group">
				<a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
				</span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
					class="glyphicon glyphicon-th"></span>Grid</a>
			</div>
		</div>
		<div id="products" class="row list-group">
		<?php
			$rownum = 1;
			foreach ($value->items as $product) {
			$ItemID = $product->lure_id;		
		?>
	
			<div class="item  col-xs-4 col-lg-4"  onclick="location.href='detail.php?id=<?=$ItemID?>';">
				<div class="thumbnail">
					<img class="group list-group-image" src="<?=$product->image;?>" alt="" />
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
								<a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
			<?php } ?>
		</div><!-- <div id="products" class="row list-group">-->
		<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
		<div align="right">
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<li class="page-item <?=($pageNo == 1)?"disabled":"";?>">
						<a class="page-link" <?=($pageNo == 1)?"":'href="product.php?page='.($pageNo-1).'"';?> tabindex="-1">Previous</a>
					</li>
					<?
					//echo $value->total_page;
					for($i =1; $i <= 3; $i++) {
						if($i <= $value->total_page) {
							
					?>
					<li class="page-item <?=($pageNo == $i)?"active":""; ?>">
						<a class="page-link" href="product.php?page=<?=$i?>"><?=$i?></a>
					</li>
					<?php
						}
					}
					?>
					<li class="page-item <?=($pageNo == $value->total_page)?"disabled":"";?>">
						<a class="page-link"<?=($pageNo == $value->total_page)?"":'href="product.php?page='.($pageNo+1).'"';?>>Next</a>
					</li>
				</ul>
			</nav>
		</div>
		</form>

	</div>
	<?php 
		}
	?>
