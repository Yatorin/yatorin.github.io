<?php
	include 'GLOBAL_INCLUDE.php';
	ini_set('display_errors','Off');
	include $filepath.'include/in_links.php';
	$show_catalog_all = null;
	if ($_SESSION['admin'] != false)
		$show_catalog_all = <<<EOD
			<br>
			<a href = "edit_catalog.php">
				Редактировать каталог
			</a>
			<br>
			<br>
			<a href = "edit_orders.php">
				Перейти к заказам
			</a>
			<br>
			<br>
EOD;
	$goods = unserialize(file_get_contents($filepath.'txt/goods.txt'));
	$show_goods = null;
	if ($goods != null)
	{
		foreach($goods as $key => $value)
		{
			$article = $value['article'];
			$name = $value['name'];
			$descr = $value['descr'];
			$price = $value['price'];
			$pic = $value['pic'];
			$show_goods = $show_goods.<<<EOD
				<table width = "900">
					<tr>
						<td align = "left" valign = "top" width = "100">
							<img src = "$pic" width = "100">
						</td>
						<td align = "left" valign = "top" width = "200">
							Тип: $article
							<br>
							<div>
								Название: $name
							</div>
							Цена: $price
						</td>
						<td align = "left" valign = "top" width = "500">
							<div>
								Описание: $descr
							</div>
						</td>
						<td align = "left" valign = "top" width = "100">
							<form enctype = "multipart/form-data" name = "form1" method = "POST" action = "good_page.php">
								<input type = "hidden" name = "key" value = "$key">
								<input type = "submit" value = "Перейти к товару">
							</form>
						</td>
					</tr>
				</table>
				<br>
EOD;
		}
	}
	$show_catalog_all = $show_catalog_all.$show_goods;
	echo
<<<EOD
	<html>
		<head>
		<meta charset="utf-8">
		<link href="include/style.css" rel="stylesheet" type="text/css"/> 
			<title>
				Каталог
			</title>
		</head>
		<body>
			$in_links
			<table border = "0" align = "center" width = "900">
				<tr>
					<td align = "left">
						$show_catalog_all
					</td>
				</tr>
			</table>
		</body>
	</html>
EOD;
?>