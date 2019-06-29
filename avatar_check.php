<!--Проверяем, авторизирован ли пользователь.
	Если да - выводим аватарку
	Если нет - выводим иконку неавторизованного юзера -->
	<?php
		global $connection;
		$user = $_SESSION['username'];
		$sql = "SELECT `image_avatar` FROM `users` WHERE '$user' = `login` ";
		$result = mysqli_query($connection, $sql);
		$avatar = mysqli_fetch_assoc($result);
	?>
	<?php 
			if (isset($_SESSION['username'])) {?> 
					<ul>
							<li class="menu user">
								<a href="#menu"><img src="<?php echo $avatar['image_avatar']; ?>"></a>
							</li>
					</ul>
					<?php
			} else {?>
					 <ul>
							<li class="menu">
								<a class="fa-user" href="#menu">Menu</a>
							</li>
					 </ul>
			<?php 
		}
	?>

