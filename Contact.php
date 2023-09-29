<!-- Establishing Connection-->
<?php
// Change these fields if testing on local mysql server
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

// Contact table
$sql = "CREATE TABLE IF NOT EXISTS Contact(
ID INT(6),
user_ID INT(6) FOREIGN KEY REFERENCES User(ID),
firstName VARCHAR(50),
lastName VARCHAR(50),
mobilePhone VARCHAR(15),
homePhone VARCHAR(15),
email VARCHAR(120)
)";

if ($db->query($sql) === TRUE) {
	echo "Table Contact created successfully";
  } else {
	echo "Error creating table: " . $db->error;
  }

?>