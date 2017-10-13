<?php
	include 'GLOBAL_INCLUDE.php';
	include $filepath.'include/in_links.php';
	$cookie_name = null;
	if (isset($_COOKIE['name']))
		$cookie_name = $_COOKIE['name'];
	
	$show_all = <<<EOD
	<html>
		<head>
		<meta charset="utf-8">
			<link href="include/style.css" rel="stylesheet" type="text/css"/> 
			<title>
				RockSHOP
			</title>
		</head>
		<body>
		
			<h1 align = "center">
				Интернет-магазин рок атрибутики
				<br>
				<img src = "images/log.jpg" alt="img" >
				<br>
				RockSHOP
			</h1>
				$in_links
EOD;
	if ($cookie_name == null)
		$show_all = $show_all.<<<EOD
				<table border = "0" align = "center" width = "900">
					<tr>
						<td height = "15">
						</td>
					</tr>
					<tr>
						<td align = "center" width = "50%">
							<a href = "register.php">
								<font size = "+3">
									Регистрация
								</font>
							</a>
						</td>
						<td align = "center" width = "50%">
							<a href = "enter.php">
								<font size = "+3">
									Вход
								</font>
							</a>
						</td>
					</tr>
				</table>
EOD;
	else
		$show_all = $show_all.<<<EOD
				<table border = "0" align = "center" width = "900">
					<tr>
						<td height = "15">
						</td>
					</tr>
					<tr>
						<td align = "center">
							<a href = "logout.php">
								<font size = "+3">
									Выход
								</font>
							</a>
						</td>
					</tr>
				</table>
EOD;
	$full_visitors = file_get_contents($filepath.'txt/number_all_visits.txt') + 1;
	file_put_contents($filepath.'txt/number_all_visits.txt', $full_visitors);
	$registred_users = 0;
	$mas = unserialize(file_get_contents($filepath.'txt/user_log_data.txt'));
	foreach($mas as $cell)
		$registred_users++;
	$banner_show = null;
	if ($_SESSION['admin'] != false)
		$banner_show = <<<EOD
			<br>
			<a href = "edit_banner.php">
				Редактировать баннер
			</a>
			<br>
EOD;
	$banner_data = unserialize(file_get_contents($filepath.'txt/banner_data.txt'));
	$banner_link = $banner_data['banner_link'];
	$banner_picture = $banner_data['banner_picture'];
	if ($banner_data != null)
		$banner_show = $banner_show.<<<EOD
			<a href = "$banner_link">
				<img src = "$banner_picture" width = "400">
			</a>
EOD;
	$show_all = $show_all.<<<EOD
			<table border = "0" align = "center" width = "900">
				<tr>
					<td align = "center">
						$banner_show
					</td>
				</tr>
			</table>
			<footer>
				<table border = "0" align = "center" width = "900">
					<tr>
						<td align = "left" valign = "bottom" width = "50%">
							All rights reserved. 2017
						</td>
						<td align = "right" width = "50%">
							Число визитов страницы: $full_visitors
							<br>
							Число зарегистрированных пользователей: $registred_users
						</td>
					</tr>
				</table>
			</footer>
		</body>
	</html>
EOD;
	echo $show_all;
?>