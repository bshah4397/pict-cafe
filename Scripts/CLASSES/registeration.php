<?php
	include_once 'connect.php';
	/**
	* 
	*/
	class Registration extends Connection
	{
		
		function registerUser($user,$pass,$name,$email)
		{
			$sql =  "INSERT INTO users VALUES ('".$user."','".$pass."','".$name."','".$email."');";
			if (mysqli_query($this->conn, $sql)) 
			{
				return 'true';
			}
			else 
			{
				return'false';
			}
		}
	}

?>