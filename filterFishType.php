<?
							///ประเภทของแหล่งน้ำเค็ม
							
							if(!empty($_SESSION['final_species_fish'])){
								 $species_fish = $_SESSION['final_species_fish'];
							?>							
								<div class="form-group col-md-12"> <br/><h4>ประเภทปลา</h4>
									<table class="table table-bordered">
										<thead>
											<tr>											
												<TH width="20%" SCOPE="COL">INPUT</TH>
												<TH width="20%" SCOPE="COL">VALUE</TH>
												<TH width="35%" SCOPE="COL">ขนาดของแรงดึงสาย</TH>
												
											</tr>
										</thead>
										<tbody>
										<?
										  $x =1;
										  $countrow =1;
										  foreach($species_fish as $selected){								
											$selectedValue = explode("|", $selected);
											$tmp_lure_type_min ="";
											$tmp_lure_name_max  ="";
												$tmpsql = "SELECT `line_rang_min` as min,`line_rang_max` as max ";
												$tmpsql .= "FROM `fish_type` WHERE  ";
												$tmpsql .= "`fish_id` ='".$selectedValue[0]."' ";														
												//echo $tmpsql;
												$tmpresult = $Connect->query($tmpsql);
												while ($tmprow = $tmpresult->fetch_assoc()) {
												
												$tmp_lure_type_min .= $tmprow["min"];
												$tmp_lure_name_max .= $tmprow["max"];
												
												}//while ($row = $result->fetch_assoc()) {
													
												$x++;
												$class = ($x%2 == 0)? 'bgcolor="#f7f7f7"': '';
										?>
											<tr <?=$class?>>											
												<td><?echo $selectedValue[1];?></td>
												<td><?echo $selectedValue[0];?></td>
												<td><?=$tmp_lure_type_min?> - <?=$tmp_lure_name_max?></td>
											
											</tr>
										<?
										 }
										?>
										</tbody>
									</table>
								</div>
							<?
							}