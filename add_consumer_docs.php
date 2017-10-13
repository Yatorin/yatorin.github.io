<?php
	include 'GLOBAL_INCLUDE.php';
	$data = null;
	$data['name'] = htmlspecialchars($_POST['name']);
	$data['descr'] = htmlspecialchars($_POST['descr']);
	$file = $_FILES['link'];
	$path = $filepath.<<<EOD
		docs/
EOD;
	$path = $path.$file['name'];
	move_uploaded_file($file['tmp_name'], $path);
	$data['link'] = $path;
	$consumer_docs = unserialize(file_get_contents($filepath.'txt/consumer_docs.txt'));
	$consumer_docs[] = $data;
	file_put_contents($filepath.'txt/consumer_docs.txt', serialize($consumer_docs));
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