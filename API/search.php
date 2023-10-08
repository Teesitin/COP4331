<?php
require('handlers/request_handler.php');
require('../contactController.php');

$inData = getRequestInfo();

if ($inData) {
    if ($inData['userID']) {
        $result = searchContacts($inData['userID'], $inData['query']);
        returnWithInfo($result);
    }
    else {
        returnWithError('{"status": "No User Logged in"}');
    }
}
?>