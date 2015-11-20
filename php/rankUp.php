<?php
	include_once("config.php");
	session_start();
	$id = $_GET["rankUp"];
	
	if($_SESSION[$webName]['authority'] == 1){
		mysqli_query($con,"UPDATE secretSanta SET status = 1 WHERE idsecretSanta = $id");
	}
	    header("location: ../index.html"); 
?>