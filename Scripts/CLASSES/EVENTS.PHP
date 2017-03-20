<?php
	include_once 'connect.php';
	/**
	* Class for events table
	*/
	class Events extends Connection
	{
		
		function viewEvents()
		{
			$sql = "SELECT * FROM events;";
			$result = $this->conn->query($sql);
		    if ($result->num_rows > 0)
		     {
		        // output data of each row
		        while($row = $result->fetch_assoc())
		        {
		            echo $row["userId"];
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