<?php

require('../user_controller.php');
require('handlers/request_handler.php');

$inData = getRequestInfo();

if ($inData) {
	returnWithInfo($inData);
}

$user = new User;
$user->firstName = $inData["firstName"];
$user->lastName = $inData["lastName"];
$user->userName = $inData["userName"];
$user->set_password($inData["password"]);

try {
    if (create($user) == 1) {
        returnWithInfo('{"status": "created"}');
        
        echo json_encode([
            "status" => "created",
            "firstName" => $user->firstName,
            "lastName" => $user->lastName,
            "userName" => $user->userName,
        ]);

    }
    else {
        returnWithError('{"status": "error", "error": "Could not create user."}');
    }
}
catch (Exception $e) {
    echo $e;
}

?>