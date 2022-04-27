<?php 

include 'dbCon.php';

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if(isset($_POST['email'])){
	$email = test_input($_POST['email']);
	$password = test_input($_POST['password']);

	$sql = "SELECT * FROM `user` WHERE email = '$email'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$count = mysqli_num_rows($result);

	if($count == 1){
		if($password == $row['password']){
			$_SESSION['user'] = $row["name"];
			$_SESSION['email'] = $row["email"];
			$_SESSION['score'] = $row["score"];
			header('location: ../index.php');
		} else {
			header('location: ../login.php?error=fail');
		}
	} else {
		header('location: ../login.php?error=fail');
	}
}