<?php
	include('./connectionDB.php');
	session_destroy();
	echo '<script>window.location = "index.php";</script>';
?>

<!-- Убиватель сессии3000, врубаем этого монстра, если пользователь решает разлогиниться-->