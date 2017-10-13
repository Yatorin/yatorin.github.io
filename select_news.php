<?php
	include 'GLOBAL_INCLUDE.php';
	$select = htmlspecialchars($_POST['select']);
	$str = null;
	if ($select != null && $select != '')
	{
		$mas = file($filepath.'txt/key_news.txt');
		$tmp = 0;
		foreach($mas as $str0)
		{
			$tmp = $tmp + 1;
			if ($tmp == $select)
				$str = $str0;
		}
	}
	file_put_contents($filepath.'txt/day_new.txt', $str);
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