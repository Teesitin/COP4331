<?php
require('handlers/request_handler.php');
require('../user_controller.php');
require('../User.php');

$inData=getRequestInfo();
if ($inData) {
	try {
		$newUser = new User;
        
  		$newUser->firstName = $inData["firstName"];
  		$newUser->lastName = $inData["lastName"];
  		$newUser->userName = $inData["userName"]; 
		$newUser->profileImg = $inData["profileImg"]; 
  		$newUser->dateCreated = $inData["dateCreated"];
  		$newUser->dateLastLoggedIn = date('Y-m-d H:i:s');
  		$newUser->password = $inData["password"];

		if (create($newUser)==1) {
			returnWithInfo($newUser);
		}
		else {
			returnWithError('{"status": "User already exist"}');
		}

	  }
	  catch (Exception $e) {
		returnWithError('{"status": "error", "error" :' + $e +'}');
	}
	  
	
	
}
?>