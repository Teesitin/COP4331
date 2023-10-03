<?php
   $json_userData = file_get_contents("http://contactsonline.xyz/people.json");
   $userData=json_decode($json_userData,true);
  
?>