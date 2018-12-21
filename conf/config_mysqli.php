<?php
ini_set('display_errors', 1);
error_reporting(~0);

$host = "localhost";
$user = "root";
$pass = "root1234";
$dbname = "fishing_equipment_store";
$Connect = mysqli_connect($host,$user,$pass,$dbname) or die(mysqli_error());
mysqli_set_charset($Connect,"utf8");
// mysql_select_db("thaiivnetwork") or die(mysql_error());
?>
