<?php
require("AddToCart.php");
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
												<tr>
													<td data-th="Product">
														<div class="row">
															<div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
															<div class="col-sm-10">
																<h4 class="nomargin">Product 1</h4>
																<p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
															</div>
														</div>
													</td>
													<td data-th="Price">$1.99</td>
													<td data-th="Quantity">
														<input type="number" class="form-control text-center" value="1">
													</td>
													<td data-th="Subtotal" class="text-center">1.99</td>
													<td class="actions" data-th="">							
														<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								
													</td>
												</tr>
											</tbody>
											<tfoot>
												<tr class="visible-xs">
													<td class="text-center"><strong>Total 1.99</strong></td>
												</tr>
												<tr>
													<td><a href="#" class="btn btn-warning"  onclick="window.history.go(-1); return false;"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
													<td colspan="2" class="hidden-xs"></td>
													<td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
													<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
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
