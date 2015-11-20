<?php
	include_once("config.php");
	session_start();
	if($_SESSION[$webName]['authority'] == 1){
		$result = mysqli_query($con,"UPDATE secretSanta SET giverAssigned = -1");
		if ($result){
			 header("location: ../index.html"); 
		}
		else{
			Print("Failed");
		}
	}
	   

?>