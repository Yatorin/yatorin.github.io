<?php
	ini_set('display_errors','Off');
	include 'GLOBAL_INCLUDE.php';
	session_start();
	if ($_SESSION['admin'] != false)
	{
		include $filepath.'include/show_consumer_docs.php';
		$show_html = <<<EOD
		<HTML>
			<HEAD>
			<meta charset="utf-8">
			<link href="include/style.css" rel="stylesheet" type="text/css"/> 
				<TITLE>
					Редактирование документов
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
							$show_docs
						</td>
						<td align = "left" valign = "top" width = "50%">
							<b>
								Редактирование документов:
							</b>
							<form enctype = "multipart/form-data" name = "form1" method = "POST" action = "add_consumer_docs.php">
								<br>
								ДОБАВИТЬ
								<br>
								Название
								<br>
								<input type = "text" name = "name">
								<br>
								Описание
								<br>
								<input type = "text" name = "descr">
								<br>
								Выбрать файл
								<br>
								<input type = "file" name = "link">
								<br>
								<br>
								<input type = "submit" value = "Добавить">
								<br>
							</form>
							<form enctype = "multipart/form-data" name = "form2" method = "POST" action = "delete_consumer_docs.php">
								<br>
								УДАЛИТЬ
								<br>
								Номер документа
								<br>
								<input type = "text" name = "delete">
								<br>
								<input type = "submit" value = "Удалить">
							</form>
							<a href="consumer_page.php">
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