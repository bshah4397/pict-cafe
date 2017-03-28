<?php
	include_once 'connect.php';
	/**
	* Class for users table
	*/
	class Users extends Connection
	{
		
		
		function checkUser($email,$password)
		{
			$sql = "SELECT * FROM user_cred WHERE email ='".$email."' AND password = '".$password."';";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0)
			{
				return "true"; 
		    }
		    else
		    {
		    	return "false";
		    }

		}

		function getName($email)
		{
			$sql = "SELECT name FROM user_details WHERE email ='".$email."';";
			$result = $this->conn->query($sql);
			$row = $result->fetch_assoc();
			return $row["name"];
		}
	}

?>