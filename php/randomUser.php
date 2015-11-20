<?php

	include_once("config.php");
	session_start();
	


		$counter = 0; 
		if($_SESSION[$webName]['ranking'] =='Admin'){
			for($counter =0; $counter < 100; $counter ++){
			$random = rand();
			$query="INSERT INTO Users (FirstName,LastName, ColBus, Email, Password, Status,JobTitle,TimeStamp,ACode,Ranking)
			VALUES ('$counter','$counter', '$counter', '$random', '$counter', 0, '$counter',$counter,$counter,'User')";
			$result = mysqli_query($con, $query);
			
			}
		}
			header("location: ../index.html"); 
			

?>

