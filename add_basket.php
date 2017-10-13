<?php
	include 'GLOBAL_INCLUDE.php';
	$id = htmlspecialchars($_POST['id']);
	$goods = unserialize(file_get_contents($filepath.'txt/goods.txt'));
	$basket_mas = $_COOKIE['basket'];
	$check = true;
	if ($basket_mas != null && $goods != null)
	{
		foreach($basket_mas as $id_temp => $junk)
			if ($id != $id_temp)
			{
				$art1 = null;
				$art2 = null;
				foreach($goods as $value)
				{
					if ($value['id'] == $id)
						$art1 = $value['article'];
					else if ($value['id'] == $id_temp)
						$art2 = $value['article'];
				}
				if ($art1 == $art2)
					$check = false;
			}
			else
				$check = false;
		if (!$check)
		{
			echo <<<EOD
				<HTML>
					<HEAD>
					<meta charset="utf-8">
					<link href="include/style.css" rel="stylesheet" type="text/css"/> 
						<TITLE>
							Внимание!
						</TITLE>
					</HEAD>
					<BODY align = "center">
						<br>
						<br>
						<br>
						<br>
						<h2>
							Согласно правилам магазина, нельзя заносить в корзину товары с одинаковыми артиклями,
							<br>
							либо одинаковые товары.
							<br>
							Приносим свои извинения!
						</h2>
						<br>
						<a href="catalog.php">
							Назад
						</a>
					</BODY>
				</HTML>
EOD;
		}
	}
	else if ($basket_mas == null && $goods != null)
		$check = true;
	else
	{
		$check = false;
		echo <<<EOD
			FATAL ERROR!
			<br>
			<a href="catalog.php">
				Назад
			</a>
EOD;
	}
	if ($check)
	{
		setcookie("basket[".$id."][quantity]", 1);
		setcookie("basket[".$id."][delivery]", null);
		header('Location: catalog.php');
	}
?>