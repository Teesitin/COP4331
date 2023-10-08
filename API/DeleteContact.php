<?php
require('../handlers/request_handler.php');
require('../contactController.php');
$inData= getRequestInfo();
if($inData)
{
    if($inData["ID"])
    {
        if(deleteContact($inData["userID"],$inData["ID"])==1)
        {
            returnWithInfo('{"Status" : "Deleted contact"}');
        }
    }
    else{
        returnWithError('{"Status" : "No Contact found"}');
    }
}
?>