<?php
	include_once("config.php");
	session_start();
			error_reporting( E_ALL );
			function passList($con){
			$giverLot = mysqli_query($con,"SELECT idsecretSanta FROM secretSanta  WHERE giftReq = 1 AND giverAssigned= -1 ORDER BY RAND()");
			$recieverLot = mysqli_query($con,"SELECT idsecretSanta, giverAssigned FROM secretSanta  WHERE giftReq = 1");
			
			if(mysqli_num_rows($giverLot) <=1){
				print("Not enough people are ready or available, no pairing possible. Could be result of a deadlock or everyone is already paired<br>");
			}
			
			$giver[] =NULL;
			$reciever[] = NULL;
			
			while($valueReciever = mysqli_fetch_assoc($recieverLot)){
				while($valueGiver= mysqli_fetch_assoc($giverLot)){
					if(($valueReciever[idsecretSanta] != $valueGiver[idsecretSanta]) && ($valueReciever[giverAssigned]<0)){
						print($valueReciever[idsecretSanta] . "was given to " . $valueGiver[idsecretSanta] . "changed <br>");
						mysqli_query($con,"UPDATE secretSanta SET giverAssigned = '{$valueReciever['idsecretSanta']}' WHERE idsecretSanta = '{$valueGiver['idsecretSanta']}'");
						
						break;
					}
					else{
						print("The value is equal <br>");
						print($valueReciever[idsecretSanta] . " Reciever was equal to Giver " . $valueGiver[idsecretSanta] . "<br>");
					}
				}
				$giverLot = mysqli_query($con,"SELECT idsecretSanta FROM secretSanta  WHERE giftReq = 1 AND giverAssigned = -1 ORDER BY RAND()");
			}
			
			$giverLot = mysqli_query($con,"SELECT idsecretSanta, giverAssigned FROM secretSanta  WHERE giftReq = 1 AND giverAssigned = -1;");
			print("Number in Lot " . mysqli_num_rows($giverLot));
			if ( mysqli_num_rows($giverLot) >0){
				print("Failed, There is a dead lock<br>");
				
				//resets the list
				$result = mysqli_query($con,"UPDATE secretSanta SET giverAssigned = -1");
				passList($con);
				//header("location: passList.php"); 
			}
			else{
			print("Success!<br>");
			}
			//header("location: ../index.html"); 
			}
			
			if($_SESSION[$webName]['authority'] == 1){
			passList($con);
			}

?>