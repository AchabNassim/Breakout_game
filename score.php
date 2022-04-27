<?php
	include "dbInc/dbCon.php";

	$sql = "SELECT * FROM user ORDER BY score DESC ";
	$result = mysqli_query($conn,$sql);

	$scoreIndex = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Score!</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styleInc/scoreStyle.css">

</head>
<body>
	<h2>Leaderboard<span id="mark"> !<span></h2>
	<div id="table" class="container-sm">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Rank</th>
					<th>Name</th>
					<th>Score</th>
				</tr>
			</thead>
			<tbody>
			
				<?php  while ($row = mysqli_fetch_assoc($result)):
					if ($row['score'] > 0): ?>
						<tr>
						<td><?php echo $scoreIndex ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['score'] ?></td>
					</tr>
						
				<?php
				endif;
				$scoreIndex++;
				endwhile;
				?>	
			</tbody>
		</table>
	</div>
</body>
</html>