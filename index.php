<?php  

include_once('includes/connection.php');
include_once('includes/article.php');
//echo time();

$article = new Article;
$articles = $article->fetch_all();

//print_r($articles);

//echo md5('password');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Content Management System</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/style.css" />
</head>
<body>
	<div class="container">
		<a href="index.php" id="logo">Portal</a>
		<ol>
			<?php foreach ($articles as $article) { ?>
			<li>
				<a href="article.php?id=<?php echo $article['article_id']; ?>">
					<?php echo $article['article_title']; ?>
				</a> 
				- <small>
					posted <?php echo date('l jS', $article['article_timestamp']); ?>
				  </small>
				
			</li>
			<?php } ?>
		</ol>
		<br>
		<small>
			<a href="admin">admin</a>
		</small>
	</div>
</body>
</html>