<?
session_start();
//session_destroy();
/* print_r($_SESSION["itemcartID_lures"]);

if (!empty($_SESSION["itemcartID_lures"])){
	print_r(array_count_values($_SESSION["itemcartID_lures"]));
} */
if (!empty($_GET['cart'])) {		
	$_SESSION["itemcartID_line"][]= $_GET['id'];
	
	$urlAddtoCart =  $location."/Fishing_Equipment_Store/lines.php";
	if (!empty($_GET['page'])) {
		$urlAddtoCart .= "?page=".$_GET['page'];
	}
	header("Location: " . "http://" . $_SERVER['HTTP_HOST'].$urlAddtoCart);
}

?>