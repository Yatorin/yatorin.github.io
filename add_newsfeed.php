<?php
	include 'GLOBAL_INCLUDE.php';
	$add = htmlspecialchars($_POST['add']);
	$newsfeed = file_get_contents($filepath.'txt/newsfeed.txt');
	if ($add != null && $add != '')
	{
		if ($newsfeed != null && $newsfeed != '')
			$add = "\n".$add;
		file_put_contents($filepath.'txt/newsfeed.txt', $add, FILE_APPEND);
	}
	header('Location: edit_newsfeed.php');
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