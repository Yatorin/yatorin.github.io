<?php
	$id = htmlspecialchars($_POST['id']);
	$quantity = htmlspecialchars($_POST['quantity']);
	$delivery = null;
	$delivery = htmlspecialchars($_POST['delivery']);
	if ($delivery == 'нет')
		$delivery = null;
	$quantity = (int) $quantity;
	if ($quantity >= 1)
		setcookie("basket[".$id."][quantity]", $quantity);
	setcookie("basket[".$id."][delivery]", $delivery);
	header('Location: basket.php');
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