<?php
$userData=getRequestInfo();

$connection=new mysqli("hostname","user","password","database");
if( $connection->connect_error )
	{
		 returnWithError( $connection->connect_error );
	}
    else{
        //option one
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $stmt = $connection->prepare("SELECT ID,firstName,lastName FROM User WHERE Login=? AND Password =?");// this is a hold
        $stmt->bind_param("ss", $inData["login"], $inData["password"]);
		$stmt->execute();
		$result = $stmt->get_result();

		if( $row = $result->fetch_assoc()  )
		{
			returnWithInfo( $row['firstName'], $row['lastName'], $row['ID'] );
		}
		else
		{
			returnWithError("No Records Found");
		}
        
            // Code inside this block will execute if the request method is POST
        }
        /*$username = $_POST['username'];
$password = $_POST['password'];

// Sanitize and hash the password for comparison
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Query the database to retrieve user information
$query = "SELECT id, username, password FROM users WHERE username = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if a user with the provided username exists
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify the provided password against the hashed password in the database
    if (password_verify($password, $user['password'])) {
        // Successful login; set session variables, redirect, or perform other actions
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit();
    } else {
        // Incorrect password
        echo "Incorrect password. Please try again.";
    }
} else {
    // User with the provided username does not exist
    echo "User not found. Please check your username.";
}
// Close the database connection
$connection->close();
*/ 
        //control or optionn 2
        


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
    function returnWithInfo( $firstName, $lastName, $id )
	{
		$retValue = '{"id":' . $id . ',"firstName":"' . $firstName . '","lastName":"' . $lastName . '","error":""}';
		sendResultInfoAsJson( $retValue );
	}

class contact
{
    
    
}
?>
