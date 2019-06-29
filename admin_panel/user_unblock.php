<?php include('../connectionDB.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		$author = $_SESSION['article_author'];
		$article_id = $_SESSION['article_id'];
		$block_sql = "UPDATE users SET access = '1' WHERE '$author' = login";
		mysqli_query($connection, $block_sql);
	?>
	<script type="text/javascript">
		alert("Пользователь разблокирован");
		window.location = '../single.php?article_id=<?php echo $article_id ?>'
	</script>

</body>
</html>