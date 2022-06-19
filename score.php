<?php
	include "dbInc/dbCon.php";

	$id = $_SESSION['userId'];
	$sql = "SELECT * FROM game
			INNER JOIN user ON user.userId = game.userId WHERE user.userId = '$id'";
	$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>stats!</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styleInc/scoreStyle.css">

</head>
<body>
	<h2>Game Stats<span id="mark"> !<span></h2>
	<a href="index.php"><p>← Home</p></a>
	<div id="table" class="container-sm">
		<table class="table table">
			<thead>
				<tr>
					<th>Game</th>
					<th>Date</th>
					<th>Time Spent</th>
					<th>Score</th>
					<th>Level</th>
				</tr>
			</thead>
			<tbody>
			
				<?php  while ($row = mysqli_fetch_assoc($result)):
					if ($row['score'] > 0): ?>
						<tr>
						<td><?php echo $row['gameId'] ?></td>
						<td><?php echo $row['date'] ?></td>
						<td><?php echo $row['timeSpent'] ?>s</td>
						<td><?php echo $row['score'] ?></td>
						<td><?php echo $row['reachedLevel'] ?></td>
					</tr>
				<?php
				endif;
				endwhile;
				?>	
			</tbody>
		</table>
	</div>
</body>
</html>