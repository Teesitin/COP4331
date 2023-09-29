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
            $stmt = $connnection->prepare("SELECT ID,firstName,lastName FROM User WHERE Login=? AND Password =?");// this is a hold
        $stmt->bind_param("ss", $inData["login"], $inData["password"]);
		$stmt->execute();
		$result = $stmt->get_result();
        
            // Code inside this block will execute if the request method is POST
        }
        
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

class contact
{
    public $id;
    public $user_id;
    public $firstName;
    public $lastName;
    public $mobilephone;
    public $homephone;
    public $email;
    public function setcontac($newid,$newuserid,$newfname,$newlname,$newmobile,$newhome,$newemail) {
        while(!(is_int($newid)))
        {
            echo "tpye a number for the contact ID, please!";
            $this->id=trim(fgets(STDIN));
        }
        while(!(is_int($newuserid)))
        {
            echo "tpye a number for the user ID, please!";
            $this->id=trim(fgets(STDIN));
        }/*
        if (is_int($newid) && !empty($newid)) {
            $this->id = $newid;
        } else {
            echo "tpye a number for the  the contact ID, please!";
        }
        if (is_int($newuserid) && !empty($newid)) {
            $this->user_id = $newuserid;
        } else {
            echo "tpye a number for the userID, please!";
        }*/
        $this->firstName = $newfname;
        $this->lastName = $newlname;
        $this->mobilephone = $newmobile;
        $this->homephone = $newhome;
        $this->email = $newemail;
        
    }
}
?>
