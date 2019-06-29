<?php 
/*	function GET_categories() {
		global $connection;
		$sql = "SELECT * FROM `categories`";
		$result = mysqli_query($connection, $sql);
		$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

		return $categories;
	}
*/
	function GET_articles () {
		global $connection;
		$sql = "SELECT articles.id, title, second_title, pubdate, author, image_article, users.image_avatar, text, likes, comments FROM users
			INNER JOIN articles on users.login = articles.author and users.access = 1 ORDER BY articles.id DESC";
		$result = mysqli_query($connection, $sql);
		$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

		return $articles;	
	}

	function GET_article_by_id ($article_id) {
		global $connection;
		$sql = "SELECT articles.id, title, second_title, pubdate, author, image_article, users.image_avatar, text, likes, comments, access
			FROM users
			INNER JOIN articles on users.login = articles.author WHERE articles.id = '$article_id' and users.access = 1 ORDER BY articles.id ASC";
		$result = mysqli_query($connection, $sql);
		$article = mysqli_fetch_assoc($result);

		return $article;
	}

	function GET_article_by_author ($author) {
		global $connection;
		$sql2 = "SELECT articles.id, title, second_title, pubdate, author, image_article, image_avatar, text, likes, comments
				FROM users
				INNER JOIN articles on author = users.login WHERE '$author' = author";
		$result = mysqli_query($connection, $sql2);
		$user = mysqli_fetch_all($result, MYSQLI_ASSOC);	

		return $user;
	}
?>