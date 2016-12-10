<?php
include_once("config.php");
session_start();
$bio = ($_POST["bio"]);
$sessionUser = $_SESSION[$webName][idsecretSanta];
$result = mysqli_query($con,"UPDATE secretSanta SET bio='$bio' WHERE idsecretSanta='$sessionUser';
");


header("location: ../index.html"); 
?>