<?
session_start();

if (!empty($_GET['cart'])) {
	$_SESSION["itemcart"] = $_GET['cart'];
}
?>