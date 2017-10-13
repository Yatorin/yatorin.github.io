<?php
	include 'GLOBAL_INCLUDE.php';
	ini_set('display_errors','Off');
	include $filepath.'include/in_links.php';
	$add_name_html = <<<EOD
		<form enctype = "multipart/form-data" name = "guestname" method = "POST" action = "guestbook.php">
EOD;
	$guestname = $_COOKIE['name'];
	if ($guestname == null)
	{
		if ($_POST['guestname'] == null || $_POST['guestname'] == '')
			$guestname = 'Новый посетитель';
		else
			$guestname = htmlspecialchars($_POST['guestname']);
		$add_name_html = $add_name_html.<<<EOD
				<b>
					Вы можете ввести имя для гостевой книги:
				</b>
				<br>
				<input type = "text" name = "guestname">
				<br>
EOD;
	}
	else
		$add_name_html = $add_name_html.'Ваше имя для гостевой книги: '.$guestname;
	$add_name_html = $add_name_html.<<<EOD
			<br>
			Тема:
			<br>
			<input type = "text" name = "theme">
			<br>
			Напишите Ваш отзыв
			<br>
			<textarea rows = "3" cols = "100" type = "text" name = "comment">
			</textarea>
			<br>
			<input type = "submit" value = "Отправить">
		</form>
EOD;
	if($_POST['comment'] != null && $_POST['comment'] != '')
	{
		$theme = htmlspecialchars($_POST['theme']);
		if ($theme == null)
			$theme = 'нет';
		$comment = htmlspecialchars($_POST['comment']);
		$comment = str_replace('	', '', $comment);
		$date = date("m.d.y");
		$time = date("H:i:s");
		$datetime = 'Время:'."\n".$date."\n".$time;
		$comment = $guestname.':'."\n".'Тема: '.$theme."\n".$datetime."\n".$comment."\n\n";
		file_put_contents($filepath.'txt/guestbook.txt', $comment, FILE_APPEND);
	}
	$all_comments = '';
	$guestbook_txt = file($filepath.'txt/guestbook.txt');
	foreach($guestbook_txt as $value)
		$all_comments = $all_comments.$value.'<br>';
	echo
<<<EOD
	<html>
		<head>
		<meta charset="utf-8">
		<link href="include/style.css" rel="stylesheet" type="text/css"/> 
			<title>
				Гостевая книга
			</title>
		</head>
		<body>
			$in_links
			<table border = "0" align = "center" width = "900">
				<tr>
						<td height = "20">
						</td>
				</tr>
				<tr>
					<td align = "left">
						$add_name_html
					</td>
				</tr>
				<tr>
					<td align = "left">
						$all_comments
					</td>
				</tr>
			</table>
		</body>
	</html>
EOD;
?>