<?php
$inData=getRequestInfo();

$connection=new mysqli("hostname","user","password","database");
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
	}
		
            
        


    
    function getRequestInfo()
	{
		return json_decode(file_get_contents('php://input'), true);
	}
    function returnWithError( $err )
	{
		$retValue = '{"id":0,"firstName":"","lastName":"","error":"' . $err . '"}';
		sendResultInfoAsJson( $retValue );
	}

	function sendResultInfoAsJson($obj) {
		header('Content-type: application/json');
		echo $obj; // Echo the JSON data to send it as the HTTP response
	}

	function returnWithInfo($Name,$id,$leads, $closed,$sales,$hours,$phone,$email) {
		$retValue = '{"id":' . $id . ',"firstName":"' . $Name . '","leads":"' . $leads . '","closed":"' . $closed . '","sales":"' . $sales . '","hours":"' . $hours . '","phone":"' . $phone . '","email":"' . $email .'","error":""}';
		return $retValue; // Return the JSON data
	}
	


?>
