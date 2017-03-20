<?php
	include_once 'connect.php';
	/**
	* 
	*/
	class Login extends Connection
	{
		
		function checkUser($user,$pass)
		{
			$sql = "SELECT * FROM users WHERE UserId = '101' And Password = 'pass';";
	 		$result = $this->conn->query($sql);
		    if ($result->num_rows > 0)
		    {
		    	 // while($row = $result->fetch_assoc())
		      //   {
		      //       echo $row["UserId"];
		      //   }
		        
		        return 'true';
		    }
		    else
		    {
		        return 'false';
		    }
		    //echo $result->num_rows;
		}
	}

?>