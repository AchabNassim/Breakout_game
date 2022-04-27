<?php 
	include "dbInc/dbCon.php";

	if (isset($_SESSION['user'])){
		header('location: index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="styleInc/regStyle.css">
</head>
<body>

	<h2>Log in<span id="mark"> !<span></h2>
	
	<div id="container">
		<form action="dbInc/dbLog.php" method="POST">
			<div>
				<label for="email"></label>
				<input type="text" class="input" name="email" id="email" placeholder="Please enter your email">
				<p id="emailV"></p>
			</div>
			<div>
				<label for="password"></label>
				<input type="password" class="input" name="password" id="password" placeholder="Please enter your password">
				<p id="passwordV"></p>
			</div>
			<div>
				<input type="submit" name="submit" value="Log in" id="login">
				<?php if (isset($_GET['error'])): ?>
					<p id="error">Wrong email or password</p>
				<?php endif; ?>
			</div>
			<p id="create">Don't have an account yet? <a href="register.html">Create one ></a></p>
		</form>
	</div>
</body>
</html>