<?php
session_start();
include_once("php/config.php");
//SECRETAVATAR SELECTION
print("<div style='width:100%;'>");
if($RELEASE_SECRET_AVATARS&&$_SESSION[$webName]['status']=='loggedIn'){
	printSecretAvatarSelection($con);
}
print("</div>");

//SELECTION MENU

//EVENT DETAILS
	print("<aside class ='rightAside'>");
	printEventInformation();
	printNewsManager($_SESSION[$webName]['authority'], $_SESSION[$webName]['status']);
	print("</div></aside>");		
//DYNAMIC BOX
	print("<article>");
			if ($_SESSION[$webName]['status'] == 'loggedIn') {
				$idUser = $_SESSION[$webName]['idsecretSanta'];
				printLogout($con,$_SESSION[$webName]['idsecretSanta']);
				printUserLoggedIn($_SESSION[$webName]['firstName']);
				printSecretPictureConfig($con,$idUser);
			
				if($_SESSION[$webName]['authority']==1){
					printNews($con,$_SESSION[$webName]['authority']);
				}
			
				//Print GiveWishList
				printGiveWishList($con,$idUser);
				
				//Print User's Wish List
				printUserWishList($con,$idUser);
			
				//Print Admin Gift Management Powers
				if($_SESSION[$webName]['authority']==1){
					adminGiftManagementPowers();
				}
			} 
			else if($_SESSION[$webName]['status'] =='invalidUser'){
				printLogin();
				printInvalidUser();
				printRegister();
				printNews($con,$_SESSION[$webName]['authority']);
			 } 
			else {
				printLogin();
				printNews($con,$_SESSION[$webName]['authority']);
				printRegister();
			}
	print("</article>");
		
//People Currently Attending
	print("<aside class = 'rightAside'>");
	printSpeakers($con, $_SESSION[$webName]['authority'], $_SESSION[$webName]['idsecretSanta']);
	print("</aside>");

		
		
		
		
		
		
		
		function printSecretPictureConfig($con,$idUser){
		print("
			</div>
			");
			$result = mysqli_query($con,"SELECT * FROM secretSanta WHERE idsecretSanta = '$idUser';");
			$size = "height = '128px' width = '128px'";
			$image = "";
			$bioCaption = "";
			while($row = mysqli_fetch_array($result)){
				$image = $row['secretAvatar'];
				$bioCaption = $row['bio'];
			}
			print("
				<div class = 'news'>
					<div class ='secretPicture' style='width:30%;float:left;'>
					<img src = '$image' $size>
					</div>
					<div class = 'secretCaption' style='width:70%;float:right'>
					<b> Brief caption </b><br>
					<textarea id = 'bioCaption' rows='4' style='width:100%;'>"
					. $bioCaption .
					"</textarea>
					<button onclick = 'updateCaption()'>Update caption</button>
					</div>
					<div style='float:left'>
					<form action='php/uploadSecretAvatar.php' method='post' enctype='multipart/form-data'>
					<b>Select file and upload to change secret picture:</b>
					<input type='file' name='fileToUpload' id='fileToUpload'>
					<input type='submit' value='Upload Image' name='submit'>
					</form>
					</div>
				</div>
				
			");
		}
		function printNews($con,$authority){
		print("
			<h1 style = 'text-align:center';><b> News!</b></h1>
			<div class = 'news'>
			");
		
		$results = mysqli_query($con,"SELECT * FROM news ORDER BY id DESC;");
		while($value = mysqli_fetch_array($results)){
			print("<div class='entry'>
			<p><b><u>" . $value[title] . "</u></b>-");
			print("" . $value[news] . "<br><b>". $value['time'] . "</b></p>");
			if($authority == 1){
			print("
			<form action='php/deleteNews.php' style = 'text-align:right;' method='get'>
					<input type = 'hidden'  name ='id' value = '$value[id]' style = 'float = right;' size ='0%' required >
					<input type='submit' id = 'newsRemoveButton'  value = x required>
					</form>
					");
					}
			print("</div>");
		}
		print("
			</div>
			");
		}
		function printUserLoggedIn($firstName){
		print("	<h1 style='text-align:center;'> Welcome Back " . $firstName . "!</h1>
					");
		}
		
		
		//Session variables do not get passed into functions, must be passed through parameter.
		function printLogout($con,$idUser){
			print("
				<div class = 'Logout'>
					<a href = 'php/logOut.php' style ='display: inline-block;float:right; color: white'><b>LOGOUT...</b></a>
				</div>
				");
				
			$result = mysqli_query($con," SELECT giverAssigned FROM secretSanta WHERE idsecretSanta = $idUser");
			$row = mysqli_fetch_array($result);
			if($row[giverAssigned]<0){
			print("<form action='php/deleteUser.php' style ='display: inline-block;float:left' method='get'>
					<input type = 'hidden'  name = 'idRemove' value = '" . $idUser . "' size ='0%' required >
					<input type='submit' value ='Delete Account' required>
					</form>
					");
					}
		}
		function printLogin(){
		print("
				<div class = 'Login'>
					<form action = 'php/loginHandler.php' method = 'get'>
					<b>Already Registered? <br>
					Secret Name: <input type = ' text' name ='loginEmail' size ='10%'>
					Password:</b> <input type = 'password' name = 'loginPassword' size ='10%'>
					<input type='submit' value = 'Login' ID ='buttonLogin'>
					</form>
					<b>There is no password recovery so you better not mess up... derp....</b>
				</div>
			");
		}
		function printInvalidUser(){
		 print("
						<div class = 'invalidUserBox'>
						<h1> Invalid User </h1>
						<p> The Username or Password you have chosen is invalid... </p>
						<p> Make a new user or...</p>
						<p> Think REAL HARD, what was that password...</p>
						</div>
					");
		}
		
		function printRegister(){
			print("
			<div class = 'register'>
				<h1> REGISTER! Yearly Theme: Puppies!</h1>
						<form action='php/formHandler.php' method='get'>
							<div id='top'>
							<p>Please enter your first and last name and is used to tell who is coming to the event --this will not be known to the administrator participating</p>
							<div id='firstName'>
							<b>Real</b> First Name : <br> <input type = 'text' name ='firstName' size ='25%' required >
							</div>
							<div id='lastName'>
							<b>Real</b> Last Name : <br> <input type = 'text' name ='lastName' size ='25%' required >
							</div>
							<div id = 'sex'>
							<b>Your Sexual Identification</b><br>
							  <input type='radio' name='sex' value='male' checked><b>Male</b>
							  <input type='radio' name='sex' value='female'><b>Female</b>
							</div>
							<p>Enter your Secret Santa Name -Theme: Puppies, a name related to this. This will be your login to the site and how people will identify you anonymously. <br>  <b>Login with your credentials after registration to Build your wish list and choose a Secret Puppy Avatar!</b></p>
							<div id='secretName'>
							Secret Login Name! : <br> <input type = 'text' name ='secretName' size ='25%' required >
							</div>
							<div id ='password'>
							Password: <br> <input type='text' name ='password' size ='25.5%' required>
							</div>
							</div>					
							<div style ='text-align:right;'>
							<input type='submit' value = 'Register' ID ='button' required>
							</div>
							</div>
						</form>
						</div>
						");
				}
				
		function printEventInformation(){
			print("
						<div class='EventDetails'>
							<h1>Event Details</h1>
								<p>
								<b>Date:</b> December 18 2016: SUNDAY  <br>
								<b>Time:</b> 2:00pm <br>
								<b>Place:</b> Khoi 's Home <br>
								<b>WISH LIST DUE DATE:<br>December 8, 2016 -One day extension<br></b>
								<p>The List will be distributed when it is due or everyone is done.</p>
								</p>
				");
			}
		function printNewsManager($auth,$status){
			if(($auth == 1)&& $status=='loggedIn'){
				print("			<div style ='text-align:left;'>
								<p><b><u>News BroadCast!</u></b></p>
								<form style='text-align:left;' action='php/addNews.php' method='get'>
								<p><b>Header:</p> <input type = 'text'  name ='title' style = 'float = right;' size ='20%' required ><br>
								<p>News Information  :</b></p> <input type = 'text'  name ='news' style = 'float = right;' size ='20%' >
								<input type='submit' id = 'newsAddButton'  value = 'BroadCast!' required>
								</form>
								</div>");
					}
		}
		function printGiveWishList($con,$idUser){
			//Giver's list to Give
				$result = mysqli_query($con," SELECT giverAssigned FROM secretSanta WHERE idsecretSanta = $idUser");
				$row = mysqli_fetch_array($result);
				//Giver has been assigned
				$giverAssigned = $row[giverAssigned];
				if($giverAssigned !=-1){
				$result = mysqli_query($con,"SELECT giftName, giftPrice, giftNote, giftLocation,id FROM gift WHERE giftId = $giverAssigned");
				$resultName = mysqli_query($con,"SELECT secretName FROM secretSanta WHERE idsecretSanta = $giverAssigned"); 
				$name = mysqli_fetch_array($resultName);
				print("<div class = 'giftTolist'><p class = 'chartHeader'><b>Surprise! You Will Be Gifting " .  $name[secretName] . "</b>!!!</p>");
				print("<p> The list below is his/her Gift List! Make sure you purchase these ahead of time to avoid time delays. Remember the general rules about how much to purchase in the important information section</p>");
					print("
					<div id = 'giverTable'>
					<table>
					<col width='25%'>
					<col width='25%'>
					<col width='1%%'>
					<col width='25%'>
					<tr><td><b>GIFT</b></td><td><b>FIND WHERE</b></td><td><b>PRICE $</b></td><td><b>NOTE</b></td></tr>
				");
				while($row = mysqli_fetch_array($result)){
					print("<tr><td id = 'giftNameTable'>  ");
					print($row[giftName]);
					print("  </td><td id = 'giftLocationTable'>  ");
					if (!filter_var($row[giftLocation], FILTER_VALIDATE_URL) === false) {
						print("<a target=\"_blank\" href=\"");
						print($row[giftLocation]);
						print("\">link</a>");
					} else {
						print($row[giftLocation]);
					}
					print("  </td><td id = 'giftPriceTable'>  ");
					print($row[giftPrice]);
					print("  </td><td id = 'giftNotetable'>  ");
					print($row[giftNote]);
					print(" </td> 
					</tr>");
					
					}
					print("</table></div></div>");
					}
		}
		
		function printUserWishList($con, $idUser){
			print("<div class = 'giftList'><p class = 'chartHeader'>This is your <b>Christmas Wish List</b></p><p style = 'text-align:center;'>Complete your wish list to be rewarded a new avatar!</p>");
				print("
					<div id = 'userTable'>
					<table>
					<col width='25%'>
					<col width='25%'>
					<col width='1%%'>
					<col width='25%'>
					<col width='1%'>
					<tr><td><b>GIFT</b></td><td><b>FIND WHERE</b></td><td><b>PRICE $</b></td><td><b>NOTE</b></td><td><b></b></td></tr>
				");
				
				$result = mysqli_query($con,"SELECT giftName, giftPrice, giftLocation,id, giftNote FROM gift WHERE giftId = $idUser");
				while($row = mysqli_fetch_array($result)){
					print("<tr><td id = 'giftNameTable'>  ");
					print($row[giftName]);
					print("  </td><td id = 'giftLocationTable'>  ");
					if (!filter_var($row[giftLocation], FILTER_VALIDATE_URL) === false) {
						print("<a target=\"_blank\" href=\"");
						print($row[giftLocation]);
						print("\">link</a>");
					} else {
						print($row[giftLocation]);
					}
					print("  </td><td id = 'giftPriceTable'>  ");
					print($row[giftPrice]);
					print("  </td><td id = 'giftNotetable'>  ");
					print($row[giftNote]);
					print("  </td><td id = 'giftControl'>  ");
					if($giverAssigned ==-1 || $adminGiftChange){
					print("
					<form action='php/deleteGift.php' method='get'>
					<input type = 'hidden'  name ='id' value = '$row[id]' style = 'float = right;' size ='0%' required >
					<input type='submit' id = 'tableRemoveButton'  value = X required>
					</form>
					");
					}
					print(" </td> 
					</tr>");
					
					}
					print("</table></div>");
					
					
					
					//The controls
					if($giverAssigned ==-1 || $adminGiftChange){
					print("<p style='text-align:center;'><b><u>Add Gift</u></b></p>");
					print("
					<div id = 'addGift'>
						<form style='text-align:center;' action='php/addGift.php' method='get'>
						
						<div id='top'>
						
						<div id='giftName'>
						<b>Gift Name : <br></b> <input type = 'text' name ='giftName' size ='60%' required >
						</div>
						
						<div id='giftLocation'>
						<b>Location Link/Place : <br></b> <input type = 'text' name ='giftLocation' size ='60%' required >
						</div>
						
						<div id='giftPrice'>
						<b>Price $ -A Number or Decimal Without $ Symbol: <br></b> <input type = 'text' name ='giftPrice' size ='60%' required >
						</div>
						
						<div id='giftNote'>
						<b>Special Note/Instruction: <br></b> <input type = 'text' name ='giftNote' size ='60%'>
						</div>
						
						</div>
						<input type='submit' value = 'Confirm Add' ID ='button' required>
						</div>						
					</form>
					</div>
					");
					}
		}
		
		function adminGiftManagementPowers(){
			
						print("
					<div id = 'adminOption'>
					<form action='php/resetPassList.php' method='get'>
						<input type='submit' style='float:right;' value = 'Delete Pass List' ID ='button' required>
						</div>						
					</form>
					<form action='php/passList.php' method='get'>
						<input type='submit' style='float:left;' value = 'Distribute List' ID ='button' required>
						</div>						
					</form>
					</div></div>
					");
					
		}
		
		function printSpeakers($con, $auth, $userId){
			print("<div class='Speakers'>
				<h1>People Currently Attending</h1>
			");
			$results = mysqli_query($con,"SELECT firstName,status, avatar, lastName, idsecretSanta, giftReq FROM secretSanta");
			$giftReq = 'No';

			while($row = mysqli_fetch_array($results)){
			//if done gift requirement then you get an avatar
			$giftReq = 'No';
			$image = $row['avatar'];
			if(is_null($image)){
				$image = "images/avatars/userIcon.png";
			}
			$size = "height = '128px' width = '128px'";
			if($row['giftReq']==1){
				$giftReq = 'Yes';
			}
			print("
				<div class= 'speakerIndividual'>
						<div class= 'speakerImage'>
							<img class ='speakerPictures' src = '$image' $size>
						</div>
						<div class='speakerCaption'>
							");
			if($auth==1){
				print("<form action='php/deleteUser.php' style ='float:right;' method='get'>
					<input type = 'hidden'  name = 'idRemove' value = '$row[idsecretSanta]' size ='0%' required >
					<input type='submit' value ='Remove' required>
					</form>
					");
			}
			if($row['status'] == 1){
			if($auth==1){
				print("<form action='php/rankDown.php' style ='float:right;' method='get'>
						<input type = 'hidden'  name = 'rankDown' value = '$row[idsecretSanta]' size ='0%' required >
						<input type='submit' value ='Rank' required>
						</form>
						");
					}
				print("<br><br><b><u>Admin<br></u></b>");
				
			}else{
			if($auth==1){
				print("<form action='php/rankUp.php' style ='float:right;' method='get'>
						<input type = 'hidden'  name = 'rankUp' value = '$row[idsecretSanta]' size ='0%' required >
						<input type='submit' value ='Rank' required>
						</form>
						");
						}
				print("<br><br><b><u>User<br></u></b>");
				
				
			}
			print("
					<b>$row[firstName]  $row[lastName]</b><br>
					Has Enough Gifts? <b>{$giftReq}</b>
					</div>
					
					</div>
				");
			if($row['idsecretSanta']==$userId){
				print("
				<form action='php/upload.php' method='post' enctype='multipart/form-data'>
					<b>Select file and upload to change user picture:</b>
					<input type='file' name='fileToUpload' id='fileToUpload'>
					<input type='submit' value='Upload Image' name='submit'>
				</form>
							");
			}
			}
		}
		
		function printSecretAvatarSelection($con){
			$results = mysqli_query($con,"SELECT * FROM secretSanta");
			
			print("<div>");
			print("<h1 style='text-align:center;'><b>Select Who Will You Gift?</b><br></h1>");
			print("<div class = 'secretAvatars' style = 'text-align:center;'>");
			while($row = mysqli_fetch_array($results)){
				$status = "";
				$takenTag = "";
				$idOfPicture = $row[idsecretSanta];
				//print($idOfPicture);
				$results2 = mysqli_query($con,"SELECT idsecretSanta FROM secretSanta WHERE giverAssigned = '$idOfPicture';");
				//var_dump($results2);
				if(!$results2->num_rows == 0){
					$status = "<b>TAKEN</b><br>";
					$takenTag = "taken";
				}
				$image = $row['secretAvatar'];
				if(!is_null($image) && $image != ""){
					print("
					<div class ='secretAvatarSlide'>
					<div class='thumbnail' style='width:15%;float:left;'>
						<div class='caption'>
						  <p>" . "<b>" . $row['secretName'] . "</b>"."</p>
						</div>
						<img class = 'secretAvatar' src='" . $image . "' alt='$takenTag' style='width:100%'>
						<div class='caption' style = 'overflow-y:scroll; max-height:50px;'>
						  <p>" . $status . $row['bio'] ."</p>
						</div>
					</div></div>");
				}
				
			}
			print("</div>
			<div style = 'text-align:center;'>
					<button onclick = selectSecretAvatar() style='text-align:center;' id = 'acceptSecretAvatar'> Accept Selection </button>
			</div>
			</div>");
		}
		
?>
