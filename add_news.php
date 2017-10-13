<?php
	include 'GLOBAL_INCLUDE.php';
	$add = htmlspecialchars($_POST['add']);
	$key_news = file_get_contents($filepath.'txt/key_news.txt');
	if ($add != null && $add != '')
	{
		if ($key_news != null && $key_news != '')
			$add = "\n".$add;
		file_put_contents($filepath.'txt/key_news.txt', $add, FILE_APPEND);
	}
	header('Location: edit_news.php');
		echo
<<<EOD
	<html>
		<head>
		<meta charset="utf-8">
		<link href="include/style.css" rel="stylesheet" type="text/css"/> 
		</head>
	</html>
EOD;
?>