<?php 
	
	include "dbInc/dbCon.php";
	
	$connected = false;

	if (isset($_SESSION['user'])){
		$connected = true;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome!</title>
	<link rel="stylesheet" href="styleInc/main.css">
</head>
<body>
	<div id="container">
		<div>
			<a href="game.html"><button id="startGame" class="button valid">Start Game</button></a>
		</div>
		<?php if ($connected) : ?>
			<div>
				<a href="dbInc/logOut.php"><button id="logOut" class="button">Log Out</button></a>
			</div>
			<div>
				<a href="leaderboard.php"><button id="score" class="button valid">Leaderboard</button></a>
			</div>
			<div>
				<!-- You can only check the game suggestions if your score is bigger than 10 -->
				<a href="score.php"><button id="suggestions" class="button valid">Game Stats</button></a>
			</div>

		<!--  if the user is not connected change the interface.  -->

		<?php else : ?>

			<div>
				<a href="login.php"><button id="login" class="button valid">Login</button></a>
			</div>
			<div>
				<button id="noScore" class="button">Leaderboard</button>
				<p id="loggedOut"></p>
			</div>
			<div>
				<button id="noSuggestion" class="button" >Game Stats</button>
				<p id="invalidScore"></p>
			</div>

		<?php endif; ?>
	</div>

	<script type="text/javascript" src="scripts/main.js"></script>
</body>
</html>