<?	
		require("conf/config_Session.php");
		if($_GET['fn'] =="lures"){
		
		do {
				$key=array_search($_GET['delID'],$_SESSION['itemcartID_lures']);
				
				if($key!==false){
					unset($_SESSION['itemcartID_lures'][$key]);
				}else{
					$key = "-1";
				}
			}while($key !=="-1");
			
			$_SESSION["itemcartID_lures"] = array_values($_SESSION["itemcartID_lures"]);
			
			if (!empty($_GET['page'])) {
				$url .= "?page=".$_GET['page'];
			}
			if (empty($_SESSION["itemcartID_lures"])){
				$_SESSION["sumPrice"] =0;
			}
		}
	
	///// line ///
		if($_GET['fn'] =="line"){
			
			do {
				$key=array_search($_GET['delID'],$_SESSION['itemcartID_line']);
				if($key!==false){
					unset($_SESSION['itemcartID_line'][$key]);
				}else{
					$key = "-1";
				}
			}while($key !=="-1");
			
			$_SESSION["itemcartID_line"] = array_values($_SESSION["itemcartID_line"]);
			
			if (!empty($_GET['page'])) {
				$url .= "?page=".$_GET['page'];
			}
			if (empty($_SESSION["itemcartID_line"])){
				$_SESSION["sumPrice"] =0;
			}
		}
	
	
	
		if($_GET['fn'] =="Reels"){
			do {
				$key=array_search($_GET['delID'],$_SESSION['itemcartID_Reels']);
				if($key!==false){
					unset($_SESSION['itemcartID_Reels'][$key]);
				}else{
					$key = "-1";
				}
			}while($key !=="-1");
			$_SESSION["itemcartID_Reels"] = array_values($_SESSION["itemcartID_Reels"]);

			
			if (!empty($_GET['page'])) {
				$url .= "?page=".$_GET['page'];
			}
			if (empty($_SESSION["itemcartID_Reels"])){
				$_SESSION["sumPrice"] =0;
			}
		}
	
	
	
		if($_GET['fn'] =="rod"){
			do {
				$key=array_search($_GET['delID'],$_SESSION['itemcartID_rod']);
				if($key!==false){
					unset($_SESSION['itemcartID_rod'][$key]);
				}else{
					$key = "-1";
				}
			}while($key !=="-1");
			
			$_SESSION["itemcartID_rod"] = array_values($_SESSION["itemcartID_rod"]);
			
			
			if (!empty($_GET['page'])) {
				$url .= "?page=".$_GET['page'];
			}
			if (empty($_SESSION["itemcartID_rod"])){
				$_SESSION["sumPrice"] =0;
			}
		}
	
	$url =  $location."/Fishing_Equipment_Store/viewCart.php";
	header("Location: " . "http://" . $_SERVER['HTTP_HOST'].$url);
?>