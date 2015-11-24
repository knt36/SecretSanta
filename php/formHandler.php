<?php

	include_once("config.php");
	session_start();
	

		$firstName = ($_GET["firstName"]);
		$lastName = ($_GET["lastName"]);
		$secretName = ($_GET["secretName"]);
		$password= ($_GET["password"]);
		$sex = ($_GET["sex"]);
		//Test Variables mysql_real_escape_string
		
		// print($firstName."<br>");
		// print($lastName."<br>");
		 //print($secretName."<br>");
		 //print($password."<br>");
		
		$time_stamp = strtotime("now");
		$ACode = rand();

			$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
			// Check connection
				if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }
				else {
						$query="INSERT INTO secretSanta (`firstName`, `lastName`, `secretName`, `password`, `sex`) VALUES ('$firstName', '$lastName', '$secretName', '$password', '$sex');";
						$result = mysqli_query($con, $query);
						$_SESSION[$webName]['status'] = 'authorized';
				}


					
					header("location: ../index.html"); 
			
					

			
			

?>

