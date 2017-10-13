<?php
	ini_set('display_errors','Off');
	include 'GLOBAL_INCLUDE.php';
	session_start();
	if ($_SESSION['admin'] != false && file_exists($filepath.'txt/key_news.txt'))
	{
		$key_news = file($filepath.'txt/key_news.txt');
		$all_news = '<ol>';
		foreach($key_news as $value)
			$all_news = $all_news.'<li>'.$value.'</li>'.'<br>';
		$all_news = $all_news.'</ol>';
		
		$day_news = file_get_contents($filepath.'txt/day_new.txt');
		if ($day_news == null)
			$day_news = 'отсутствет';
	
		$show_html = <<<EOD
		<HTML>
			<HEAD>
			<meta charset="utf-8">
			<link href="include/style.css" rel="stylesheet" type="text/css"/> 
				<TITLE>
					Редактирование новостей
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
								Доступные новости:
							</p>
							$all_news
						</td>
						<td align = "left" valign = "top" width = "50%">
							<p>
								Выбранная новость:
							</p>
							$day_news
							<br>
							<br>
							<form enctype = "multipart/form-data" name = "form1" method = "POST" action = "add_news.php">
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
							<form enctype = "multipart/form-data" name = "form2" method = "POST" action = "delete_news.php">
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
							<br>
							<form enctype = "multipart/form-data" name = "form3" method = "POST" action = "select_news.php">
								<b>
									Выбор новости
								</b>
								<br>
								Выберите номер новости из доступных слева.
								<br>
								Если невость не выбрана, оставьте поле пустым.
								<br>
								<input type = "text" name = "select">
								<br>
								<input type = "submit" value = "Выбрать новость">
							</form>
							<a href="index.php">
								На главную
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