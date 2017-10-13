<?php
	include 'GLOBAL_INCLUDE.php';
	$delete = htmlspecialchars($_POST['delete']);
	$key_news = file($filepath.'txt/key_news.txt');
	if ($delete != null && $delete != '' && $key_news != null && $key_news != '')
	{
		$tmp = 0;
		foreach($key_news as $cell => $value)
		{
			$tmp = $tmp + 1;
			if ($tmp == $delete)
				unset($key_news[$cell]);
		}
		file_put_contents($filepath.'txt/key_news.txt', $key_news);
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