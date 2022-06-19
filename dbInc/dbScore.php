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
$userId = $_SESSION['userId'];

if(isset($_GET['home'])){
	$userId = $_SESSION['userId'];
	$score = $_GET['home'];
	$date = date('Y-m-d');
	$level = $_GET['level'];
	$timeSpent = $_GET['interval'];
	$_SESSION['score'] = $score;

	$sql = "INSERT INTO `game`(userId, date, timeSpent, score, reachedLevel) VALUES ('$userId','$date','$timeSpent','$score', '$level')";
	mysqli_query($conn, $sql);
	header('location: ../index.php');
}

else if (isset($_GET['restart'])){
	$userId = $_SESSION['userId'];
	$score = $_GET['restart'];
	$date = date('Y-m-d');
	$level = $_GET['level'];
	$timeSpent = $_GET['interval'];
	$_SESSION['score'] = $score;

	$_SESSION['score'] = $score;
	$sql = "INSERT INTO `game`(userId, date, timespent, score, reachedLevel) VALUES ('$userId','$date','$timeSpent','$score', '$level')";
	mysqli_query($conn, $sql);
	header('location: ../game.html');
}



