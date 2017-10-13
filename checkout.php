<?php
	ini_set('display_errors','Off');
	include 'GLOBAL_INCLUDE.php';
	$show_html = null;
	$name = null;
	if (isset($_COOKIE['name']))
		$name = $_COOKIE['name'];
	else if (isset($_POST['name']))
		$name = htmlspecialchars($_POST['name']);
	else
		$show_html = <<<EOD
			<b>
				Вы должны указать Ваше имя:
			</b>
			<br>
			<input type = "text" name = "name">
			<br>
EOD;
	$address = null;
	if (isset($_POST['address']))
		$address = htmlspecialchars($_POST['address']);
	else
		$show_html = $show_html.<<<EOD
			<b>
				Вы должны указать Ваш адрес:
			</b>
			<br>
			<input type = "text" name = "address">
			<br>
			<input type = "submit" value = "Отправить">
EOD;
	if ($address != null && $address != '' && $name != null && $name != '')
	{
		$basket_mas = $_COOKIE['basket'];
		foreach($basket_mas as $id => $value)
		{
			setcookie("basket[".$id."][quantity]", "",  time() - 100000);
			setcookie("basket[".$id."][delivery]", "",  time() - 100000);
		}
		$orders = unserialize(file_get_contents($filepath.'txt/orders.txt'));
		$id_order = 1;
		if ($orders != null)
			foreach($orders as $temp)
				$id_order++;
		$orders[$id_order]['name'] = $name;
		$orders[$id_order]['date'] = date("m.d.y");
		$orders[$id_order]['goods'] = $basket_mas;
		$orders[$id_order]['address'] = $address;
		file_put_contents($filepath.'txt/orders.txt', serialize($orders));
		header('Location: catalog.php');
	}
	else
		$show_html = <<<EOD
	<html>
		<head>
		<meta charset="utf-8">
		<link href="include/style.css" rel="stylesheet" type="text/css"/> 
			<title>
				Оформление заказа
			</title>
		</head>
		<body>
			<table border = "0" align = "center" width = "900">
				<tr>
						<td height = "50">
						</td>
				</tr>
				<tr>
					<td align = "center">
						<form enctype = "multipart/form-data" name = "form1" method = "POST" action = "checkout.php">
							$show_html
						</form>
						<a href = "basket.php">
							Назад
						</a>
					</td>
				</tr>
			</table>
		</body>
	</html>
EOD;
	echo $show_html;
?>