<?php include('./connectionDB.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Добавить лайк</title>
</head>
<body>
	<?php 
		if (isset($_SESSION['username'])) { // если пользователь авторизирован, то
			$article_id = $_GET['id_article'];
			$like_author = $_SESSION['username'];
			$article_author = $_GET['article_author'];
			$like_check_sql = "SELECT * FROM likes WHERE '$like_author' = author and '$article_id' = id_article";
			$like_check_result = mysqli_query($connection, $like_check_sql);
			$like_check = mysqli_fetch_assoc($like_check_result);

			// если в бд нету лайка пользователя на этот пост, то добавляем лайк
			if ($like_check == FALSE) 
			{
			$like = "INSERT INTO likes (id_article, author) VALUES ('$article_id', '$like_author')";
			mysqli_query($connection, $like);?>
			<script type="text/javascript">
			history.back();
			</script>
	<?php	}
			else 
			{
			$like = "DELETE FROM likes WHERE '$like_author' = author and '$article_id' = id_article";
			mysqli_query($connection, $like);?>
			<script type="text/javascript">
			history.back();
			</script>
	<?php   }
			// либо если пользователь вообще не авторизирован - просим авторизироваться
		} elseif (!isset($_SESSION['username']))  { ?>
		 		<script type="text/javascript">
					alert("Авторизируйтесь для добавления отметки мне нравится");
					history.back();
			  	</script>
	<?php	} ?> 
</body>
</html>