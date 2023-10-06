
<?php

class User
{
  public $ID;
  public $firstName;
  public $lastName ;
  public $userName; 
	public $profileImg; 
  public $dateCreated;
  public $dateLastLoggedIn;
  public $password;
  
  // hashes a password and stores it in the user object
  function set_password($string)//add $password
  {
    $password = password_hash($string, PASSWORD_DEFAULT);
    //return $password;
  }

  // verifies if password passed is equal to password stored in db
  // returns 1 if both passwords are equal, returns 0 otherwise
  function verify_password($string)//$password
  {
    $hashed_string = password_hash($string, PASSWORD_DEFAULT);

    if ($hashed_string == $password){
      return 1;
    }
    else{
      return 0;
    }
  }
}

?> 