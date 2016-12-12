<?php
	define(DB_HOST, "127.0.0.1");
	define(DB_USER, "root");
	define(DB_PASSWORD, "48384d4e34Fgonehome!pz3vex");
	define(DB_DATABASE, "secretSanta");
	 $con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
	
	if (mysqli_connect_errno())
				  {
				  print "<br>Failed to connect to MySQL: <br>" . mysqli_connect_error();
				  }
				else {
					
				}
	//CONSTANTS
	$wishRequirement = 3;
	$maxAvatars = 6;
	$webName = 'STAsecretSanta';
	$DEFAULT_AVATAR = 'images/userIcon.png';
	$DEFAULT_SECRETAVATAR = 'images/userIcon.png';
	$RELEASE_SECRET_AVATARS = true;
	//Controls
	$adminGiftChange = true;
	
	//DEBUGGER
	$DEBUG = true;
	
	//Disable caching
	
	
	//Notes
	//The Each user has a gift number that is incremented after everytime a gift is added. The number of gifts is not determined dynamically by the number that is in the list.
	
	//Functions
		
			
	//Notes, the passing function may need to be looked at since it may not detect negative values in the if statements.
			
?>
