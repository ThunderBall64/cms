<?php  

try {
	$pdo = new PDO('mysql:host=localhost;dbname=cms', 'root', '');
} catch (PDOExepction $e) {
	exit('Database Error');
}

//echo "Successfully connected to MySQL Server <br /> <br />"; 



?>