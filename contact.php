<?php

class Contact
{
  public $ID;
  public $userID;
  public $firstName;
  public $lastName;
  public $mobilePhone;
  public $homePhone;
  public $email;
  
  public function __construct($ID, $userID, $firstName, $lastName, $mobilePhone, $homePhone, $email)
  {
      $this->ID = $ID;
      $this->userID = $userID;
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->mobilePhone = $mobilePhone;
      $this->homePhone = $homePhone;
      $this->email = $email;
  }
}

?>