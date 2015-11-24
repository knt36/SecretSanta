<?php

	define(DB_HOST, "centralark.org");
	define(DB_USER, "root");
	define(DB_PASSWORD, "48384d4e34Egonehome!");
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
	$webName = 'SAMPLEsecretSanta';
	//Controls
	$adminGiftChange = false;
	
	//DEBUGGER
	$DEBUG = true;
	
	//Notes
	//The Each user has a gift number that is incremented after everytime a gift is added. The number of gifts is not determined dynamically by the number that is in the list.
	
	//Functions
		
			
	//Notes, the passing function may need to be looked at since it may not detect negative values in the if statements.
			
?>
