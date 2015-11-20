
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
				//Changing Variables
				$ID = $_GET['ID'];
				$firstName = $_GET["firstName"];
				$lastName= $_GET["lastName"];
				$colBus=$_GET["College/Bussiness"];
				$email=$_GET["workEmail"];
				$jobTitle=$_GET["jobTitle"];
				$passWord = $_GET["password"];

				$result = mysqli_query($con,"UPDATE Users SET FirstName = '$firstName', LastName = '$lastName', ColBus = '$colBus', Email = '$email', JobTitle = '$jobTitle', Password = '$passWord' WHERE id =$ID");
						
				if($result){
				print("Success!");
				}
				else{
				print("Failure");
				}
				header("location: ../index.html"); 
	
?>




	