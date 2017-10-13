<?php
	$id = htmlspecialchars($_POST['id']);
	setcookie("basket[".$id."][quantity]", "",  time() - 100000);
	setcookie("basket[".$id."][delivery]", "",  time() - 100000);
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