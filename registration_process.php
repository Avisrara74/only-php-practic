<?php include('./connectionDB.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<?php 
		$login = $_GET['new_user'];
		$password = $_GET['new_password'];
		$password_confirm = $_GET['password_confirm'];
		if ( ($login != '') and ($password != '') and ($password_confirm != '') and ($password == $password_confirm) ) {
			mysqli_query($connection, "INSERT INTO `users` (`login`, `pass`) VALUES ('$login', '$password')");
			echo '<script type="text/javascript">alert("Вы успешно зарегистрировались! Введите логин и пароль для авторизации");</script>';
			echo '<script type="text/javascript">window.location = "index.php";</script>';
		} else {
			echo '<script type="text/javascript">alert("Проверьте корректность заполняемых для регистрации данных");</script>';
			echo '<script type="text/javascript">window.location = "index.php";</script>';
		}			
	?>
</body>
</html>

<!--Регистрация нового пользователя-->