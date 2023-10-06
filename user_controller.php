<?php

	include('User.php');
	include('db.php');
	
	// creates new user and stores it in db
	function create($user)
	{
		$user->set_password($user->password);

		$stmt = $db->prepare("INSERT INTO User (firstName, lastName, userName, 
						profileImg, dateLastLoggedIn, 'password') VALUES (?,?,?,?,?,?)");

		$stmt->bind_param("ssssss", $user->firstName, $user->lastName, $user->userName, $user->profileImg, 
						 $user->dateLastLoggedIn, $user->password);

		$stmt->execute();	
	}

	// deletes user from db, user is selected through their username
	// returns 1 if deleted succesfully, returns 0 otherwise
	function delete($userName)
	{
		$sql = "DELETE FROM User WHERE userName = $userName";

		if ($db->query($sql) === TRUE) {
			echo "User deleted successfully";
			return 1;
		  } else {
			echo "Error: " . $sql . "<br>" . $db->error;
			return 0;
		  }

	}

	// gets the info from user and stores it in user object to send to API
	function read($userName)
	{
		$user = new User;

		$sql = "SELECT * FROM User WHERE userName = $userName";

		$result = $db->query($sql);

		$lst = $result->fetch_assoc();

		$user->ID = $lst["ID"];
  		$user->firstName = $lst["firstName"];
  		$user->lastName = $lst["lastName"];
  		$user->userName = $lst["userName"]; 
		$user->profileImg = $lst["profileImg"]; 
  		$user->dateCreated = $lst["dateCreated"];
  		$user->dateLastLoggedIn = $lst["dateLastLoggedIn"];
  		$user->password = $lst["password"];

		return $user;
	}

	// updates the info of a user with a certain ID (also requires the user obj to be sent)
	// returns 1 if updated succesfully, returns 0 otherwise
	function update($user)
	{
		$user->set_password($user->password);
		
		$sql = "UPDATE User 
				SET firstName = $user->firstName, lastName = $user->lastName, userName = $user->userName, 
				profileImg = $user->profileImg, dateLastLoggedIn = $user->dateLastLoggedIn, 'password' = $user->password			
				WHERE ID = $user->ID";

		if ($db->query($sql) === TRUE) {
			echo "User updated successfully";
			return 1;
  		} else {
			echo "Error: " . $sql . "<br>" . $db->error;
			return 0;
  		}
	}

?>