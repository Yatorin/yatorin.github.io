<?php
	include 'GLOBAL_INCLUDE.php';
	$banner_data = null;
	$banner_data['banner_link'] = htmlspecialchars($_POST['banner_link']);
	$banner_data['banner_picture'] = htmlspecialchars($_POST['banner_picture']);
	file_put_contents($filepath.'txt/banner_data.txt', serialize($banner_data));
	header('Location: edit_banner.php');
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