<?php  

session_start();

include_once('../includes/connection.php');
include_once('../includes/article.php');

$article = new Article;

if (isset($_SESSION['logged_in'])) {
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = $pdo->prepare('DELETE FROM articles WHERE article_id = ?');
		$query->bindValue(1, $id);
		$query->execute();
		header('Location: delete.php');
	}
	$articles = $article->fetch_all();
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Content Management System</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../assets/style.css">
	</head>
	<body>
		<div class="container">
			<a href="index.php" id="logo">Portal</a>
			<br>

			<h4>Select an Article to Delete</h4> 

			<form action="delete.php" method="get">
				<select onchange="this.form.submit();" name="id">
					<?php foreach ($articles as $article) { ?>
						<option value="<?php echo $article['article_id']; ?>">
							<?php echo $article['article_title']; ?>
						</option>
					<?php } ?>
				</select>
			</form>
		</div>
	</body>
	</html>

	<?php
} else {
	header('Location: index.php');
}