<?php
	include_once("config.php");
	session_start();
	
	if ($_SESSION[$webName]['status'] == 'loggedIn') {
	$giftName = ($_GET["giftName"]);
	$giftLocation = ($_GET["giftLocation"]);
	$giftPrice = $_GET["giftPrice"];
	$giftNote = ($_GET["giftNote"]);
	
	$ID = $_SESSION[$webName]['idsecretSanta'];
	
			$result = mysqli_query($con,"INSERT INTO `gift` (`giftId`, `giftName`, `giftLocation`, `giftPrice`,`giftNote`) VALUES ($ID, '$giftName', '$giftLocation', $giftPrice,'$giftNote')");
			if($result>0){
				mysqli_query($con,"UPDATE secretSanta SET numGifts = numGifts+1 WHERE idsecretSanta = $ID");
			}
			$result = mysqli_query($con,"SELECT numGifts , avatar FROM secretSanta  WHERE idsecretSanta = $ID");
			$value = mysqli_fetch_array($result);
			$count = $value[numGifts];
			print($count);
			print_r($result);
			print("Print works");
			if($count>=$wishRequirement){
				if($value['avatar']==0){
				$randNum = rand(1,$maxAvatars);
					mysqli_query($con,"UPDATE secretSanta SET avatar = $randNum WHERE idsecretSanta = $ID");
				}
				mysqli_query($con,"UPDATE secretSanta SET giftReq = 1 WHERE idsecretSanta = $ID");
			}
	}
	    header("location: ../index.html"); 

?>