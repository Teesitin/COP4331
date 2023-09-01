<?php

    //Fetch Person
    function getInfoById($peopleArray, $userId) {
        $resultArray = [];
        
        foreach ($peopleArray as $person) {
            if (isset($person['id']) && $person['id'] == $userId) {
                $resultArray[] = $person;
            }
        }
        
        return $resultArray;
    }

    //Get Theme
    $themeJson = file_get_contents('../../theme.json');
    $themeArray = json_decode($themeJson, true);

    //Get People
    $peopleFile = file_get_contents('../../people.json');
    $peopleArray = json_decode($peopleFile, true);

    //Set User
    $userId = 123456;
    $userInfo = getInfoById($peopleArray, $userId);
?>

<style>

    body{
        background-color: #<?php echo $themeArray[0]['primary']; ?>;
    }

</style>

<!DOCTYPE html>
<html>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    <head>
        <title>User Profile</title>
    </head>

    <body>
        
    </body>
</html>