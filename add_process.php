<?php include('./connectionDB.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<?php 
	$title = $_GET['title'];
	$title_2 = $_GET['title_2'];
	$content = $_GET['content'];
	$author = $_SESSION['username'];
	$sql = "INSERT INTO articles (`title`, `second_title`, `author`, `text`) 
			VALUES ('$title', '$title_2', '$author', '$content')";
		if (isset($author)) { 										
				mysqli_query($connection, $sql); ?>
				<script type="text/javascript">
					alert("Пост успешно добавлен! Вы перенаправлены на главную страницу");
					window.location = "index.php";
				</script>		
		<?php  } else { ?>
			<script type="text/javascript">
				alert("Сударь, вы не авторизированы! Авторизируйтесь для добавления поста");
				window.location = "add.php";
			</script>
		<?php }?>
</body>
</html>

		