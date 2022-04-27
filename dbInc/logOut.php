<?php 
	include "dbCon.php";
	
	session_destroy();
	
	header('location: ../index.php');

?>