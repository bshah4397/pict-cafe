<?php
	include 'classes/registeration.php';
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$profilePicture = null;
	$token = null;
	$tokenType = null;

	
	$regObj = new Registration();
	$regObj->connect();

	$result = $regObj->updateUserDetails($email,$name,$profilePicture,$token,$tokenType);
	if ($result) {
		//echo "user details updated successfully";
	}
	else{
		echo "error in updateUserDetails";
		die();
	}

	$result = $regObj->updateUserCredentials($email,$password);
	if ($result) {
		//echo "user creds updated successfully";
	}
	else{
		echo "error in updateUserCredentials";
		die();
	}
	header("location:../index.html")
	
?>