<?php
require('handlers/request_handler.php');
require('../contactController.php');
$inData= getRequestInfo();
if($inData)
{
    if($inData["ID"])
    {
        if(deleteContact($inData["userID"],$inData["ID"])==1)
        {
            returnWithInfo(array("status" => "deleted"));
        }
    }
    else{
        returnWithError('{"Status" : "No Contact found"}');
    }
}
?>