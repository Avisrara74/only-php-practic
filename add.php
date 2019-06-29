<?php include('./connectionDB.php'); ?>
<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Добавить пост</title>
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
							<section>
								<?php
									include('verification_check.php');
								?>
							</section>

					</section>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
						<form action="/add_process.php" method="GET">
							<article class="post">
								<h1>Добавить новый пост</h1>
								<input type="text" name="title" required placeholder="Post name"><br>
								<input type="text" name="title_2" required placeholder="Subtitle"><br>
								<textarea name="content" required placeholder="Post content"></textarea><br>
								<input type="submit" class="button big fit" value="Add Post" name="go_post">
							</article>
						</form>

					</div>

				<!-- Footer -->
					<section id="footer">
						<p class="copyright">&copy; Blog. Design: <a href="http://html5up.net">HTML5 UP</a>.</p>
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