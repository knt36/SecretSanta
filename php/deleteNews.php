<?php
	include_once("config.php");
	session_start();
	if ($_SESSION[$webName]['status'] == 'loggedIn' && $_SESSION[$webName]['authority']==1) {
	$idNews = $_GET["id"];
			mysqli_query($con,"SET SQL_SAFE_UPDATES = 0");
			$result = mysqli_query($con,"DELETE  FROM news WHERE id = $idNews");
			mysqli_query($con,"SET SQL_SAFE_UPDATES = 1");
			}
	   header("location: ../index.html"); 
?>