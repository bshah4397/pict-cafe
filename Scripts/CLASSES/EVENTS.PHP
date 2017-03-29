<?php
	include_once 'connect.php';
	/**
	* Class for events table
	*/
	class Events extends Connection
	{
		
		function addEvent($eventName,$eventDesc,$eventDate,$eventLocation,$eventCreator)
		{
			$sql = "INSERT INTO event (event_name,event_location,event_date,event_description,event_creator) VALUES ('".$eventName."','".$eventLocation."','".$eventDate."','".$eventDesc."','".$eventCreator."');";
			//echo $sql;

			if (mysqli_query($this->conn, $sql)) 
			{
				return 'true';
				
			}
			else 
			{
				
				return'false';
			}
		}
		function getId($eventName,$eventCreator)
		{
			$sql = "SELECT MAX(event_id) FROM event WHERE event_name LIKE '".$eventName."' AND event_creator LIKE '".$eventCreator."';";
			//echo $sql;
			$result = $this->conn->query($sql);
			$row = $result->fetch_assoc();
			return $row["MAX(event_id)"];
		}
		function getEvent($id)
		{
			$sql = "SELECT event_name,event_date FROM event WHERE event_id = ".$id.";";
			//echo $sql;
			$events = array();
			$result = $this->conn->query($sql);
			//$row = $result->fetch_assoc();
			// print_r($row);
			$row = $result->fetch_assoc();	
				$events[0] = $row["event_name"];
				$events[1] = $row["event_date"];
		
			return $events;
		}
		function getAllEvents($email)
		{
			$sql = "SELECT event_id,event_name,event_date FROM event WHERE event_creator LIKE '".$email."' ORDER BY event_date DESC;";
			//echo $sql;
			$events = array();
			$k=0;
			$result = $this->conn->query($sql);
			//$row = $result->fetch_assoc();
			// print_r($row);
			while($row = $result->fetch_assoc()){
				$events[$k][0] = $row["event_name"];
				$events[$k][1] = $row["event_date"];
				$events[$k][2] = $row["event_id"];
				$k++;
			}
			//print_r($events);
			return $events;
		}


	}
	
?>