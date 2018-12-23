<?php
$host = "localhost";
$user = "";
$pass = "";
$objConnect = mysql_connect($host,$user,$pass) or die(mysql_error());
mysql_select_db("fishing_equipment_store") or die(mysql_error());
?>
