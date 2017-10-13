<?php
	session_start();
	include 'GLOBAL_INCLUDE.php';
	$login = htmlspecialchars($_POST['login']);
	$password = htmlspecialchars($_POST['password']);
	$warning = null;
	$result = null;
	if ($login !== '' && $password !== '')
	{
		$check = true;
		$mas = unserialize(file_get_contents($filepath.'txt/user_log_data.txt'));
		if ($mas != null)
			if ($mas[$login]['password'] == $password)
					$check = true;
		if ($check)
		{
			
			$_SESSION['login'] = $login;
			$_SESSION['date'] = date("m.d.y");
			$_SESSION['time'] = date("H:i:s");
			$_SESSION['admin'] = $mas[$login]['admin'];
			$mas[$login]['date'] = $_SESSION['date'];
			$mas[$login]['time'] = $_SESSION['time'];
			file_put_contents($filepath.'txt/user_log_data.txt', serialize($mas));
			$result = 'Вход успешно выполнен. Ваш логин: '.$login.'<br>'.'Дата входа: '.$_SESSION['date'].'<br>Время входа: '.$_SESSION['time'].'<br>';
			setcookie('name', $login);
		}
		else
			$warning = '<a1>Неверные логин или пароль!</a1><br>';
	}
	else if ($login !== null)
		$warning = 'Не должно быть пустых значений!';
	
	if  ($result === null)
		$result = <<<EOD
			$warning
			<form enctype = "multipart/form-data" name = "form_reg" method = "POST" action = "enter.php">
				<b>
					Логин:
				</b>
				<br>
				<input type = "text" name = "login">
				<br>
				<b>
					Пароль:
				</b>
				<br>
				<input type = "text" name = "password">
				<br>
				<input type = "submit" value = "Отправить">
			</form>
EOD;
	echo <<<EOD
		<HTML>
			<HEAD>
			<meta charset="utf-8">
			<link href="include/style.css" rel="stylesheet" type="text/css"/> 
				<TITLE>
					Вход
				</TITLE>
			</HEAD>
			<BODY align = "center">
				<br>
				<br>
				<br>
				<br>
				$result
				<a href = "index.php">
					Назад
				</a>
			</BODY>
		</HTML>
EOD;
?>