<!DOCTYPE html>
<html>
<head>
	<base href="//localhost:81/MVC-Test/"/>
</head>
<body>
	<header>
		<a href='/MVC-Test'>Home</a>
		<a href='posts/index'>Posts</a>
	</header>
	<?php 	
		if(isset($_POST['author'])){
			echo $_POST['author'];
		}
	?>
	<?php require_once('routes.php'); ?>

	<footer>
		Copyright
	</footer>
</body>
</html>