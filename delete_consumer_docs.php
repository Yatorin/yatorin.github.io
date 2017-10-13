<?php
	include 'GLOBAL_INCLUDE.php';
	$delete = htmlspecialchars($_POST['delete']);
	$consumer_docs = unserialize(file_get_contents($filepath.'txt/consumer_docs.txt'));
	if ($delete != null && $delete != '' && $consumer_docs != null && $consumer_docs != '')
	{
		$tmp = 0;
		foreach($consumer_docs as $cell => $value)
		{
			$tmp++;
			if ($tmp == $delete)
				unset($consumer_docs[$cell]);
		}
		file_put_contents($filepath.'txt/consumer_docs.txt', serialize($consumer_docs));
	}
	header('Location: edit_consumer_docs.php');
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