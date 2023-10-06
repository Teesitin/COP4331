<?php

	include('User.php');
	include('db.php');
	
	// creates new user and stores it in db
	function create($firstName, $lastName, $userName, 
					$profileImg, $dateCreated, $dateLastLoggedIn, $password)
	{
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$stmt = $db->prepare("INSERT INTO User (firstName, lastName, userName, 
						profileImg, dateCreated, dateLastLoggedIn, 'password') VALUES (?,?,?,?,?,?,?)");

		$stmt->bind_param("sssssss", $firstName, $lastName, $userName, $profileImg, 
						$dateCreated, $dateLastLoggedIn, $hashed_password);

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

	// updates the userName of a user with a certain ID 
	// returns 1 if updated succesfully, returns 0 otherwise
	function update($ID, $firstName, $lastName, $userName, $profileImg, 
							$dateCreated, $dateLastLoggedIn, $password)
	{
		$sql = "UPDATE User 
				SET firstName = $firstName, lastName = $lastName, userName = $userName,  profileImg = $profileImg,
				dateCreated = $dateCreated, dateLastLoggedIn = $dateLastLoggedIn, 'password' = $password			
				WHERE ID = $ID";

		if ($db->query($sql) === TRUE) {
			echo "User updated successfully";
			return 1;
  		} else {
			echo "Error: " . $sql . "<br>" . $db->error;
			return 0;
  		}
	}

?>