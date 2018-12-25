<?
session_start();
//session_destroy();
/* print_r($_SESSION["itemcartID"]);

if (!empty($_SESSION["itemcartID"])){
	print_r(array_count_values($_SESSION["itemcartID"]));
} */

if (!empty($_GET['cart'])) {
	$_SESSION["itemcart"] += 1;
	
	$_SESSION["itemcartID"][]= $_GET['id'];
	
	$url =  $location."/Fishing_Equipment_Store/lures.php";
	if (!empty($_GET['page'])) {
		$url .= "?page=".$_GET['page'];
	}
	header("Location: " . "http://" . $_SERVER['HTTP_HOST'].$url);
}
?>