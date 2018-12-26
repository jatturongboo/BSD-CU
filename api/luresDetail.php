<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json;charset=utf-8');

	
	require("../conf/config_mysqli.php");
	mysqli_set_charset($Connect,"utf8");
  
		$sql = "SELECT * FROM lures ";
		$sql .= "where lure_id = '".$_GET['id']."'";

		$result = $Connect->query($sql);
		while ($row = $result->fetch_assoc()) {
		$rows[] = $row;
		}
	   
		$sqlTotal = "SELECT count(lure_id) as total FROM lures ";
		$resultTotal = $Connect->query($sqlTotal);
		while ($rowTotal = $resultTotal->fetch_assoc()) {
		$rowsTotal = $rowTotal["total"];
		}
		
		$output= '{
		"result": {
				"items": '.json_encode($rows).'
			}
		}';

	print_r($output);


?>