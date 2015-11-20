<?php
	include_once("config.php");
	session_start();
	$news = ($_GET['news']);
	$title = ($_GET['title']);
	date_default_timezone_set('America/New_York');
	$time = date("y,m,d,h,m,s");
	print($time);
	if($_SESSION[$webName]['authority'] == 1){
		$result = mysqli_query($con,"INSERT INTO news (`news`, `title`,`time`) VALUES ('$news', '$title','$time');");
		if ($result){
			 header("location: ../index.html"); 
		}
		else{
			Print("Failed");
		}
	}
	   

?>