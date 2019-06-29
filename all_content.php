<?php include('./connectionDB.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/main.css" />
	<title>Все посты</title>
</head>
	<body>
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
						<!-- Actions -->
							<?php
								include('verification_check.php');
							?>
					</section>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
						<?php include('./functions.php'); ?>
						<?php 
						// присваиваем обычной переменной значение глобальной переменной с массивом articles
							$article = GET_articles();
						?>
						<?php foreach ($article as $articles): ?>
							<article class="post" action="/content.php">
							<header>
								<div class="title">
									<!--ВЫВОДИМ ЗАГОЛОВОК-->
									<h2><a href="/single.php?article_id=<?php echo $articles['id']; ?>"><?php echo $articles['title']; ?></a></h2>
									<!--ВЫВОДИМ ЗАГОЛОВОК №2-->
									<p><?php echo $articles['second_title']; ?></p>
								</div>
								<div class="meta">
									<!--ДАТА СОЗДАНИЯ ПОСТА-->
									<time class="published" datetime="2015-11-01"><?php echo $articles['pubdate']; ?></time>
									<!--ИМЯ ПОЛЬЗОВАТЕЛЯ, КОТОРЫЙ СОЗДАЛ ПОСТ И ЕГО КАРТИНКА-->
									<a href="/user.php?author=<?php echo $articles['author']; ?>" class="author"><span class="name"><?php echo $articles['author']; ?></span><img src="<?php echo $articles['image_avatar']; ?>" alt="" /></a>
								</div>
							</header>
							<!--КАРТИНКА ПОСТА-->
							<a href="/single.php?article_id=<?php echo $articles['id']; ?>" class="image featured"><img src="<?php echo $articles['image_article']; ?>" alt="" /></a>
							<!--ТЕКСТ ПОСТА-->
							<p><?php echo $articles['text']; ?></p>  
							<footer>
								<ul class="actions">
									<li><a href="/single.php?article_id=<?php echo $articles['id']; ?>" class="button big">Continue Reading</a></li>
									</ul>
									<ul class="stats">
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
									<!--КОММЕНТЫ-->
									<li><a href="/single.php?article_id=<?php echo $articles['id']; ?>" class="icon fa-comment"><?php echo $articles['comments']; ?></a></li>
								</ul>
							</footer>
							</article>
						<?php endforeach; ?>	
					</div>

				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<?php 
									$user = $_SESSION['username'];
									$sql = "SELECT `image_avatar` FROM `users` WHERE '$user' = `login` ";
									$result = mysqli_query($connection, $sql);
									$avatar = mysqli_fetch_assoc($result);
									if (isset($_SESSION['username'])) { ?>
								<a href="/user.php?author=<?php echo $_SESSION['username']; ?>" class="logo"><img src="<?php echo $avatar['image_avatar']; ?>" alt="" /></a>
								<?php  } ?>
								<header>
									<h2>Blog</h2>
									<p>Все посты ----></p>
								</header>
							</section>

						<!-- Mini Posts -->
							<section>
								<h3>Случайные посты</h3>
								<div class="mini-posts">
									<?php 
										$sql = "SELECT articles.id, title, second_title, image_article, author, users.image_avatar, comments FROM users
										INNER JOIN articles ON articles.author = users.login AND users.access = 1 ORDER BY articles.id ASC";
									$result = mysqli_query($connection, $sql);
									$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
									// рандомизируем имеющиеся в БД посты 
									shuffle($articles);
									?>
									<!-- Mini Post -->
									<?php 
									// выводим посты до тех пор, пока (i <= 4)
									$i = 0;
										foreach ($articles as $article){
										if ($i >= 4) {break;} ?>		
									<?php echo $article['article.id'];  ?>									 
												<article class="mini-post">
													<header>
														<h3><a href="/single.php?article_id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h3>
														<time class="published"><?php echo $article['second_title']; ?></time>
														<a href="user.php" class="author"><img src="<?php echo $article['image_avatar']; ?>" alt="" /></a>
													</header>
													<a href="/single.php?article_id=<?php echo $article['id']; ?>" class="image">
													<img src="<?php echo $article['image_article']; ?>" alt="" /></a>
												</article>
										<?php $i = $i+1; ?>
										<?php  } ?>		
									<!-- Mini Post --> 
								</div>
							</section>

						<!-- Posts List -->

						<!-- Footer -->
							<section id="footer">
								<p class="copyright">&copy; Blog. Design: <a href="http://html5up.net">HTML5 UP</a>.</p>
							</section>

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