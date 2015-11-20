<?php
	include_once("config.php");
	session_start();

	
	if(isset($_SESSION[$webName])){
	  unset($_SESSION[$webName]);
	}
	header("location: ../index.html"); 



?>