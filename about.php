<?php
	include 'GLOBAL_INCLUDE.php';
	include $filepath.'include/in_links.php';
	$edit_news = null;
	if ($_SESSION['admin'] != false)
		$edit_news = <<<EOD
			<a href = "edit_newsfeed.php">
				Редактировать новостную ленту
			</a>
			<br>
EOD;
	$newsfeed_all = $edit_news.'<br>';
	$newsfeed_txt = file($filepath.'txt/newsfeed.txt');
	foreach($newsfeed_txt as $value)
		$newsfeed_all = $newsfeed_all.$value.'<br><br>';
	echo
<<<EOD
	<html>
		<head>
		<meta charset="utf-8">
		<link href="include/style.css" rel="stylesheet" type="text/css"/> 
			<title>
				О нас
			</title>
		</head>
		<body>
			$in_links
			<table border = "0" align = "center" width = "900">
				<tr>
					<td align = "left">
						<br>
						<font size = "+1">
							<p>Магазин RockSHOP является крупнейшим в России магазином рок-атрибутики. За 11 лет существования мы успели обзавестись огромным ассортиментом рок-атрибутики, неформальной одежды и аксессуаров. В нашем магазине представлен большой выбор зарубежных товаров, таких как легендарные украшения Alchemy Gothic, ювелирные украшения Joker, украшения и аксессуары Rock Merch, одежда из натуральной кожи First и Hard Steel.</p>
							<p>Все это время мы постоянно совершенствовались и наш магазин рок-атрибутики успел стать культовым местом среди рок-движения, а так же обзавелись огромным количеством довольных покупателей не только в Москве, но и по всей России, а так же за рубежом.</p>
							<p>Магазин работает каждый день, чтобы поддерживать НАШЕ движение, придавая ему значимость и смысл. Адреса магазинов вы можете найти в разделе контакты.</p>
						</font>
					</td>
				</tr>
				<tr>
					<td align = "center">
						<br>
						<p>
							НОВОСТНАЯ ЛЕНТА
						</p>
					</td>
				</tr>
				<tr>
					<td align = "left">
						$newsfeed_all
					</td>
				</tr>
			</table>
		</body>
	</html>
EOD;
?>