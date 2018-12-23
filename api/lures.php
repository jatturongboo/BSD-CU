<?
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: GET,POST");
	header("Access-Control-Allow-Credentials: true");
	header('Content-Type: application/json;charset=utf-8');
	session_start();
	require("../conf/config_mysqli.php");
	mysqli_set_charset($Connect,"utf8");
	$pageNumber = 6;
		$start = 0;
		$end = $pageNumber;
		if (!empty($_GET['page'])) {
			  $start = ($_GET['page'] - 1) * $pageNumber ; 
			  $end = $pageNumber;
		}
		$sql = "SELECT * FROM lures ";
		$sql .= "where qty > 0 ";
		$sql .= "limit ". $start.",".$end;

		$result = $Connect->query($sql);
		while ($row = $result->fetch_assoc()) {
		$rows[] = $row;
		}
	   
		$sqlTotal = "SELECT count(lure_id) as total FROM lures where qty > 0 ";
		$resultTotal = $Connect->query($sqlTotal);
		while ($rowTotal = $resultTotal->fetch_assoc()) {
		$rowsTotal = $rowTotal["total"];
		}
		$totalpage =  ceil($rowsTotal / $pageNumber);
		
		
		$sqlType = "SELECT * FROM lure_type ";

		$resultType = $Connect->query($sqlType);
		while ($rowType = $resultType->fetch_assoc()) {
		$rowsType[] = $rowType;
		}
		
		
		$output= '{
		"result": {				
				"total_size" : "'.$rowsTotal.'",
				"total_page" : "'.$totalpage.'",
				"items": '.json_encode($rows).',
				"lure_type": '.json_encode($rowsType).'
			}
		}';

	print_r($output);

?>