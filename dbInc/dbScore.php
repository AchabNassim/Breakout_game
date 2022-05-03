<?php 
include "dbCon.php";

if (!(isset($_SESSION['user']))){
	if (isset($_GET['home'])){
		header('location: ../index.php');
	} else if (isset($_GET['restart'])){
		header('location: ../game.html');
	}
} 

$name = $_SESSION['user'];
$previousScore = $_SESSION['score'];

if(isset($_GET['home'])){
	$score = $_GET['home'];
	if ($previousScore > $score){
		header('location: ../index.php');
	} else {
		$_SESSION['score'] = $score;
		$sql = "UPDATE user SET score ='$score' WHERE name ='$name'";
		mysqli_query($conn, $sql);
		header('location: ../index.php');
	}
} else if(isset($_GET['restart'])){
	$score = $_GET['restart'];
	if ($previousScore > $score){
		header('location: ../game.html');
	} else {
		$_SESSION['score'] = $score;
		$sql = "UPDATE user SET score ='$score' WHERE name ='$name' ";
		mysqli_query($conn, $sql);
		header('location: ../game.html');
	}
}



