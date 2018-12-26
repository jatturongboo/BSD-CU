<?
session_start();
//session_destroy();
/* print_r($_SESSION["itemcartID"]);

if (!empty($_SESSION["itemcartID"])){
	print_r(array_count_values($_SESSION["itemcartID"]));
} */
if (!empty($_GET['cart'])) {		
	$_SESSION["itemcartID"][]= $_GET['id'];
	
	$urlAddtoCart =  $location."/Fishing_Equipment_Store/lures.php";
	if (!empty($_GET['page'])) {
		$urlAddtoCart .= "?page=".$_GET['page'];
	}
	header("Location: " . "http://" . $_SERVER['HTTP_HOST'].$urlAddtoCart);
}

?>