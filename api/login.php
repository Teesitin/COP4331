<?php
include('request_handler.php');
include('user_controller.php');
include('User.php');
include('db.php');
//$inData=getRequestInfo();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform authentication here
	//$connection = new $db;
 $SQL = "SELECT * FROM user WHERE userName = ?";
 $stmt = $db->prepare($SQL);
 $stmt->bind_param("s", $username);
 $stmt->execute();
 $result = $stmt->get_result();
 if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
	if(verify_password($userData["password"])==1)
	{

	}
 } 
 else {
    echo 'the user name typed does not exits.Sign up please.';
	$user = new User();
    $user = create($user);
	echo 'User created';

 }
}





/*$connection=new mysqli("hostname","user","password","database");
if( $connection->connect_error )
	{
		 returnWithError( $connection->connect_error );
	}
    else{
        //option one

            $username = $_POST['username'];
            $password = $_POST['password'];
            $stmt = $connection->prepare("SELECT ID,firstName,lastName FROM User WHERE Login=? AND Password =?");// this is a hold
        $stmt->bind_param("ss", $inData["login"], $inData["password"]);
		$stmt->execute();
		$result = $stmt->get_result();
        //If statement  where the user log in exist
		if( $row = $result->fetch_assoc()  )
		{
			//returnWithInfo( $row['firstName'], $row['lastName'], $row['ID'], $row['profilelmg'], $row['username'],$row['contacs']);
		    $user = returnWithInfo( $row['Name'], $row['ID'], $row['leads'],$row['closed'], $row['sales'], $row['hours'],$row['phone'],$row['email']);

            $userDataJSON= json_encode($user);
			header("Location: menu.php?user=" . urlencode($userDataJSON));
            exit();
		}	

		else
		{
			returnWithError("No Records Found");
		}
	}*/






    


?>