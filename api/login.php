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
			//returnWithInfo( $row['firstName'], $row['lastName'], $row['ID'], $row['profilelmg'], $row['username'],$row['contacs']);
		    $user = returnWithInfo( $row['firstName'], $row['lastName'], $row['ID'],$row['password'], $row['profilelmg'], $row['username']);;
            header("Location: Retreive.php?user=" . urlencode($user));
            exit();
		}
		/*if ($row = $result->fetch_assoc()) {
			if ($result->num_rows > 0) {
				echo "<table border='1'>";
				echo "<tr><th>ID</th><th>Name</th><th>Lastname</th><th>Email</th><th>Phone</th></tr>";
				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["id"] . "</td>";
					echo "<td>" . $row["name"] . "</td>";
					echo "<td>" . $row["lastname"] . "</td>";
					echo "<td>" . $row["email"] . "</td>";
					echo "<td>" . $row["phone"] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
			} else {
				echo "No contacts found.";
			}*/
			/*$user = returnWithInfo($row['firstName'], $row['lastName'], $row['ID'],$row['password'], $row['profilelmg'],$row['username']);
			sendResultInfoAsJson($user); // Send the JSON data as the HTTP response
			//	tHIS Json data will be use in the retreiveC php*/
			
		
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
    /*function sendResultInfoAsJson( $obj )
	{
		header('Content-type: application/json');
		//echo $obj;
		return $obj;
	}*/
	function sendResultInfoAsJson($obj) {
		header('Content-type: application/json');
		echo $obj; // Echo the JSON data to send it as the HTTP response
	}
    /*function returnWithInfo( $firstName, $lastName, $id , $profilelmg )
	{
		$retValue = '{"id":' . $id . ',"firstName":"' . $firstName . '","lastName":"' . $lastName . '","profilelmg":"' . $profilelmg . '","error":""}';
		sendResultInfoAsJson( $retValue );
	}*/
	function returnWithInfo($firstName, $lastName, $id,$password, $profileImg,$username) {
		$retValue = '{"id":' . $id . ',"firstName":"' . $firstName . '","lastName":"' . $lastName . '","password":"' . $password . '","profileImg":"' . $profileImg . '","username":"' . $username . '",,"error":""}';
		return $retValue; // Return the JSON data
	}
	


?>
