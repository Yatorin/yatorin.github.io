<?php
	include 'GLOBAL_INCLUDE.php';
	ini_set('display_errors','Off');
	$error = <<<EOD
		<br>
		ОШИБКА!
		<br>
		<a href="edit_catalog.php">
			Назад
		</a>
EOD;
	$id = htmlspecialchars($_POST['update']);
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
			$article = $goods[$key]['article'];
			$name = $goods[$key]['name'];
			$descr = $goods[$key]['descr'];
			$weight = $goods[$key]['weight'];
			$price = $goods[$key]['price'];
			$delivery = $goods[$key]['delivery'];
			$show_default = <<<EOD
				<HTML>
					<HEAD>
					<meta charset="utf-8">
					<link href="include/style.css" rel="stylesheet" type="text/css"/> 
						<TITLE>
							Добавление товара
						</TITLE>
					</HEAD>
					<BODY>
						<form enctype = "multipart/form-data" name = "form1" method = "POST" action = "update_catalog_go.php">
							<br>
							<input type = "hidden" name = "key" value = "$key">
							Артикул
							<br>
							<input type = "text" name = "article" value = "$article">
							<br>
							Название
							<br>
							<input type = "text" name = "name" value = "$name">
							<br>
							Описание
							<br>
							<input type = "text" name = "descr" value = "$descr">
							<br>
							Вес
							<br>
							<input type = "text" name = "weight" value = "$weight">
							<br>
							Стоимость
							<br>
							<input type = "text" name = "price" value = "$price">
							<br>
							Доставка
							<br>
							<input type = "text" name = "delivery" value = "$delivery">
							<br>
							Изображение
							<br>
							<input type = "file" name = "pic">
							<br>
							<br>
							<input type = "submit" value = "Изменить">
							<br>
						</form>
						<a href="edit_catalog.php">
							Назад
						</a>
					</BODY>
				</HTML>
EOD;
		}
		else
			$show_default = $error;
	}
	else
		$show_default = $error;
	echo $show_default;
	//коммент для ютф
?>