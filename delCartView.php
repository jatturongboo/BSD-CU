<?
	session_start();

    $key=array_search($_GET['delID'],$_SESSION['itemcartID']);

    if($key!==false)
    unset($_SESSION['itemcartID'][$key]);
    $_SESSION["itemcartID"] = array_values($_SESSION["itemcartID"]);

	$url =  $location."/Fishing_Equipment_Store/viewCart.php";
	
	if (!empty($_GET['page'])) {
		$url .= "?page=".$_GET['page'];
	}
	if (empty($_SESSION["itemcartID"])){
		$_SESSION["sumPrice"] =0;
	}
	header("Location: " . "http://" . $_SERVER['HTTP_HOST'].$url);
?>