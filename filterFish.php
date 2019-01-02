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
												<TH width="10%" SCOPE="COL">VALUE</TH>
												<TH width="35%" SCOPE="COL">ประเภทของเหยื่อ</TH>
												<TH width="10%" SCOPE="COL">VALUE ประเภทของเหยื่อ</TH>
											</tr>
										</thead>
										<tbody>
										<?
										  $countrow =1;
										  foreach($species_fish as $selected){								
											$selectedValue = explode("|", $selected);
											$tmp_lure_type_id ="";
											$tmp_lure_name_th  ="";
												$tmpsql = "SELECT `lure_type`.`lure_type_id` as id,`lure_type`.`lure_name_th` as name ";
												$tmpsql .= "FROM `fish_type_ref`,`lure_type` WHERE  ";
												$tmpsql .= "`fish_type_ref`.`lure_type_id`  = `lure_type`.`lure_type_id` ";
												$tmpsql .= "and `fish_type_ref`.`fish_id` ='".$selectedValue[0]."' ";														
												//echo $tmpsql;
												$tmpresult = $Connect->query($tmpsql);
												while ($tmprow = $tmpresult->fetch_assoc()) {
												
												$tmp_lure_type_id .= $tmprow["id"]."<BR/>";
												$tmp_lure_name_th .= $tmprow["name"]."<BR/>";
												
												}//while ($row = $result->fetch_assoc()) {
													
														
										?>
											<tr>											
												<td><?echo $selectedValue[1];?></td>
												<td><?echo $selectedValue[0];?></td>
												<td><?=$tmp_lure_name_th?></td>
												<td><?=$tmp_lure_type_id?></td>
											</tr>
										<?
										 }
										?>
										</tbody>
									</table>
								</div>
							<?
							}