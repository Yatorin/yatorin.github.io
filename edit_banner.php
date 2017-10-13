<?php
	include 'GLOBAL_INCLUDE.php';
	ini_set('display_errors','Off');
	session_start();
	if ($_SESSION['admin'] != false)
	{
		$banner_data = unserialize(file_get_contents($filepath.'txt/banner_data.txt'));
		$banner_link = $banner_data['banner_link'];
		$banner_picture = $banner_data['banner_picture'];
		$show_html = <<<EOD
		<HTML>
			<HEAD>
			<meta charset="utf-8">
			<link href="include/style.css" rel="stylesheet" type="text/css"/> 
				<TITLE>
					Редактирование баннера
				</TITLE>
			</HEAD>
			<BODY>
				<table border = "0" align = "center" width = "900">
					<tr>
						<td height = "30">
						</td>
					</tr>
					<tr>
						<td align = "center" valign = "center" width = "50%">
							<a href = "$banner_link">
								<img src = "$banner_picture" width = "400">
							</a>
						</td>
						<td align = "left" valign = "top" width = "50%">
							<form enctype = "multipart/form-data" name = "form1" method = "POST" action = "edit_banner_go.php">
								<b>
									Редактирование баннера:
								</b>
								<br>
								Ссылка баннера
								<br>
								<input type = "text" name = "banner_link">
								<br>
								Ссылка на сам баннер
								<br>
								<input type = "text" name = "banner_picture">
								<br>
								<input type = "submit" value = "Изменить">
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