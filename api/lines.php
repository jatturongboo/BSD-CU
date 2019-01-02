<?
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: GET,POST");
	header("Access-Control-Allow-Credentials: true");
	header('Content-Type: application/json;charset=utf-8');	
	require("../conf/config_mysqli.php");
	mysqli_set_charset($Connect,"utf8");
	$pageNumber = 6;
	$sqlluresWhere ="";
	$sqlluresfish = "";
	$sqlfishfilter = "";
		$start = 0;
		$end = $pageNumber;
		if (!empty($_GET['page'])) {
			  $start = ($_GET['page'] - 1) * $pageNumber ; 
			  $end = $pageNumber;
		}
		$sqllures = "SELECT * FROM `lines` ";
		$sqllures .= "where 1=1 ";
		
		if (!empty($_GET['sessionfish'])) {
			$arrfish = explode("|",$_GET['sessionfish']);
			$sqlluresWherefish = " fish_id in ( ";
			foreach( $arrfish as $keyfish => $valuefish){
				if (!empty($valuefish))
				$sqlluresWherefish .= "'".$valuefish."',";
			}			
			$sqlluresWherefish .= "'-99' ) ";
			
			$sqlfishfilter = " AND `strenght_kg` between (SELECT min(`line_rang_min`) FROM `fish_type` where " .$sqlluresWherefish .") and (SELECT max(`line_rang_max`) FROM `fish_type` where " .$sqlluresWherefish .") "; 
		}else{
			$sqlfishfilter = " AND line_type_id = 1 AND size between 1.5 and 2.00";
		}
		
		//line 
		$sqlfishfilter = " AND LENGHT >=".$_GET['lenght'];
		
		$sqllures .= $sqlluresWhere;
		$sqllures .= $sqlfishfilter;
		$sqllures .= " limit ". $start.",".$end;
		//echo $sqllures;
		$result = $Connect->query($sqllures);
		while ($rowlures = $result->fetch_assoc()) {
		$rowluress[] = $rowlures;
		}
	   
		$sqlluresTotal = "SELECT count(line_id) as total FROM `lines` where 1=1 ". $sqlluresWhere ." ".$sqlfishfilter;
		$resultTotal = $Connect->query($sqlluresTotal);
		while ($rowTotal = $resultTotal->fetch_assoc()) {
			$rowsTotal = $rowTotal["total"];
		}
		$totalpage =  ceil($rowsTotal / $pageNumber);
		$sqlluresType = "SELECT * FROM line_type ";

		$resultType = $Connect->query($sqlluresType);
		while ($rowType = $resultType->fetch_assoc()) {			
				$rowsType[] = $rowType;

		}
		if (!empty($rowluress)) {
			$output2= '{
				"result": {				
						"total_size" : "'.$rowsTotal.'",
						"total_page" : "'.$totalpage.'",
						"items": '.json_encode($rowluress).',
						"line_type": '.json_encode($rowsType).'
					}
				}';
		}
		else {
			$output2= '{
				"result": {				
						"total_size" : "'.$rowsTotal.'",
						"total_page" : "'.$totalpage.'",						
						"line_type": '.json_encode($rowsType).'	
					}
				}';
		}
		print_r($output2);

?>