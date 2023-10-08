<?php
require('handlers/request_handler.php');
require('../user_controller.php');
require('../User.php');
$Update_info =getRequestInfo();
//checks if data was inputed correctly
if($Updated_info)
{
    $Update_user = new User;
    $Update_user->ID = $Update_info["ID"];
  	$Update_user->firstName = $Updated_info["firstName"];
  	$Update_user->lastName = $Updated_info["lastName"];
  	$Update_user->userName = $Updated_info["userName"]; 
	$Update_user->profileImg = $Updated_info["profileImg"]; 
  	$Update_user->dateCreated = $Update_info["dateCreated"];
  	$Update_user->dateLastLoggedIn = date('Y-m-d H:i:s');
  	$Update_user->password = $Update_info["password"];
    if(update($Update_user)==1)
    {
        
        returnWithInfo($Update_user);
    }
    else
    {
        returnWithError('{"status": "error","error":"Unable to update the user"}}');
    }

}
?>