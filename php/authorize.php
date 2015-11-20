<?php
	include_once("config.php");
	session_start();
	
	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
			// Check connection
				if (mysqli_connect_errno())
				  {
				  echo "<br>Failed to connect to MySQL: " . mysqli_connect_error();
				  }
				else {
					print "<br>Connection Successful<br>";
				}
				
			$ACodex = $_GET["authorizationCode"];
			$TimeFrame = 120*60;
				
				
		print("ACode is $ACodex");
		$userAuthorized = 0;
		$result = mysqli_query($con,"SELECT ACode, TimeStamp FROM Users");
		while ($row = mysqli_fetch_array($result))
		{
			$timer = strtotime("now")-$row[TimeStamp];
			if((strcmp($ACodex,$row[ACode])==0)){
				print("Timer is: $timer");
			if((strtotime("now")-$row[TimeStamp])<$TimeFrame){
				print("Checking $row[ACode]");
				$userAuthorized = 1;
				break;
				}
			}
		}
		if($userAuthorized ==1){
			$_SESSION[$webName]['status'] = 'authorized';
			mysqli_query($con,"UPDATE Users SET Status =1 WHERE ACode =$ACodex");
		}

		
		header("location: ../index.html"); 
?>