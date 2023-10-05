<?php
  /* $json_userData = file_get_contents("http://contactsonline.xyz/people.json");
   $userData=json_decode($json_userData,true);*/
   $userDataJSON = $_GET['user'];
   $userData = json_decode(urldecode($userDataJSON), true);
   if (is_array($userData) && !empty($userData)) {
      // Iterate through the user data to display contacts
      echo '<h1>User Contacts</h1>';
      echo '<table border="1">';
      echo '<tr><th>ID</th><th>Name</th><th>Phone</th><th>Email</th></tr>';
  
      foreach ($userData as $user) {
          echo '<tr>';
          echo '<td>' . $user['id'] . '</td>';
          echo '<td>' . $user['firstName'] . ' ' . $user['lastName'] . '</td>';
          echo '<td>' . $user['phone'] . '</td>';
          echo '<td>' . $user['email'] . '</td>';
          echo '</tr>';
      }
  
      echo '</table>';
  } else {
      echo 'No user data available.';
  }
?>