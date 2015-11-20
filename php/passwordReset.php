<?php
	include_once("config.php");
	session_start();
	
	$EMAIL= $_GET['email'];
	
	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
			// Check connection
				if (mysqli_connect_errno())
				  {
				  echo "<br>Failed to connect to MySQL: " . mysqli_connect_error();
				  }
				else {
					print "<br>Connection Successful<br>";
				}
				
		
				
		if($_SESSION[$webName]['status'] == 'passAuthorize'){
				$resetCode = $_GET['passAuthorization'];
				$TimeFrame = 120*60;
				$result = mysqli_query($con,"SELECT ACode, TimeStamp, Email FROM Users");
					while ($row = mysqli_fetch_array($result))
					{
						if((strcmp($resetCode,$row[ACode])==0)){
						$timer = strtotime("now")-$row[TimeStamp];
						print("The timer $timer is timers");
							if((strtotime("now")-$row[TimeStamp])<$TimeFrame){
								print("Checking $row[ACode]");
								$_SESSION[$webName]['Email'] = $row[Email];
								$userAuthorized = 1;
									break;
							}
						}
					}
		
					if($userAuthorized ==1){
						$_SESSION[$webName]['status'] = 'authorized';
					}
					else{
						print("Password Reset Rejected!");
						
					}
		}
		else if ($_SESSION[$webName]['status'] == 'emailAuthorize'){
		$result = mysqli_query($con,"SELECT Email, Status FROM secretSanta");
		while ($row = mysqli_fetch_array($result))
		{
			$userFound = 0;
			if((strcmp($EMAIL,$row[Email])==0)&& ($row[Status]==1)){
				$userFound = 1;
				break;
			}
		}
		
		$ACode = rand();
		$Time_stamp = strtotime("now");
		if($userFound ==1){
			//Send confirmation email
							$_SESSION[$webName]['status'] = 'passAuthorize';
							mysqli_query($con,"UPDATE `Users` SET `ACode`='$ACode'  WHERE `Email`='$EMAIL'");
							mysqli_query($con,"UPDATE `Users` SET `TimeStamp`=$Time_stamp WHERE `Email`='$EMAIL'");
							$_SESSION[$webName]['emailChange'] = $EMAIL;
							$to      = $EMAIL;
							$subject = 'Password Reset Email You have 120 minutes';
							$message = 'In the website enter Reset Code:';
							$message = $message . $ACode;
							$headers = 'From: kntran10@gmail.com' . "\r\n" .
							'Reply-To: kntran10@gmail.com' . "\r\n" .
							'X-Mailer: PHP/' . phpversion();

							mail($to, $subject, $message, $headers);
							
							print("The Password Reset Email has been Set. Please use the reset code in the email.");
		}
		
		else{
			$_SESSION[$webName]['status'] = 'emailAuthorize';
		
	}
		}
		else if($_SESSION[$webName]['status'] == 'newPass'){
		
			$Email = $_SESSION[$webName]['emailChange'];
			$newPass = $_POST["newPass"];
			mysqli_query($con,"UPDATE `Users` SET `Password`='$newPass' WHERE ( `Email`='$Email');");
			$_SESSION[$webName]['status'] = 'passChanged';
		
		}
		else{
			$_SESSION[$webName]['status'] = 'emailAuthorize';
		}
		
		header("location: ../index.html"); 
		
			
			
			
			
?>
