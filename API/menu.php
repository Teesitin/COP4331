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
    echo '<li><a href="retrieve.php?user=' . urlencode($userDataJSON) . '">Retrieve User Contacts</a></li>';
    echo '<li><a href="other_option.php?user=' . urlencode($userDataJSON) . '">Other Option</a></li>';
    // Add more menu options as needed
    echo '</ul>';
} else {
    echo 'No user data available.';
}
?>
?>