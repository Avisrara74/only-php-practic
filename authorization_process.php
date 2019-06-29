<?php include('./connectionDB.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<?php 
	$login = $_GET['login'];
	$pass = $_GET['password'];
	$authorization = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$login' and `pass` = '$pass' ");
	$check = mysqli_fetch_all($authorization, MYSQLI_ASSOC);
	if (mysqli_num_rows($authorization) == 0) {?>
		<script type="text/javascript">
			alert("Вы не зарегистрировались либо неправильно ввели пароль, попробуйте еще раз!");
		</script>
		<?php 
		echo '<script type="text/javascript">window.location = "index.php";</script>';
	} else {
		if ($check[0]['access'] == 1) {
			$_SESSION['username'] = $login;	
			echo '<script type="text/javascript">window.location = "index.php";</script>';
			exit;
		} else {
			echo '<script type="text/javascript">
						window.location = "blocked.php";
				  </script>';
		}
	}
		
?>
</body>
</html>

<!--Обработчик кнопки 'Log in'
	Проверяем логин и пароль пользователя в базе данных-->