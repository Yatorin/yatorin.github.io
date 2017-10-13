<?php
	include 'GLOBAL_INCLUDE.php';
	$error = <<<EOD
		<br>
		ОШИБКА!
		<br>
		<a href = "edit_catalog.php">
			Назад
		</a>
EOD;
	$id = htmlspecialchars($_POST['delete']);
	$show_default = null;
	$goods = unserialize(file_get_contents($filepath.'txt/goods.txt'));
	if ($goods != null)
	{
		$key = null;
		foreach($goods as $key_tmp => $value)
			if ($value['id'] == $id)
				$key = $key_tmp;
		if ($key !== null)
		{	
			unset($goods[$key]);
			file_put_contents($filepath.'txt/goods.txt', serialize($goods));
			header('Location: edit_catalog.php');
		}	
		else
			$show_default = $error;
	}
	else
		$show_default = $error;
	echo $show_default;
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