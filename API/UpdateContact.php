<?php
require('handlers/request_handler.php');
require('../contactController.php');
$inData=getRequestInfo();
if($inData)
{
    if(updateContact($inData["userID"],$inData["ID"],$inData["firstName"],$inData["lastName"],$inData["mobilePhone"],$inData["homePhone"],$inData["email"]))
    {
        returnWithInfo(array("status" => "updated"));
    }
    else{
        returnWithError('{"Status":"Unable to Update"}');
    }
}
?>