<?php
	echo $_GET["name"]."<br>";
	echo $_GET["ID"]."<br>";
	echo $_GET["email"]."<br>";
	echo $_GET["t"]."<br>";
	echo $_GET["img"]."<br>";

	if($_GET["t"]==="F"){
		$email = $_GET["name"];
		$email = strtolower($email);
		$email = str_replace(" ", ".", $email);
		$email .= "@facebook.com";
		echo $email;
		$img = "../assets/avatar1.png";
	}
?>