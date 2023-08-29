<?php
    // Create an empty array to hold the people
    $people = [];

    $person1 = new stdClass();
    $person1->name = "John Doe";
    $person1->email = "johndoe@example.com";
    $person1->phone = "123-456-7890";

    $people[] = $person1;

    $person2 = new stdClass();
    $person2->name = "Jane Doe";
    $person2->email = "janedoe@example.com";
    $person2->phone = "987-654-3210";

    $people[] = $person2;

    $person3 = new stdClass();
    $person3->name = "Emily Smith";
    $person3->email = "emilysmith@example.com";
    $person3->phone = "456-789-0123";

    $people[] = $person3;

    $myJSON = json_encode($people);

    echo $myJSON;
?>