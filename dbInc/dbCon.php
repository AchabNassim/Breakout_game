<?php 

session_start();

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "Sololo223344";
$dbName = "brick_game";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

