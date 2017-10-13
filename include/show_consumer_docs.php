<?php
	include 'GLOBAL_INCLUDE.php';
	$consumer_docs = unserialize(file_get_contents($filepath.'txt/consumer_docs.txt'));
	$show_docs = null;
	$number = 0;
	if ($consumer_docs != null)
	{
		foreach($consumer_docs as $doc)
		{
			$number++;
			$name = $number.' '.$doc['name'];
			$descr = $doc['descr'];
			$link = $doc['link'];
			$show_docs = $show_docs.<<<EOD
				<a href = "$link">
					$name
				</a>
				<br>
				$descr
				<br>
				<br>
EOD;
		}
	}
?>