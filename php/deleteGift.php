<?php
	include_once("config.php");
	session_start();
	if ($_SESSION[$webName]['status'] == 'loggedIn') {
	$idGift = $_GET["id"];
	$ID = $_SESSION[$webName]['idsecretSanta'];
			mysqli_query($con,"SET SQL_SAFE_UPDATES = 0");
			$result = mysqli_query($con,"DELETE  FROM gift WHERE giftId = $ID AND id = $idGift");
			mysqli_query($con,"SET SQL_SAFE_UPDATES = 1");
			
			if($result>0){
				mysqli_query($con,"UPDATE secretSanta SET numGifts = numGifts-1 WHERE idsecretSanta = $ID");
			}
			$result = mysqli_query($con,"SELECT numGifts FROM secretSanta  WHERE idsecretSanta = $ID");
			$value = mysqli_fetch_array($result);
			$count = $value[numGifts];
			print($count);	
			print("Print works");
			if($count<$wishRequirement){
				mysqli_query($con,"UPDATE secretSanta SET giftReq = 0 WHERE idsecretSanta = $ID");
			}
			}
	   header("location: ../index.html"); 
?>