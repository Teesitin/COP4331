<?php

require('../user_controller.php');
require('handlers/request_handler.php');

$inData = getRequestInfo();

$user = new User;
$user->firstName = $inData["firstName"];
$user->lastName = $inData["lastName"];
$user->userName = $inData["userName"];
$user->set_password($inData["password"]);

try {
    if (create($user) == 1) {
        returnWithInfo(array("status" => "created"));
    }
    else {
        returnWithError('{"status": "error", "error": "Could not create user."}');
    }
}
catch (Exception $e) {
    echo $e;
}

?>