<?
	session_start();

    $key=array_search($_GET['delID'],$_SESSION['itemcartID_lures']);

    if($key!==false)
    unset($_SESSION['itemcartID_lures'][$key]);
    $_SESSION["itemcartID_lures"] = array_values($_SESSION["itemcartID_lures"]);

	$url =  $location."/Fishing_Equipment_Store/viewCart.php";
	
	if (!empty($_GET['page'])) {
		$url .= "?page=".$_GET['page'];
	}
	if (empty($_SESSION["itemcartID_lures"])){
		$_SESSION["sumPrice"] =0;
	}
	header("Location: " . "http://" . $_SERVER['HTTP_HOST'].$url);
?>