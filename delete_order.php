<?php
	include 'GLOBAL_INCLUDE.php';
	$id_order = htmlspecialchars($_POST['delete']);
	$orders = unserialize(file_get_contents($filepath.'txt/orders.txt'));
	unset($orders[$id_order]);
	file_put_contents($filepath.'txt/orders.txt', serialize($orders));
	header('Location: edit_orders.php');
	echo
<<<EOD
	<html>
		<head>
		<meta charset="utf-8">
		<link href="include/style.css" rel="stylesheet" type="text/css"/> 
		</head>
	</html>
EOD;
?>