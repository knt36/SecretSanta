<?php
include_once("config.php");
session_start();

$selectedAvatar = $_POST["selectedSecretAvatar"];
$userId = $_SESSION[$webName]['idsecretSanta'];
$free = true;
print($selectedAvatar);
//get data if the person has already been taken
$result = mysqli_query($con,"SELECT * FROM secretSanta WHERE giverAssigned = '$selectedAvatar';");
while($row = mysqli_fetch_array($result)){
	//if runs there is someone who has that person
	$free = false;
}


if($selectedAvatar != -1 && $selectedAvatar != $userId && $free){
	$result = mysqli_query($con,"UPDATE secretSanta SET giverAssigned = '$selectedAvatar' WHERE idsecretSanta = '$userId';");
}
header("location: ../index.html"); 
?>