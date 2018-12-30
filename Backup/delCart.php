<?	
	require("conf/config_Session.php");
	if($_GET['fn'] =="lures"){
		$key=array_search($_GET['delID'],$_SESSION['itemcartID_lures']);
		if($key!==false)
		unset($_SESSION['itemcartID_lures'][$key]);
		$_SESSION["itemcartID_lures"] = array_values($_SESSION["itemcartID_lures"]);
		$url =  $location."/Fishing_Equipment_Store/lures.php";
		
		if (!empty($_GET['page'])) {
			$url .= "?page=".$_GET['page'];
		}
		if (empty($_SESSION["itemcartID_lures"])){
			$_SESSION["sumPrice"] =0;
		}
	}
	
		if($_GET['fn'] =="line"){
		$key=array_search($_GET['delID'],$_SESSION['itemcartID_line']);
		if($key!==false)
		unset($_SESSION['itemcartID_line'][$key]);
		$_SESSION["itemcartID_line"] = array_values($_SESSION["itemcartID_line"]);
		$url =  $location."/Fishing_Equipment_Store/lures.php";
		
		if (!empty($_GET['page'])) {
			$url .= "?page=".$_GET['page'];
		}
		if (empty($_SESSION["itemcartID_line"])){
			$_SESSION["sumPrice"] =0;
		}
	}
	
	
	
		if($_GET['fn'] =="Reels"){
		$key=array_search($_GET['delID'],$_SESSION['itemcartID_Reels']);
		if($key!==false)
		unset($_SESSION['itemcartID_Reels'][$key]);
		$_SESSION["itemcartID_Reels"] = array_values($_SESSION["itemcartID_Reels"]);
		$url =  $location."/Fishing_Equipment_Store/lures.php";
		
		if (!empty($_GET['page'])) {
			$url .= "?page=".$_GET['page'];
		}
		if (empty($_SESSION["itemcartID_Reels"])){
			$_SESSION["sumPrice"] =0;
		}
	}
	
	
	
		if($_GET['fn'] =="rod"){
		$key=array_search($_GET['delID'],$_SESSION['itemcartID_rod']);
		if($key!==false)
		unset($_SESSION['itemcartID_rod'][$key]);
		$_SESSION["itemcartID_rod"] = array_values($_SESSION["itemcartID_rod"]);
		$url =  $location."/Fishing_Equipment_Store/lures.php";
		
		if (!empty($_GET['page'])) {
			$url .= "?page=".$_GET['page'];
		}
		if (empty($_SESSION["itemcartID_rod"])){
			$_SESSION["sumPrice"] =0;
		}
	}
	
	
	header("Location: " . "http://" . $_SERVER['HTTP_HOST'].$url);
?>