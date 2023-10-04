<?php

	require_once('User.php');
	require_once('generateUniqueID.php');
	$user = new User;

	function create($firstName, $lastName, $userName, 
					$profileImg, $dateCreated, $dateLastLoggedIn, $password)
	{
		$ID = generateUniqueID();

		$sql = "INSERT INTO User (ID, firstName, lastName, userName, 
		profileImg, dateCreated, dateLastLoggedIn, 'password')
		Values ($ID, $firstName, $lastName, $userName, 
		$profileImg, $dateCreated, $dateLastLoggedIn, $password)";
		
		
		if ($user->db->query($sql) === TRUE) {
			echo "New user created successfully";
		  } else {
			die("Error: " . $sql . "<br>" . $user->db->error);
		  }

		  //update to people.json goes here
	}

	function delete($ID)
	{
		$sql = "DELETE FROM User WHERE ID = $ID";

		if ($user->db->query($sql) === TRUE) {
			echo "User deleted successfully";
		  } else {
			die("Error: " . $sql . "<br>" . $user->db->error);
		  }

		  //update to people.json goes here

	}

	function read($ID)
	{
		$result = $user->db->query("SELECT * FROM User WHERE ID = $ID");

		if($result === FALSE){
			die("Error: " . $result);
		}

		$data[] = $result->fetch_assoc();

		return json_encode($data);
	}

	function update_jason()
	{

	}

?>