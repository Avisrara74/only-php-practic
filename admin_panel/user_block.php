<?php include('../connectionDB.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<script type="text/javascript">
	<?php
		$author = $_SESSION['article_author'];
		$article_id = $_SESSION['article_id'];
		$block_sql = "UPDATE users SET access = '0' WHERE '$author' = login";
		mysqli_query($connection, $block_sql);
	?>
		window.location = '../index.php ?>';
		alert("Пользователь заблокирован");
	</script> 
</body>
</html>