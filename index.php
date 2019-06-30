<?php include('./connectionDB.php');?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Главная</title>
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
						<h1><a href="/index.php">Blog</a></h1>
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
						<?php include('./content.php') ?>
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
									<p>Последние посты ----></p>
								</header>
							</section>
						<!-- Mini Posts -->
							<section>
								<h3>Самые популярные</h3>
								<div class="mini-posts">
									<?php 
									$sql = "SELECT articles.id, title, second_title, image_article, author, users.image_avatar, comments FROM users
									INNER JOIN articles ON articles.author = users.login and users.access = 1 ORDER BY articles.likes DESC";
									$result = mysqli_query($connection, $sql);
									$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
									// рандомизируем имеющиеся в БД посты(или нет)
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
														<a href="/user.php?author=<?php echo $article['author']; ?>" class="author"><img src="<?php echo $article['image_avatar']; ?>" alt="" /></a>
													</header>
													<a href="/single.php?article_id=<?php echo $article['id']; ?>" class="image">
													<img src="<?php echo $article['image_article']; ?>" alt="" /></a>
												</article>
										<?php $i = $i+1; ?>
										<?php  } ?>		
									<!-- Mini Post --> 
								</div>
						
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