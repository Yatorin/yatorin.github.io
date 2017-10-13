<?php
	include 'GLOBAL_INCLUDE.php';
	session_start();
	$username = 'новый посетитель';
	if ($_COOKIE['name'] != null)
		$username = $_COOKIE['name'];
	$day_news = file_get_contents($filepath.'txt/day_new.txt');
	if ($day_news == null)
		$day_news = 'Мы всегда рады видеть вас в нашем магазине!';
	$edit_news = null;
	if ($_SESSION['admin'] != false)
		$edit_news = <<<EOD
			<br>
			<a href = "edit_news.php">
				Редактировать новости
			</a>
			<br>
EOD;
	$day_news = $day_news.$edit_news;
	$in_links = '
		<table border = "0" align = "center" width = "900" link = "blue" alink = "green" vlink = "purple">
			<tr>
		';
	$basket_mas = null;
	$basket_mas = $_COOKIE['basket'];
	$basket_num = 0;
	if ($basket_mas != null)
		foreach($basket_mas as $value => $junk)
			$basket_num++;
	$basket_show = <<<EOD
		<a href = "basket.php">
			Корзина: $basket_num
		</a>
EOD;
	if ($_SERVER['PHP_SELF'] == "/index.php" || $_SERVER['PHP_SELF'] == "index.php")
	{
		$in_links = $in_links.<<<EOD
				<td align = "center" colspan = "5">
					<img src = "images/bak_1_1.jpg" alt="gde kartinka scyka" width = "500" height = "332">
				</td>
			</tr>
			<tr>
				<td align = "center" valign = "bottom" colspan = "5">
					<a1>
						<font size = "+2">
							Здравствуйте, $username!
						</font>
					</a1>
					<br>
					<br>
					<a href = "guestbook.php">
						Гостевая книга
					</a>
					<br>
				</td>
			</tr>
			<tr>
				<td align = "right" colspan = "5">
					$basket_show
				</td>
			</tr>
			<tr>
				<td align = "center" valign = "bottom" colspan = "5">
					<a1>
						<font size = "+2">
							$day_news
						</font>
					</a1>
					<br>
				</td>
			</tr>
			<tr>
EOD;
	}
	else
	{
		$in_links = $in_links.<<<EOD
				<td align = "left" colspan = "6">
					<a1>
						Здравствуйте, $username!
					</a1>
					<br>
					<br>
					<a href = "guestbook.php">
						Гостевая книга
					</a>
					<br>
				</td>
				<td align = "right" colspan = "6">
					$basket_show
				</td>
			</tr>
			<tr>
				<td align = "center" colspan = "6">
					<a1>
						<font size = "+2">
							$day_news
						</font>
					</a1>
					<br>
				</td>
			</tr>
			<tr>
				<td align = "center">
					<a href = "index.php">
						<img src = "images/logo.png" width = "240" height = "100">
					</a>
				</td>
EOD;
	}
	$in_links = $in_links.'
				<td align = "center">
					<a href = "about.php">
						<font size = "+3">
							О нас
						</font>
					</a>
				</td>
				<td align = "center">
					<a href = "catalog.php">
						<font size = "+3">
							Каталог
						</font>
					</a>
				</td>
				<td align = "center">
					<a href = "contacts.php">
						<font size = "+3">
							Контакты
						</font>
					</a>
				</td>
			</tr>
			<tr>
				<td align = "center" colspan = "2">
					<a href = "consumer_page.php">
						Страничка потребителя
					</a>
				</td>
			</tr>
		</table>
		';
?>