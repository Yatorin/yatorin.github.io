<?php
	include 'GLOBAL_INCLUDE.php';
	$delete = htmlspecialchars($_POST['delete']);
	$newsfeed = file($filepath.'txt/newsfeed.txt');
	if ($delete != null && $delete != '' && $newsfeed != null && $newsfeed != '')
	{
		$tmp = 0;
		foreach($newsfeed as $cell => $value)
		{
			$tmp = $tmp + 1;
			if ($tmp == $delete)
				unset($newsfeed[$cell]);
		}
		file_put_contents($filepath.'txt/newsfeed.txt', $newsfeed);
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