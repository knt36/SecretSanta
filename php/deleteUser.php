<?php
	include_once("config.php");
	session_start();
	$id = $_GET["idRemove"];
	print("ID TO REMOVE " . $id);
	mysqli_query($con,"SET SQL_SAFE_UPDATES = 0");
	mysqli_query($con,"DELETE FROM secretSanta WHERE idsecretSanta = $id"); 	
	mysqli_query($con,"DELETE FROM gift WHERE giftId = $id"); 	
	mysqli_query($con,"SET SQL_SAFE_UPDATES = 1");
	if($_SESSION[$webName]['authority'] != 1){
	if(isset($_SESSION[$webName]['status'])){
	  unset($_SESSION[$webName]['status']);
	}
	
	if(isset($_SESSION[$webName]['authority'])){
	  unset($_SESSION[$webName]['authority']);
	}
	
	if(isset($_SESSION[$webName]['ranking'])){
		unset($_SESSION[$webName]['ranking']);
	}
	
	if(isset($_SESSION[$webName]['idsecretSanta'])){
		unset($_SESSION[$webName]['idsecretSanta']);
	}
	
	if(isset($_SESSION[$webName]['firstName'])){
		unset($_SESSION[$webName]['firstName']);
	}
	
	if(isset($_SESSION[$webName]['lastName'])){
		unset($_SESSION[$webName]['lastName']);
	}
	session_destroy();
	}
	else if($_SESSION[$webName]['idsecretSanta'] == $id ){
		session_destroy();
	}
	
	header("location: ../index.html"); 

?>
