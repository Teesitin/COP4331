<?php
require('handlers/request_handler.php');
require('../contactController.php');
$inData=getRequestInfo();
if($inData)
{
    if(updateContact($inData["userID"],$inData["ID"],$inData["firstname"],$inData["lastName"],$inData["mobilephone"],$inData["homephone"],$inData["email"]))
    {
        returnWithInfo('{"Status":"Updated the Contact"}');
    }
    else{
        returnWithError('{"Status":"Unable to Update"}');
    }
}
?>