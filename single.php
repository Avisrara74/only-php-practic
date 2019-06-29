<?php include('./connectionDB.php'); ?>
<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Пост</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="single">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.php">Blog</a></h1>
						<nav class="main">
							<?php  
								include('avatar_check.php');
							?>
						</nav>
					</header>
				<!-- Menu -->
					<section id="menu">
						<!-- Links -->
							<?php 
								include('verification_check.php');
							?>
					</section>

				<!-- Main -->
					<div id="main">
						<?php include('./functions.php'); ?>
						<?php 
						// получаем id из адресной строки
							$article_id = $_GET['article_id'];
							//если значение article_id в адресной строке не является цифрой, выполняем код
							if (!is_numeric($article_id))
							{
								exit();
							}
						?>
						<!-- Post -->
						<?php 
						// ПОЛУЧАЕМ МАССИВ ТАБЛИЦЫ article
							$articles = GET_article_by_id($article_id);
						?>
						<article class="post">
							<header>
								<div class="title">
									<h2><a href="/single.php?article_id=<?php echo $articles['id']; ?>"><?php echo $articles['title']; ?></a></h2>
									<p><?php echo $articles['second_title']; ?></p>
								</div>
								<div class="meta">
									<time class="published" datetime="2015-11-01"><?php echo $articles['pubdate']; ?></time>
									<a href="/user.php?author=<?php echo $articles['author']; ?>" class="author"><span class="name"><?php echo $articles['author']; ?></span><img src="<?php echo $articles['image_avatar']; ?>" alt="" /></a>
								</div>
							</header>
							<span class="image featured"><img src="<?php echo $articles['image_article']; ?>" alt="" /></span>
							<p><?php echo $articles['text']; ?></p> 
							<footer>
								<ul class="stats">
									<?php if (isset($_SESSION['username'])) { 
											if ($_SESSION['username'] == ('admin' or 'Admin')) {
													$_SESSION['article_id'] = $articles['id'];
													$_SESSION['article_author'] = $articles['author'];
												?>
													<!--Редактирование поста-->
													<li><a href="/admin_panel/edit_article.php">Edit</a></li>
													<!--Удаление поста-->
													<li><a name="delete_article" href="/admin_panel/del_article.php" class="red">Delete</a></li>
													<!--Заблокировать пользователя-->											
													<li><a href="/admin_panel/user_block.php" class="red">Blocked</a></li>	
													<!--Разблокировать пользователя если заблокирован-->
													<?php
														if ($articles['access'] == 0) { ?>
															<li><a href="/admin_panel/user_unblock.php">Unblock</a></li>
													<?php } ?>	
										<?php } ?>
									<?php } ?> 
									<!--Добавить лайки/вывести лайки-->
										<?php 
											$id_article = $articles['id'];
											$article_author = $articles['author'];
										?>
										<?php 
										// берем нужные лайки, выводим ввиде кол-ва строк
											$likes_count_sql = "SELECT * FROM likes WHERE $id_article = `id_article`";
											$likes_count_result = mysqli_query($connection, $likes_count_sql);
											$likes_count = mysqli_num_rows($likes_count_result);


										// добавляем нужные лайки в таблицу `articles`
											$likes_query = "UPDATE `articles` set `likes` = $likes_count 
											WHERE $id_article = `id`";
											mysqli_query($connection, $likes_query);
										?>
										<li><a href="/add_like.php?id_article=<?php echo $id_article?>&article_author=<?php echo $article_author ?>" name="do_like" class="icon fa-heart"><?php echo $likes_count; ?></a></li>
										<!--Вывести количество комментариев-->
										<li><a href="/single.php?article_id=<?php echo $articles['id']; ?>" class="icon fa-comment"><?php echo $articles['comments']; ?></a></li>
								</ul>
							</footer>
						</article>
						<!-- Comments -->
							<div class="post">
								<?php		
								// ПОЧЕМУ НЕ ПОЛУЧАЕТСЯ СДЕЛАТЬ ФУНКЦИЕЙ? ХЕР ЗНАЕТ
									$connection;
									$sql = "SELECT comments.id, user_id, author, articles_id, text, 
									users.image_avatar FROM users
									INNER JOIN comments ON comments.user_id = users.id 
									WHERE '$article_id' = comments.articles_id";
									$result = mysqli_query($connection, $sql);
									$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
								?>
								<section class="comments">
									<h3>Comments</h3>
									<form method="POST">

										<textarea name="comment_text" required></textarea><br>
										<input type="submit" class="button big fit" value="Add Comment" name="knopka">
										<!--НЕ СМОГ ПЕРЕДАТЬ ПЕРЕМЕННУЮ article_id В ДРУГОЙ ФАЙЛ, ЗАБИЛ, ВСТАВИЛ ЭТУ ЧАСТЬ КОДА СЮДА-->
										<?php
											$user_author = $_SESSION['username'];
											// получаем ID авторизированного пользователя для его добавления в БД
											$sql5 = "SELECT id FROM users WHERE `login` = '$user_author'";
											$resultHere1 = mysqli_query($connection, $sql5);
											$resultHere2 = mysqli_fetch_assoc($resultHere1);
											// это он и есть
											$user_id = $resultHere2['id'];
											// читаем текст из <textarea>	
											$user_comment = $_POST['comment_text'];
											// берем id пользователя для записи в бд, присваиваем его из кода выше
											$article_id1 = $article_id;
											// если кнопка нажата, то
											if (isset($_POST['knopka'])) 
											{
												// если есть активная сессия, то
												if (isset($_SESSION['username'])) 
												{
													// если текстовое поле не пустое, то
													if ($user_comment != "") 
													{
													mysqli_query($connection, "INSERT INTO `comments` (`user_id`, `author`, `articles_id` ,`text`) 
																				VALUES ($user_id, '$user_author', $article_id1 ,'$user_comment')");
													echo '<script type="text/javascript">window.location = "single.php?article_id='. $article_id1 .'";</script>';
													} else 
													{
														echo '<script type="text/javascript">
															alert("Введите комментарий в текстовое поле");
														</script>';
														echo '<script type="text/javascript">window.location = "single.php?article_id='. $article_id1 .'";</script>';
													}
												} else if (!isset($_SESSION['username'])) 
												{
													echo '<script type="text/javascript">
														alert("Для начала - авторизируйтесь!");	
													</script>';
													echo '<script type="text/javascript">window.location = "single.php?article_id='. $article_id1 .'";</script>';
												} 
											}
											
										?>
									</form>
								</section>
								<?php foreach ($comments as $comment): ?>
								<article class="comment">
									<div class="comment-autor">
										<a href="/user.php?author=<?php echo $comment['author']; ?>"><img src="<?php echo $comment['image_avatar'] ?>"></a>
										<a href="/user.php?author=<?php echo $comment['author']; ?>"><?php echo $comment['author']; ?></a>
									</div>
									<p><?php echo $comment['text']; ?></p>
								</article>
								<?php 
									$comment_count = $comment_count+1;
								?>
								<?php endforeach;?>
								<?php 
								// обновляем счетчик комментов
									$query = "UPDATE `articles` set `comments` = $comment_count 
									WHERE $article_id = `id`";
									mysqli_query($connection, $query);
								?>

							</div>

					</div>

				<!-- Footer -->
					<section id="footer">
						<p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>.</p>
					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
<?php

mysqli_close($connection);

?>
	</body>
</html>