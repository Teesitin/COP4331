<?php
$userData=getRequestInfo();

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
			returnWithInfo( $row['firstName'], $row['lastName'], $row['ID'], $row['profilelmg'], $row['username']);
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
    function sendResultInfoAsJson( $obj )
	{
		header('Content-type: application/json');
		echo $obj;
	}
    function returnWithInfo( $firstName, $lastName, $id , $profilelmg )
	{
		$retValue = '{"id":' . $id . ',"firstName":"' . $firstName . '","lastName":"' . $lastName . '","profilelmg":"' . $profilelmg . '","error":""}';
		sendResultInfoAsJson( $retValue );
	}

class contact
{
    
    
}
?>
