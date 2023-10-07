<?php
require('handlers/request_handler.php');
require('../user_controller.php');
require('../User.php');
require('../db.php');
$inData=getRequestInfo();


 if ($inData) {
    try
	{
      $user = read($inData->username);
	  if($user)
	  {
		if(verify_password($user->password)==1){
			$user->dateLastLoggedIn = update();
			return returnWithInfo($user);
		}

	  }
	  else
	  {
		returnWithError('{"status"; "error"}');
	  }
	}
	catch(Exception $e)
	{
		returnWithError('{"status": "error", "error" : '+ $e +'}');
	}
	
}




?>