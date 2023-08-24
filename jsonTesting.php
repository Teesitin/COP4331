<?php
    $myObj = new stdClass();
    $myObj->name = "John";
    $myObj->email = "johndoe@example.com";
    $myObj->phone = "123-456-7890";

    $myJSON = json_encode($myObj);

    echo $myJSON;
?>
