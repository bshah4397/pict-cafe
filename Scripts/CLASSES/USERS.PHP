<?php
	include_once 'connect.php';
	/**
	* Class for users table
	*/
	class Users extends Connection
	{
		
		function viewUsers()
		{
			$sql = "SELECT * FROM users;";
	 		$result = $this->conn->query($sql);
		    if ($result->num_rows > 0)
		     {
		        // output data of each row
		        while($row = $result->fetch_assoc())
		        {
		            echo $row["UserId"];
		        }
		    }
		    else
		    {
		        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		        die();
		    }
		}
	}

?>