<?php
	include 'GLOBAL_INCLUDE.php';
	$key = htmlspecialchars($_POST['key']);
	$data = null;
	$article = htmlspecialchars($_POST['article']);
	$name = htmlspecialchars($_POST['name']);
	$descr = htmlspecialchars($_POST['descr']);
	$weight = htmlspecialchars($_POST['weight']);
	$price = htmlspecialchars($_POST['price']);
	$delivery = htmlspecialchars($_POST['delivery']);
	if ($delivery == 'нет' || $delivery == '')
		$delivery = null;
	$file = $_FILES['pic'];
	$path = $filepath.<<<EOD
goods/
EOD;
	$path = $path.$file['name'];
	move_uploaded_file ($file['tmp_name'], $path);
	$pic = $path;
	$goods = unserialize(file_get_contents($filepath.'txt/goods.txt'));
	$goods[$key]['article'] = $article;
	$goods[$key]['name'] = $name;
	$goods[$key]['descr'] = $descr;
	$goods[$key]['weight'] = $weight;
	$goods[$key]['price'] = $price;
	$goods[$key]['delivery'] = $delivery;
	$goods[$key]['pic'] = $pic;
	file_put_contents($filepath.'txt/goods.txt', serialize($goods));
	header('Location: edit_catalog.php');
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