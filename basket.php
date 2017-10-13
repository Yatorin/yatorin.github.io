<?php
	include 'GLOBAL_INCLUDE.php';
	include $filepath.'include/in_links.php';
	$summ = 0;
	$basket = $_COOKIE['basket'];
	$goods = unserialize(file_get_contents($filepath.'txt/goods.txt'));
	$show_goods = null;
	$checkout = null;
	if ($basket != null && $goods != null)
	{
		foreach($basket as $id => $quantity_tmp)
		{
			foreach($goods as $value)
			{
				if ($value['id'] == $id)
				{
					$delivery_fact_show = null;
					$delivery_text = 'Изменить количество';
					$article = $value['article'];
					$name = $value['name'];
					$descr = $value['descr'];
					$price = $value['price'];
					$pic = $value['pic'];
					$quantity = $basket[$id]['quantity'];
					$delivery = $value['delivery'];
					if ($delivery == null)
						$delivery = 'нет';
					else
						$delivery = 'да';
					$delivery_fact = $basket[$id]['delivery'];
					if ($delivery_fact == null)
						$delivery_fact = 'нет';
					else
						$delivery_fact = 'да';
					$summ = $summ + ($price * $quantity);
					if ($delivery != 'нет')
					{
						$delivery_fact_show = <<<EOD
							Доставить?
							<input type = "checkbox" name = "delivery_fact">
							<br>
EOD;
						$delivery_text = 'Изменить количество';
					}
					$show_goods = $show_goods.<<<EOD
					<table align = "center" width = "900">
						<tr>
							<td align = "left" valign = "top" width = "100">
								<img src = "$pic" width = "100">
							</td>
							<td align = "left" valign = "top" width = "200">
								Тип: $article
								<br>
								Название: $name
								<br>
								Цена: $price
								<br>
								Количество: $quantity
								<br>
								Возможность доставки: $delivery
								<br>
								Доставить: $delivery
							</td>
							<td align = "left" valign = "top">
								Описание: $descr
							</td>
							<td align = "right" valign = "top">
								<form enctype = "multipart/form-data" name = "form0" method = "POST" action = "edit_quantity.php">
									$delivery_fact_show
									<input type = "text" name = "quantity" value = "$quantity">
									<input type = "hidden" name = "id" value = "$id">
									<br>
									<input type = "submit" value = "$delivery_text">
								</form>
							</td>
							<td align = "right" valign = "top">
								<form enctype = "multipart/form-data" name = "form1" method = "POST" action = "delete_basket.php">
									<input type = "hidden" name = "id" value = "$id">
									<input type = "submit" value = "Убрать">
								</form>
							</td>
						</tr>
					</table>
					<br>
EOD;
				}
			}
		}
		$checkout = <<<EOD
		<form enctype = "multipart/form-data" name = "form0" method = "POST" action = "checkout.php">
			<input type = "submit" value = "Оформить заказ">
		</form>
EOD;
	}
	echo
<<<EOD
	<html>
		<head>
		<meta charset="utf-8">
		<link href="include/style.css" rel="stylesheet" type="text/css"/> 
			<title>
				Корзина
			</title>
		</head>
		<body>
			$in_links
			<br>
			<table align = "center" width = "900">
				<tr>
					<td align = "center" valign = "top">
						Общая стоимость: $summ
						<br>
						$checkout
						<br>
						<br>
						$show_goods
					</td>
				</tr>
			</table>
		</body>
	</html>
EOD;
?>