<?php
require('handlers/request_handler.php');
require('../contactController.php');

$inData=getRequestInfo();

if ($inData) {
    if ($inData['userId']) {
        $result = createContact($inData['userId'], 
                    $inData['firstName'], 
                    $inData['lastName'], 
                    $inData['mobilePhone'], 
                    $inData['homePhone'],
                    $inData['email']);
        if ($result == 1) {
            returnWithInfo(array("status" => "created"));
        }
        else {
            returnWithError('{"status": "error", "error": "Could not create contact."}');
        }
    }
}

?>