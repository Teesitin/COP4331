<?php
include('request_handler.php');
include('user_controller.php');
include('User.php');
include('db.php');
$inData=getRequestInfo();


 if ($inData) {
    try
	{
      $user = read($inData->username);
	  if($user)
	  {
		if(verify($user->password)==1){
			return sendResultInfoAsJson($user);
		}

	  }
	  else
	  {
		return 	"status" ; "error";
	  }
	}
	catch( error)
	{

	}
	/*if(verify_password($userData["password"])==1)
	{

	}
 } 
 else {
    echo 'the user name typed does not exits.Sign up please.';
	$user = new User();
    $user = create($user);
	echo 'User created';

 }*/
}




?>