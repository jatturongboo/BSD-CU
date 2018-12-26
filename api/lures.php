<?
	session_start();		
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: GET,POST");
	header("Access-Control-Allow-Credentials: true");
	header('Content-Type: application/json;charset=utf-8');	
	require("../conf/config_mysqli.php");
	mysqli_set_charset($Connect,"utf8");
	$pageNumber = 6;
	$sqlluresWhere ="";
		$start = 0;
		$end = $pageNumber;
		if (!empty($_GET['page'])) {
			  $start = ($_GET['page'] - 1) * $pageNumber ; 
			  $end = $pageNumber;
		}
		$sqllures = "SELECT * FROM lures ";
		$sqllures .= "where qty > 0 ";
		if (!empty($_GET['session'])) {
			$arr = explode("|",$_GET['session']);
			$sqlluresWhere = " AND lure_type in ( ";			
			foreach( $arr as $key3 => $value3){
				if (!empty($value3))
				$sqlluresWhere .= "'".$value3."',";
			}
			
			$sqlluresWhere .= "'-99' ) ";
		}
		$sqllures .= $sqlluresWhere;
		$sqllures .= " limit ". $start.",".$end;
	
		$result = $Connect->query($sqllures);
		while ($rowlures = $result->fetch_assoc()) {
		$rowluress[] = $rowlures;
		}
	   
		$sqlluresTotal = "SELECT count(lure_id) as total FROM lures where qty > 0 ". $sqlluresWhere;
		
		$resultTotal = $Connect->query($sqlluresTotal);
		while ($rowTotal = $resultTotal->fetch_assoc()) {
			$rowsTotal = $rowTotal["total"];
		}
		$totalpage =  ceil($rowsTotal / $pageNumber);
		$sqlluresType = "SELECT * FROM lure_type ";

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
						"lure_type": '.json_encode($rowsType).',
						"sqllures":'.json_encode($sqllures).'			
					}
				}';
		}
		else {
			$output2= '{
				"result": {				
						"total_size" : "'.$rowsTotal.'",
						"total_page" : "'.$totalpage.'",						
						"lure_type": '.json_encode($rowsType).',
						"sqllures":'.json_encode($sqllures).'			
					}
				}';
		}
		print_r($output2);

?>