<?php
$connection=new mysqli("hostname","user","password","database");
if( $connection->connect_error )
	{
		returnWithError( $connection->connect_error );
	}
    else{

    }
    function getRequestInfo()
	{
		return json_decode(file_get_contents('php://input'), true);
	}
/*class WUser {
    // Class properties (variables)
    
    
    public $firstName;
    public $lastName;
    public $username;
    public $profilemg;
    public $password;
    $ID = 0;
	$firstName1 = "";
	$lastName2 = "";
    public function setUser($newid,$newfname,$newlname,$newuser_name,$newprofilemg,$newpassword) {
        while(!(is_int($newid)))
        {
            echo "tpye a number for the userID, please!";
            $this->id=trim(fgets(STDIN));
        }
        
        $this->firstName = $newfname;
        $this->lastName = $newlname;
        $this->username = $newuser_name;
        $this->profilemg = $newprofilemg;
        $this->password = $newpassword;
        
    }
    
    

    //public

    // Class methods (functions)
    public function myMethod() {
        // Method code here
    }
}*/
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
