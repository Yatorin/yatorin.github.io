<?php
	include 'GLOBAL_INCLUDE.php';
	$data = null;
	$data['id'] = htmlspecialchars($_POST['id']);
	$data['article'] = htmlspecialchars($_POST['article']);
	$data['name'] = htmlspecialchars($_POST['name']);
	$data['descr'] = htmlspecialchars($_POST['descr']);
	$data['weight'] = htmlspecialchars($_POST['weight']);
	$data['price'] = htmlspecialchars($_POST['price']);
	$data['delivery'] = htmlspecialchars($_POST['delivery']);
	if ($data['delivery'] == 'нет' || $data['delivery'] == '')
		$data['delivery'] = null;
	$file = $_FILES['pic'];
	$path = $filepath.<<<EOD
goods/
EOD;
	$path = $path.$file['name'];
	move_uploaded_file ($file['tmp_name'], $path);
	$data['pic'] = $path;
	$goods = unserialize(file_get_contents($filepath.'txt/goods.txt'));
	$unique_id = true;
	if ($goods != null)
		foreach($goods as $value)
			if ($data['id'] == $value['id'])
				$unique_id = false;
	if ($unique_id && $data['id'] != null)
	{
		$goods[] = $data;
		file_put_contents($filepath.'txt/goods.txt', serialize($goods));
		header('Location: edit_catalog.php');
	}
	else
	{
		echo <<<EOD
		<br>
		ОШИБКА! НЕ ДОЛЖНО БЫТЬ ПОВТОРЯЮЩИХСЯ ID ИЛИ ID НЕ МОЖЕТ БЫТЬ NULL!
		<br>
		<a href = "edit_catalog.php">
			Назад
		</a>
EOD;
	}
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