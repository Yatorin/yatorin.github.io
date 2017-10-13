<?php
	session_start();
	session_destroy();
	setcookie('name', "",  time() - 100000);
	header('Location: index.php');
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