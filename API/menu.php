<?php
$userDataJSON = $_GET['user'];
$userData = json_decode(urldecode($userDataJSON), true);

// Check if user data is available
if (is_array($userData) && !empty($userData)) {
    // Display user information
    echo '<h1>Welcome, ' . $userData['firstName'] . '!</h1>';
    echo '<p>User ID: ' . $userData['id'] . '</p>';
    echo '<p>Email: ' . $userData['email'] . '</p>';

     // Display menu options
     echo '<h2>Menu Options</h2>';
     echo '<ul>';
     
     // Option 1: Retrieve User Contacts
     echo '<li><a href="retrieve.php?user=' . urlencode($userDataJSON) . '">Retrieve User Contacts</a></li>';
     
     // Option 2: Delete Contacts
     echo '<li><a href="delete.php?user=' . urlencode($userDataJSON) . '">Delete Contacts</a></li>';
     
     // Option 3: Edit Profile
     echo '<li><a href="edit.php?user=' . urlencode($userDataJSON) . '">Edit Profile</a></li>'; 
     
     // Option 4: Search Contacts
     echo '<li><a href="search.php?user=' . urlencode($userDataJSON) . '">Search Contacts</a></li>';
     
     // Add more menu options as needed
     
     echo '</ul>';
 } else {
     echo 'No user data available.';
 }
 ?>

