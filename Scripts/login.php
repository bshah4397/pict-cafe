<?php
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	@session_start();
	include 'classes/users.php';
	if (isset($_GET["t"])) {
		if ($_GET["t"]==="G") {
			$email = $_GET["email"];
			$password = $_GET["ID"];

		}
		else if($_GET["t"]==="F"){
			$email = $_GET["name"];
			$email = strtolower($email);
			$email = str_replace(" ", ".", $email);
			$email .= "@facebook.com";
			$password = $_GET["ID"];
		}	
	}
	else{
		$email = $_POST["email"];
		$password = $_POST["password"];
	}
	
	$userObj = new Users();
	$userObj->connect();

	$result = $userObj->checkUser($email,$password);
	//echo $result;
	if ($result==="true") {
		//echo "success";
	}
	else{
		//echo "fail";
		die();
	}

	$name = $userObj->getName($email);
	$_SESSION["name"] = $name;
	$_SESSION["email"] = $email;
	$_SESSION["pic"] = $userObj->getImg($email);
	//echo "before";
	header("location:../pages/dash.php");
	//echo "after";
?>
