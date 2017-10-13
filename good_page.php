<?php
	ini_set('display_errors','Off');
	include 'GLOBAL_INCLUDE.php';
	include $filepath.'include/in_links.php';
	$goods = unserialize(file_get_contents($filepath.'txt/goods.txt'));
	$show_goods = null;
	$name = 'Страница товара';
	if ($goods != null)
	{
		$key = htmlspecialchars($_POST['key']);
		$id = $goods[$key]['id'];
		$article = $goods[$key]['article'];
		$name = $goods[$key]['name'];
		$descr = $goods[$key]['descr'];
		$weight = $goods[$key]['weight'];
		$price = $goods[$key]['price'];
		$delivery = $goods[$key]['delivery'];
		if ($delivery == null)
			$delivery = 'нет';
		$pic = $goods[$key]['pic'];
		$show_goods = <<<EOD
			<table border = "0" align = "center" width = "900">
				<tr>
					<td align = "left" valign = "top" width = "200">
						<img src = "$pic" width = "200">
					</td>
					<td width = "20">
					</td>
					<td align = "left" valign = "top">	
						Тип: $article
						<br>
						<div>
							Название: $name
						</div>
						Вес: $weight
						<br>
						Цена: $price
						<br>
						Доставка: $delivery
					</td>
					<td align = "right" valign = "top">
						<form enctype = "multipart/form-data" name = "form1" method = "POST" action = "add_basket.php">
							<input type = "hidden" name = "id" value = "$id">
							<input type = "submit" value = "Добавить в корзину">
						</form>
					</td>
				</tr>
				<tr>
					<td align = "left">
						Описание:
						<br>
						<div>
							$descr
						</div>
					</td>
				</tr>
			</table>	
EOD;
	}
	echo
<<<EOD
	<html>
		<head>
		<meta charset="utf-8">
		<link href="include/style.css" rel="stylesheet" type="text/css"/> 
			<title>
				$name
			</title>
		</head>
		<body>
			$in_links
			<br>
			$show_goods
		</body>
	</html>
EOD;
?>