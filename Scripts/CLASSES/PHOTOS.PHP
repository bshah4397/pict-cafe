<?php
	include_once 'connect.php';
	/**
	* Class for photos table
	*/
	class Photos extends Connection
	{	

		function viewPhotos()
		{
			$sql = "SELECT * FROM photos;";
			$result = $this->conn->query($sql);
		    if ($result->num_rows > 0)
		    {
		        // output data of each row
		        while($row = $result->fetch_assoc())
		        {
		            echo $row["eventId"];	            
					echo '<img src="data:image/png;base64,'.base64_encode( $row['photo'] ).'"/>';
		        }
		    }
		    else
		    {
		        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		        die();
		    }
		}
		function uploadPhoto($event,$image)
		{
			$sql =  "INSERT INTO photos VALUES ('$image','$event');";
			if (mysqli_query($this->conn, $sql)) 
			{
				echo "success";
				//return 'true';
			}
			else 
			{
				  echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
				//return'false';
			}	
		}
	}

?>