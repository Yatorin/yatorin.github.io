<?php
	ini_set('display_errors','Off');
	include 'GLOBAL_INCLUDE.php';
	include $filepath.'include/in_links.php';
	echo
<<<EOD
	<html>
		<head>
		<meta charset="utf-8">
		<link href="include/style.css" rel="stylesheet" type="text/css"/> 
			<title>
				Контакты
			</title>
		</head>
		<body>
			$in_links
			<table border = "0" align = "center" width = "900">
				<tr>
					<td height = "20">
					</td>
				</td>
				<tr>
					<td align = "left" valign = "bottom" width = "33%">
						<h2>
							Наши телефоны:
						</h2>
					</td>
					<td align = "center" valign = "bottom" width = "67%">
						<h2>
							Наши адреса:
						</h2>
					</td>
				</tr>
				<tr>
					<td align = "left" valign = "top" width = "33%">
						<table border = "0">
							<tr>
								<td>
									Старший менеджер:
								</td>
								<td>
									8-999-123-45-67
								</td>
							</tr>
							<tr>
								<td>
									Продавец-консультант:
								</td>
								<td>
									8-999-765-43-21
								</td>
							</tr>
						</table>
					</td>
					<td align = "center" valign = "top" width = "67%">
						<table border = "0">
								<tr>
									<td>
										Электронный:
									</td>
									<td>
										<address>
											blabla@la.ru
										</address>
									</td>
								</tr>
								<tr>
									<td>
										Физический:
									</td>
									<td>
										г. Что-то, ул. Где-то 1
									</td>
								</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align = "center" colspan = "2">
						<br>
						<h2>
							Найти нас на карте:
						</h2>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2221.5747645382316!2d82.90330689201231!3d55.03144297201361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3a65edab34dbfff0!2z0KTQu9Cw0LPQvNCw0L0!5e0!3m2!1sru!2sru!4v1507683146627" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</td>
				</tr>
			</table>
		</body>
	</html>
EOD;
?>