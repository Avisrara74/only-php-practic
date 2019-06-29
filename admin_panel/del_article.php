<?php include('../connectionDB.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		$article_id = $_SESSION['article_id'];
		$delete_article = "DELETE FROM articles WHERE '$article_id' = id";
		mysqli_query($connection, $delete_article); 
		$delete_comments = "DELETE FROM comments WHERE '$article_id' = articles_id";
		mysqli_query($connection, $delete_comments); 
		?>
		<script type="text/javascript">
			alert("Пост удалён");
			window.location = "/index.php";
		</script>;
</body>
</html>

