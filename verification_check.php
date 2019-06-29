<!--Скрываем или выводим окна авторизации / регистрации в зависимости от статуса пользователя 
	подключаем скрипт на все страницы-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<?php
	if (isset($_SESSION['username'])) {?> 
													<section>
														<ul class="links">
															<li><?php
															if (isset($_SESSION['username'])) { 
															echo '<h2 class="hello">Welcome, ' . $_SESSION['username'] . '</h2>';
														}?>
																<a href="logout.php">
															 		<h3>Log Out</h3>
															 	</a>
															  	</li>
															  	<li>
																<a href="add.php">
																	<h3>Add Post</h3>
															    </a>
														  	</li>
													  	</ul>
													</section>
										<?php } else {?>
												<section>
													<ul class="actions vertical">
														<li><h3>Login</h3></li>
														<li>
															<form action="/authorization_process.php" method="GET">
																<input type="text" name="login" placeholder="Username"><br>
																<input type="password" name="password" placeholder="Password"><br>
																<input type="submit" class="button big fit" value="Log In" name="authorization">
															</form>
														</li>
														<li><h3>Registration</h3></li>
														<li>
															<form action="/registration_process.php" method="GET">
																<input type="text" name="new_user" required placeholder="Username"><br>
																<input type="password" name="new_password" required placeholder="Password"><br>
																<input type="password" name="password_confirm" required placeholder="Confirm password"><br>
																<input type="submit" class="button big fit" value="Sign up">
															</form>
														</li>
													</ul>
												</section>
										<?php 
									} 
?>
</body>
</html>
