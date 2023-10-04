<!-- Establishing Connection-->
<?php

class Contact
{
  // Change these fields if testing on local mysql server
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

  // Create
  public function createContact($firstName, $lastName, $mobilePhone, $homePhone, $email)
  {
      $firstName = $this->db->real_escape_string($firstName);
      $lastName = $this->db->real_escape_string($lastName);
      $mobilePhone = $this->db->real_escape_string($mobilePhone);
      $homePhone = $this->db->real_escape_string($homePhone);
      $email = $this->db->real_escape_string($email);

      $sql = "INSERT INTO " . $this->table . " (firstName, lastName, mobilePhone, homePhone, email) VALUES ('$firstName', '$lastName', '$mobilePhone', '$homePhone', '$email')";

      if ($this->db->query($sql) === TRUE) {
          echo "Contact created successfully";
      } else {
          echo "Error creating contact: " . $this->db->error;
      }
  }

  // Retrieve
  public function retrieveContacts()
  {

  }

  // Delete
  public function deleteContact($ID)
  {
      $ID = $this->db->real_escape_string($ID);

      $sql = "DELETE FROM " . $this->table . " WHERE ID = $ID";

      if ($this->db->query($sql) === TRUE) {
          echo "Contact deleted successfully";
      } else {
          echo "Error deleting contact: " . $this->db->error;
      }
  }

  // Update
  public function updateContact($ID, $firstName, $lastName, $mobilePhone, $homePhone, $email)
  {
      $ID = $this->db->real_escape_string($ID);
      $firstName = $this->db->real_escape_string($firstName);
      $lastName = $this->db->real_escape_string($firstName);
      $mobilePhone = $this->db->real_escape_string($mobilePhone);
      $homePhone = $this->db->real_escape_string($mobilePhone);
      $email = $this->db->real_escape_string($mobilePhone);

      $sql = "UPDATE " . $this->table . " SET firstName = '$firstName', lastName = '$lastName', mobilePhone = '$mobilePhone', homePhone = '$homePhone', email = '$email' WHERE ID = $ID";

      if ($this->db->query($sql) === TRUE) {
          echo "Contact updated successfully";
      } else {
          echo "Error updating contact: " . $this->db->error;
      }
  }
}

?>