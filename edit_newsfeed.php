<?php
	include 'GLOBAL_INCLUDE.php';
	session_start();
	if ($_SESSION['admin'] != false)
	{
		$newsfeed = file($filepath.'txt/newsfeed.txt');
		$all_news = '<ol>';
		foreach($newsfeed as $value)
			$all_news = $all_news.'<li>'.$value.'</li>'.'<br>';
		$all_news = $all_news.'</ol>';
		$show_html = <<<EOD
		<HTML>
			<HEAD>
			<meta charset="utf-8">
			<link href="include/style.css" rel="stylesheet" type="text/css"/> 
				<TITLE>
					Редактирование ленты
				</TITLE>
			</HEAD>
			<BODY>
				<table border = "0" align = "center" width = "900">
					<tr>
						<td height = "30">
						</td>
					</tr>
					<tr>
						<td align = "left" valign = "top" width = "50%">
							<p>
								Новости в ленте:
							</p>
							$all_news
						</td>
						<td align = "left" valign = "top" width = "50%">
							<form enctype = "multipart/form-data" name = "form1" method = "POST" action = "add_newsfeed.php">
								<b>
									Добавление новости:
								</b>
								<br>
								Напишите текст новости
								<br>
								<input type = "text" name = "add">
								<br>
								<input type = "submit" value = "Добавить новость">
							</form>
							<br>
							<form enctype = "multipart/form-data" name = "form2" method = "POST" action = "delete_newsfeed.php">
								<b>
									Удаление новости:
								</b>
								<br>
								Выберите номер новости из доступных слева.
								<br>
								Если невость не выбрана, никакое удаление не произведётся.
								<br>
								<input type = "text" name = "delete">
								<br>
								<input type = "submit" value = "Удалить новость">
							</form>
							<a href="about.php">
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