<?php

include "dbCon.php";

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email =  $_POST['email'];
	$password = $_POST['password'];

	if(empty($name) || empty($email) || empty($password)){
		echo "failed";
	} else {
		$name = test_input( $_POST['name']);
		$email = test_input($_POST['email']);
		$password = test_input($_POST['password']);

		$check = "SELECT * FROM `user` WHERE email = '$email' ";
		$result = mysqli_query($conn, $check);
		$count = mysqli_num_rows($result);

		if ($count == 1){
			echo "error, already existing email.";
		} else {
			$sql = "INSERT INTO `user`(name, email, password) VALUES ('$name','$email','$password')";
			mysqli_query($conn,$sql);

			header('location: ../login.php');
		}
	}
}