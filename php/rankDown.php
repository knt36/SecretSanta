<?php
	include_once("config.php");
	session_start();
	$idGift = $_GET["id"];
	$id = $_GET["rankDown"];
	
	if($_SESSION[$webName]['authority'] == 1){
		mysqli_query($con,"UPDATE secretSanta SET status = 0 WHERE idsecretSanta = $id");
	}
	    header("location: ../index.html"); 
?>