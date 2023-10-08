<?php
require('handlers/request_handler.php');
require('../user_controller.php');

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
		}

	  }
	  catch (Exception $e) {
		returnWithError('{"status": "error", "error" :' + $e +'}');
	}
	  
	
	
}

?>