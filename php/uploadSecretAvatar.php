<?php
include_once("config.php");
session_start();

$target_dir = "../images/uploads/secretAvatars/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$sessionUser = $_SESSION[$webName][idsecretSanta];
$result = mysqli_query($con,"SELECT * FROM secretSanta WHERE idsecretSanta = '$sessionUser';");

while($row = mysqli_fetch_array($result)){
	unlink( "../" . $row[secretAvatar]);
	echo ("../" . $row[secretAvatar]);
}


$location_file = $target_dir . rand() . "_" . $_SESSION[$webName]['idsecretSanta'] . "secretAvatar" . "." . $imageFileType ;


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg"
&& $imageFileType != "gif"  && $imageFileType != "GIF") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $location_file)) {
		$storedLocation = substr($location_file,3);
		echo "stored location" . $storedLocation;
		$sessionUser = $_SESSION[$webName][idsecretSanta];
		$result = mysqli_query($con,"UPDATE secretSanta SET secretAvatar = '$storedLocation' WHERE idsecretSanta = '$sessionUser';");
        //echo "The file ". $location_file . " has been uploaded.";
		//echo "Result of update avatar: " . $result;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

header("location: ../index.html"); 
?>