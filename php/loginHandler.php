




<?php
	include_once("config.php");
	session_start();
	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
	// Check connection
				if (mysqli_connect_errno())
				  {
				  print "<br>Failed to connect to MySQL: <br>" . mysqli_connect_error();
				  }
				else {
					print "<br>Connection Successful<br>";
				}
				
				
	$USER = $_GET["loginEmail"];
	$PASSWORD = $_GET["loginPassword"];
	
	print "User Logged in: $USER<br>";
	print "Password: $PASSWORD<br>";
	$result = mysqli_query($con,"SELECT secretName, password, idsecretSanta, status  FROM secretSanta");
	while ($row = mysqli_fetch_array($result))
		{
			$userFound = 0;
			if((strcmp($PASSWORD,$row[password])==0)&&(strcmp($USER,$row[secretName])==0)){
				$userFound = 1;
				break;
			}
			else {
				print("Login has failed<br>");
			}
		}
		if($userFound ==1){
	
			$_SESSION[$webName]['authority'] = $row[status]; // for Administrator for 1 , user is 0 
		
			$_SESSION[$webName]['status'] = 'loggedIn';
			$_SESSION[$webName]['idsecretSanta'] = $row[idsecretSanta];
			
			$_SESSION[$webName]['firstName'] = $row[secretName];
			$_SESSION[$webName]['lastName'] = $row[password];
			
		}
		else{
			$_SESSION[$webName]['status'] = 'invalidUser';
		}
		
		 header("location: ../index.html"); 
?>




	
