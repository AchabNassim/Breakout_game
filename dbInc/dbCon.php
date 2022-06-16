<?php 

session_start();


$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "brick_game";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

if (mysqli_connect_errno()){
	exit("failed to connect to MySQL : " . mysqli_connect_errno());
}
