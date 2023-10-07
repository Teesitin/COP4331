<?php
require('handlers/request_handler.php');
require('../user_controller.php');
<<<<<<< HEAD
require('../User.php');
require('../db.php');
$inData=getRequestInfo();


 if ($inData) {
    try
	{
      $user = read($inData->username);
	  if($user)
	  {
		if($user->verify_password($inData["username"])==1){
			
			return returnWithInfo($user);
=======

$inData=getRequestInfo();

if ($inData) {
	try {
		$user = read($inData["userName"]);

		if ($user) {
			if ($user->verify_password($inData["password"]) == 1) {
				$user->dateLastLoggedIn = date('Y-m-d H:i:s');
				update($user);
				returnWithInfo($user);

			}
			else if ($user->verify_password($inData["password"]) == 0){
				returnWithError('{"status":"error", "error":"Password does not match"}');
			}
		}
		else {
			returnWithError('{"status": "No User"}');
>>>>>>> 32b99b27cac73570795eeaa348b0c82cfd13d997
		}

	  }
	  else
	  {
		returnWithError('{"status"; "error"}');
	  }
	}
<<<<<<< HEAD
	catch(Exception $e)
	{
		returnWithError('{"status": "error", "error" : '+ $e +'}');
	}
	
}




=======
	catch (Exception $e) {
		returnWithError('{"status": "error", "error" :' + $e +'}');
	}
}

>>>>>>> 32b99b27cac73570795eeaa348b0c82cfd13d997
?>