<?php
	ini_set('display_errors','Off');
	include 'GLOBAL_INCLUDE.php';
	$login = htmlspecialchars($_POST['login']);
	$password = htmlspecialchars($_POST['password']);
	$warning = null;
	$result = null;
	if ($login !== null && $login !== '' && $password !== '' && $password === $_POST['password2'])
	{
		$check = false;
		$mas = unserialize(file_get_contents($filepath.'txt/user_log_data.txt'));
		if ($mas != null)
			foreach($mas as $cell => $value)
				if ($login == $cell)
					$check = true;
		if (!$check)
		{
			$admin = ($_POST['admin'] !== null) ? true : false;
			session_start();
			$_SESSION['date'] = date("m.d.y");
			$_SESSION['time'] = date("H:i:s");
			$_SESSION['admin'] = $admin;
			$mas[$login]['password'] = $password;
			$mas[$login]['date'] = $_SESSION['date'];
			$mas[$login]['time'] = $_SESSION['time'];
			$mas[$login]['admin'] = $_SESSION['admin'];
			file_put_contents($filepath.'txt/user_log_data.txt', serialize($mas));
			$result = 'Регистрация завершена.<br>Ваш логин: '.$login.'<br>'.'Дата входа: '.$_SESSION['date'].'<br>Время входа: '.$_SESSION['time'].'<br>';
			setcookie('name', $login);
			
		}
		else
			$warning = '<a1>Такой пользователь уже существует!</a1><br>';
	}
	else if  ($password !== $_POST['password2'])
		$warning = '<a1>Пароли не совпадают.</a1><br>';
	else if  ($login !== null)
		$warning = '<a1>Что-то пошло не так, попробуйте ещё раз.</a1><br>';
	
	if  ($result === null)
		$result = <<<EOD
			$warning
			<form enctype = "multipart/form-data" name = "form_reg" method = "POST" action = "register.php">
				<b>
					Логин:
				</b>
				<br>
				<input type = "text" name = "login"><br>
				<b>
					Пароль:
				</b>
				<br>
				<input type = "text" name = "password">
				<br>
				<b>
					Повторите пароль:
				</b>
				<br>
				<input type = "text" name = "password2">
				<br>
				<b>
					Является администратором? (для упрощения)
				</b>
				<input type = "checkbox" name = "admin">
				<br>
				<br>
				<input type = "submit" value = "Отправить">
			</form>
EOD;
	echo <<<EOD
		<html>
			<head>
			<meta charset="utf-8">
			<link href="include/style.css" rel="stylesheet" type="text/css"/> 
				<title>
					Регистрация
				</title>
			</head>
			<body align = "center">
				<br>
				<br>
				<br>
				<br>
				$result
				<a href="index.php">
					На главную
				</a>
			</body>
		</html>
EOD;
?>