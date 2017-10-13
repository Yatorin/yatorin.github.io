<?php
	ini_set('display_errors','Off');
	include 'GLOBAL_INCLUDE.php';
	session_start();
	if ($_SESSION['admin'] != false)
	{
		$goods = unserialize(file_get_contents($filepath.'txt/goods.txt'));
		$show_goods = null;
		if ($goods != null)
		{
			foreach($goods as $value)
			{
				$id = $value['id'];
				$article = $value['article'];
				$name = $value['name'];
				$descr = $value['descr'];
				$weight = $value['weight'];
				$price = $value['price'];
				$delivery = $value['delivery'];
				if ($delivery == null)
					$delivery = 'нет';
				$pic = $value['pic'];
				$show_goods = $show_goods.<<<EOD
					<br>
					id: $id
					<br>
					Артикул: $article
					<br>
					Название: $name
					<br>
					Описание: $descr
					<br>
					Вес: $weight
					<br>
					Цена: $price
					<br>
					Доставка: $delivery
					<br>
					Изображение:
					<br>
					<img src = "$pic" width = "100">
					<br>
EOD;
			}
		}
		
		$show_html = <<<EOD
		<HTML>
			<HEAD>
			<meta charset="utf-8">
			<link href="include/style.css" rel="stylesheet" type="text/css"/> 
				<TITLE>
					Редактирование товаров
				</TITLE>
			</HEAD>
			<BODY>
				<table border = "0" align = "center" width = "900">
					<tr>
						<td align = "left" valign = "top" width = "50%">
							<b>
								Товары:
							</b>
							<br>
							$show_goods
						</td>
						<td align = "left" valign = "top" width = "50%">
							<b>
								Редактирование товаров:
							</b>
							<form enctype = "multipart/form-data" name = "form1" method = "POST" action = "add_catalog.php">
								<br>
								ДОБАВИТЬ
								<br>
								id
								<br>
								<input type = "text" name = "id">
								<br>
								Артикул
								<br>
								<input type = "text" name = "article">
								<br>
								Название
								<br>
								<input type = "text" name = "name">
								<br>
								Описание
								<br>
								<input type = "text" name = "descr">
								<br>
								Вес
								<br>
								<input type = "text" name = "weight">
								<br>
								Стоимость
								<br>
								<input type = "text" name = "price">
								<br>
								Доставка
								<br>
								<input type = "text" name = "delivery">
								<br>
								Изображение
								<br>
								<input type = "file" name = "pic">
								<br>
								<br>
								<input type = "submit" value = "Добавить">
								<br>
							</form>
							<form enctype = "multipart/form-data" name = "form2" method = "POST" action = "update_catalog.php">
								<br>
								ИЗМЕНИТЬ
								<br>
								id
								<br>
								<input type = "text" name = "update">
								<br>
								<input type = "submit" value = "Изменить">
							</form>
							<form enctype = "multipart/form-data" name = "form3" method = "POST" action = "delete_catalog.php">
								<br>
								УДАЛИТЬ
								<br>
								id
								<br>
								<input type = "text" name = "delete">
								<br>
								<input type = "submit" value = "Удалить">
							</form>
							<a href="catalog.php">
								Назад
							</a>
						</td>
					</tr>
				</table>
			</BODY>
		</HTML>
EOD;
		echo $show_html;
	}
	else
		echo 'ERROR';
?>