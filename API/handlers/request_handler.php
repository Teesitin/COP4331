<?php 
function getRequestInfo()
	{
		return json_decode(file_get_contents('php://input'), true);
	}

	function sendResultInfoAsJson( $obj )
	{
		header('Content-type: application/json');
		echo $obj;
	}
	
	function returnWithError( $err )
	{
		sendResultInfoAsJson( $err );
	}
	
	function returnWithInfo( $obj )
	{
		$obj= json_encode($obj);
        sendResultInfoAsJson($obj);
		
	}
?>
