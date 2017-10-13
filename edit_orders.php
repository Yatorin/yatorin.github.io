<?php
	include 'GLOBAL_INCLUDE.php';
	session_start();
	if ($_SESSION['admin'] != false)
	{
		$orders = unserialize(file_get_contents($filepath.'txt/orders.txt'));
		$show_orders = null;
		if ($orders != null)
		{
			$goods_data = unserialize(file_get_contents($filepath.'txt/goods.txt'));
			foreach($orders as $id_order => $value)
			{
				$username = $orders[$id_order]['name'];
				$order_date = $orders[$id_order]['date'];
				$address = $orders[$id_order]['address'];
				$show_orders = $show_orders.<<<EOD
					<table border = "1" align = "center" width = "900">
						<tr>
							<td align = "left" valign = "top" width = "200">
								<br>
								Заказ номер $id_order
								<br>
								<p>
									Заказчик: $username
								</p>
								Дата: $order_date
								<br>
								<p>
									Адрес: $address
								</p>
							</td>
							<td align = "left" valign = "top" width = "600">
								<br>
								<b>
									Состав заказа:
								</b>
EOD;
				$goods = $orders[$id_order]['goods'];
				foreach($goods as $id_good => $value_tmp)
				{
					$quantity = $goods[$id_good]['quantity'];
					$delivery = $goods[$id_good]['delivery'];
					if ($delivery == null)
						$delivery = 'нет';
					$price = null;
					$goods_name = null;
					$weight = null;
					$article = null;
					foreach($goods_data as $key => $goods_data_value)
						if ($goods_data[$key]['id'] == $id_good)
						{
							$price = $goods_data[$key]['price'];
							$goods_name = $goods_data[$key]['name'];
							$weight = $goods_data[$key]['weight'];
							$article = $goods_data[$key]['article'];
						}
					$show_orders = $show_orders.<<<EOD
						<br>
						ID товара: $id_good
						<br>
						Артикул: $article
						<br>
						<div>
							Наименование: $goods_name
						</div>
						Стоимость за 1 ед.: $price
						<br>
						Количество: $quantity
						<br>
						Вес 1 ед.: $weight
						<br>
						Доставить: $delivery
						<br>
EOD;
				}
				$show_orders = $show_orders.<<<EOD
					</td>
					<td align = "left" valign = "top" width = "100">
						<form enctype = "multipart/form-data" name = "form1" method = "POST" action = "delete_order.php">
							<br>
							<input type = "hidden" name = "delete" value = "$id_order">
							<input type = "submit" value = "Удалить заказ">
						</form>
					</td>
				</tr>
EOD;
			}
			$show_orders = $show_orders.'</table>';
		}
		if ($show_orders == null)
			$show_orders = 'Заказов нет';
		echo <<<EOD
			<HTML>
				<HEAD>
				<meta charset="utf-8">
				<link href="include/style.css" rel="stylesheet" type="text/css"/> 
					<TITLE>
						Редактирование заказов
					</TITLE>
				</HEAD>
				<BODY>
					<table border = "0" align = "center" width = "900">
						<tr>
							<td align = "left" valign = "top">
								<a href = "catalog.php">
									Назад
								</a>
							</td>
						</tr>
						<tr>
							<td align = "center" valign = "top">
								$show_orders
							</td>
						</tr>
					</table>
				</BODY>
			</HTML>
EOD;
	}
	else
		echo 'ERROR';
?>