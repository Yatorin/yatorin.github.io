<?php
	include 'GLOBAL_INCLUDE.php';
	ini_set('display_errors','Off');
	include $filepath.'include/in_links.php';
	$show_docs_all = null;
	if ($_SESSION['admin'] != false)
		$show_docs_all = <<<EOD
			<br>
			<a href = "edit_consumer_docs.php">
				Редактировать документы
			</a>
			<br>
			<br>
EOD;
	include $filepath.'include/show_consumer_docs.php';
	$show_docs_all = $show_docs_all.$show_docs;
	echo
<<<EOD
	<html>
		<head>
		<meta charset="utf-8">
		<link href="include/style.css" rel="stylesheet" type="text/css"/> 
			<title>
				Страничка потребителя
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
						$show_docs_all
					</td>
				</tr>
			</table>
		</body>
	</html>
EOD;
?>