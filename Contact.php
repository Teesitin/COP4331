<!-- Establishing Connection-->
<?php

class Contact
{
  private $servername = "localhost";
  private $username = "contact_man";
  private $password = "BxFj&Y4qd!Y6Mw";
  private $database = "cm_db";
  private $table = "contacts";
  protected $db;
  
  public function __construct()
  {
    // Create connection
    $this->db = new mysqli($this->servername, $this->username, $this->password, $this->database);

    // Check connection
    if ($this->db->connect_error)
      die("Connection failed: " . $this->db->connect_error);

    // Contact table
    $sql = "CREATE TABLE IF NOT EXISTS Contact(
    ID INT(6),
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    mobilePhone VARCHAR(15),
    homePhone VARCHAR(15),
    email VARCHAR(120)
    )";
  
    if ($this->db->query($sql) === TRUE) {
      echo "Table Contact created successfully";
      } else {
      echo "Error creating table: " . $this->db->error;
      }
  }
}

?>