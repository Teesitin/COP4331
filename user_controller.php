<?php
	require('User.php');
	require('db.php');

	//creates new user and stores it in db
	function create($user)
	{	
		global $db;

		if (read($user->userName)) {
			return 0;
		}

		$stmt = $db->prepare("INSERT INTO User (firstName, lastName, userName, 
						profileImg, dateLastLoggedIn, password) VALUES (?,?,?,?,?,?)");

		$stmt->bind_param("ssssss", $user->firstName, $user->lastName, $user->userName, $user->profileImg, 
						 $user->dateLastLoggedIn, $user->password);

		$stmt->execute();

		return 1;
	}

	// deletes user from db, user is selected through their username
	// returns 1 if deleted succesfully, returns 0 otherwise
	function delete($userName)
	{
        global $db;
		$sql = "DELETE FROM User WHERE userName = $userName";
		global $db;
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
		global $db;
		$user = new User;

		$stmt = $db->prepare("SELECT * FROM User WHERE userName=?");
		$stmt->bind_param("s", $userName);
		$stmt->execute();
		$result = $stmt->get_result();

		if (mysqli_num_rows($result) == 0) {
			return null;
		}

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
		global $db;
		// $user->set_password($user->password);
		
		$stmt = $db->prepare("UPDATE User SET firstName=?, lastName=?, userName=?, profileImg=?, dateLastLoggedIn=CURRENT_TIMESTAMP	WHERE ID=?");
		$stmt->bind_param("ssssi", $user->firstName, $user->lastName, $user->userName, $user->profileImg, $user->ID);
		
		
		if ($stmt->execute() === TRUE) {
			//echo "User updated successfully";
			return 1;
  		} else {
			return 0;
  		}
	}

?>