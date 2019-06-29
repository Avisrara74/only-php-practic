<?php include('./connectionDB.php'); ?>
<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Профиль пользователя</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
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
						<?php include('./functions.php'); ?>
						<?php /*
							$sql10 = "SELECT author FROM articles";
							$result10 = mysqli_query($connection, $sql10);
							$result11 = mysqli_fetch_all($result10, MYSQLI_ASSOC);
							$user_id = $user_articles['author'];
							var_dump ($user_id) . '</br></br></br></br></br></br></br>'; */
						?>
						<?php /*
							$sql = "SELECT articles.id, title, second_title, pubdate, author, image_article, image_avatar, text, likes, comments
								FROM users
								INNER JOIN articles on author = users.login WHERE '$user_id' = author";
							$result = mysqli_query($connection, $sql);
							$user_articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
							echo '</br></br></br></br></br></br>' . $sql . '</br>';
							var_dump($user_articles) . '</br>'; */

						?>
						
						<!-- Post -->
						<?php 
							$user_id = $_GET['author'];
							$user_post = GET_article_by_author ($user_id);
						?>
						<?php foreach ($user_post as $user_articles): ?>
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="/single.php?article_id=<?php echo $user_articles['id']; ?>"><?php echo $user_articles['title']; ?></a></h2>
										<p><?php echo $user_articles['second_title']; ?></p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01"><?php echo $user_articles['pubdate']; ?></time>
										<a href="/user.php?author=<?php echo $user_articles['author']; ?>" class="author"><span class="name"><?php echo $user_articles['author']; ?></span><img src="<?php echo $user_articles['image_avatar']; ?>" alt="" /></a>
									</div>
								</header>
								<a href="/single.php?article_id=<?php echo $user_articles['id']; ?>" class="image featured"><img src="<?php echo $user_articles['image_article']; ?>" alt="" /></a>
								<p><?php echo $user_articles['text']; ?></p>
								<footer>
									<ul class="actions">
										<li><a href="/single.php?article_id=<?php echo $user_articles['id']; ?>" class="button big">Continue Reading</a></li>
									</ul>
									<ul class="stats">
										<li><a href="/single.php?article_id=<?php echo $user_articles['id']; ?>" class="icon fa-heart"><?php echo $user_content['likes']; ?></a></li>
										<li><a href="/single.php?article_id=<?php echo $user_articles['id']; ?>" class="icon fa-comment"><?php echo $user_content['comments']; ?></a></li>
									</ul>
								</footer>
							</article>
						<?php endforeach; ?>
							
						
					</div>
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