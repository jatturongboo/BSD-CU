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
		$sqllures = "SELECT * FROM rods ";
		$sqllures .= "where 1=1 ";
/* 		if (!empty($_GET['session_rods_type'])) {
			$arr = explode("|",$_GET['session_rods_type']);
			$sqlluresWhere = " AND Type in ( ";			
			foreach( $arr as $key3 => $value3){
				if (!empty($value3))
				$sqlluresWhere .= "'".$value3."',";
			}
			$sqlluresWhere .= "'-99' ) ";
		} */
		
		if (!empty($_GET['exp'])) {			
			$sqlluresWhere = " AND Type = '".$_GET['exp']."'";
		}

		$sqllures .= $sqlluresWhere;
		$sqllures .= $sqlfishfilter;
		$sqllures .= " limit ". $start.",".$end;
		//echo $sqllures;
		$result = $Connect->query($sqllures);
		while ($rowlures = $result->fetch_assoc()) {
		$rowluress[] = $rowlures;
		}
	   
		$sqlluresTotal = "SELECT count(rod_id) as total FROM rods where 1=1 ". $sqlluresWhere ." ".$sqlfishfilter;
		$resultTotal = $Connect->query($sqlluresTotal);
		while ($rowTotal = $resultTotal->fetch_assoc()) {
			$rowsTotal = $rowTotal["total"];
		}
		$totalpage =  ceil($rowsTotal / $pageNumber);
		$sqlluresType = "SELECT * FROM rod_type ";

		$resultType = $Connect->query($sqlluresType);
		while ($rowType = $resultType->fetch_assoc()) {
				$rowsType1[] = $rowType;
		}
		if (!empty($rowluress)) {
			$output2= '{
				"result": {				
						"total_size" : "'.$rowsTotal.'",
						"total_page" : "'.$totalpage.'",
						"items": '.json_encode($rowluress).',
						"rod_type": '.json_encode($rowsType1).'
						
					}
				}';
		}
		else {
			$output2= '{
				"result": {				
						"total_size" : "'.$rowsTotal.'",
						"total_page" : "'.$totalpage.'",						
						"rod_type": '.json_encode($rowsType1).'	
					}
				}';
		}
		print_r($output2);

?>