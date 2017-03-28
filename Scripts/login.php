<?php
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	@session_start();
	include 'classes/users.php';

	$email = $_POST["login_email"];
	$password = $_POST["login_password"];

	$userObj = new Users();
	$userObj->connect();

	$result = $userObj->checkUser($email,$password);
	//echo $result;
	if ($result==="true") {
		echo "success";
	}
	else{
		echo "fail";
		die();
	}

	$name = $userObj->getName($email);
	$_SESSION["name"] = $name;
	$_SESSION["email"] = $email;
	header("location:../pages/dash.php")
?>