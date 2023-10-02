<!-- Establishing Connection-->
<?php

class User
{
  // Change these fields if testing on local mysql server
  private $servername = "localhost";
  private $username = "contact_man";
  private $password = "BxFj&Y4qd!Y6Mw";
  private $database = "cm_db";
  private $db;
  
  private function connect()
  {
    // Create connection
      $db = new mysqli($servername, $username, $password, $database);

      // Check connection
      if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
      }
  }

  function createTable()
  {
    connect();

    // User table
    $sql = "CREATE TABLE IF NOT EXISTS User(
    ID INT(6) PRIMARY KEY,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    userName VARCHAR(50),
    profileImg VARCHAR(256),
    dateCreated DATETIME,
    dateLastLoggedIn DATETIME,
    'password' VARCHAR(256)
    )";
  
    if ($db->query($sql) === TRUE) {
      echo "Table User created successfully";
      } else {
      echo "Error creating table: " . $db->error;
      }
  }

  function set_password($string)
  {
    
  }

  function verify_password($string)
  {

  }

}

?>