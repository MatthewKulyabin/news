<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Главная</title>
	<style>
		li {
			display: inline;
			margin-right: 1%;
		}
	</style>
</head>
<body>
	<nav>
		<ul style="display:inline">
			<li><a href="/">Main</a></li>
			<li><a href="/login">Login</a></li>
			<li><a href="/signup">Sign Up</a></li>
			<li><a href="/admin">Admin</a></li>
		</ul>
	</nav>
	<?php include 'application/views/'.$content_view; ?>
</body>
</html>

