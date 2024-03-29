<?php
	$servername = "localhost";
	$username = "contact_man";
	$password = "BxFj&Y4qd!Y6Mw";
	$database = "cm_db";

  // Create connection
  $db = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }
  
  // User table
  $sql = "CREATE TABLE IF NOT EXISTS User(
  ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  firstName VARCHAR(50),
  lastName VARCHAR(50),
  userName VARCHAR(50),
  profileImg VARCHAR(256),
  dateCreated DATETIME DEFAULT CURRENT_TIMESTAMP,
  dateLastLoggedIn DATETIME,
  password VARCHAR(256)
  )";

  if ($db->query($sql) === TRUE) {
    //echo "Table User created successfully";
  } else {
    echo "Error creating table: " . $db->error;
  }

  // Contact table
  $sql = "CREATE TABLE IF NOT EXISTS Contact(
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    mobilePhone VARCHAR(20),
    homePhone VARCHAR(20),
    email VARCHAR(50),
    dateCreated DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES User(ID)
    )";
  
    if ($db->query($sql) === TRUE) {
      //echo "Table User created successfully";
    } else {
      echo "Error creating table: " . $db->error;
    }
?>