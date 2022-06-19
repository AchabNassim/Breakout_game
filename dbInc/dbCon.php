<?php 

session_start();

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "brick_game";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

