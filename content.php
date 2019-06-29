<?php include('./connectionDB.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<title>Пост</title>
</head>
<body>
	<?php include('./functions.php'); ?>
	<?php 
	// присваиваем обычной переменной значение глобальной переменной с массивом articles
		$article = GET_articles();
		$i = 0;
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
				<a href="user.php?author=<?php echo $articles['author']; ?>" class="author"><span class="name"><?php echo $articles['author']; ?></span><img src="<?php echo $articles['image_avatar']; ?>" alt="" /></a>
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
				<!--ЛАЙКИ-->
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
				<li><a href="single.php?article_id=<?php echo $id_article ?>" class="icon fa-comment"><?php echo $articles['comments']; ?></a></li>
			</ul>
		</footer>
		</article>
		<?php $i = $i+3; ?>
		<!-- Pagination -->
		<?php if (($i % 7) == 2) {
			$index_link = $index_link+1;
		?>
		 	<ul class="actions pagination">
				<li><a href="all_content.php" class="button big next" name="next_page">All Posts</a></li>
			</ul> 	
		<?php break;} 
		else if (isset($_SESSION['next_page'])) {
			continue;
		} ?>
	<?php endforeach; ?>					
</body>
</html>
