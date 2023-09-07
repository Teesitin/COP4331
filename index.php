<?php
    $themejson = file_get_contents('theme.json');
    $themeArray = json_decode($themejson, true);
?>

<!DOCTYPE html>
<html>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Database</title>
    <link rel="icon" type="image/webp" href='../assets/branding/sprockets-fav-white.webp'/>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #<?php echo $themeArray[0]['primary']; ?>;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .main-container {
            width: 1200px;
            display: block;
            margin: auto;
            text-align: center;
        }

        .profile-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
        }


        .profile-box {
            width: 300px;
            border-radius: 20px; 
            box-shadow: 0px 4px 6px #00000029;
            padding: 15px;
            margin: 15px;
            background-color: #<?php echo $themeArray[0]['sub-1']; ?>;
        }

        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .profile-details {
            margin-top: 10px;
        }

        .profile-details a {
            text-decoration: none;
            color: inherit;
        }

        .profile-details a:hover {
            text-decoration: underline;
        }

        button {
            background-color: #<?php echo $themeArray[0]['secondary']; ?>;
            width: 150px;
            height: 35px;
            border: none;
            border-radius: 5px;
            margin: 25px;
            font-weight: bold;
            font-size: 15px;
            transition: transform 1s ease;
            cursor: pointer;
        }

        button:hover {
            transform: scale(1.1);
        }

        button:active {
            transform: scale(1.1);
        }        

        .logo {
            width: 512px;
            height: auto;
            padding: 25px;
        }

        .controls-container{
            width: 1020px;
            height: auto;

            border-radius: 20px; 
            box-shadow: 0px 4px 6px #00000029;
            padding: 15px;
            margin: auto;
            background-color: #<?php echo $themeArray[0]['sub-1']; ?>;
        }


        @media screen and (max-width: 1096px) {
            .controls-container{
            width: 660px;
            }

        }

        @media screen and (max-width: 770px) {

            .logo{
                width: 70%;
            }

            .controls-container{
                width: 70%;
            }

            .profile-box {
                width: 70%;
                padding: 15px;
                margin: 15px;
                font-size: 15px;

                outline: red solid 2px;
            }   

            button{
                width: 125px;
                height: 35px;
                margin: 7px;
            }
        }


    </style>
</head>
<body>

<div class="main-container">
    <!-- Logo -->
    <img class="logo" src='../assets/branding/sprockets-transparent-rectangle.webp'>

    <!-- Controls Container -->
    <div class="controls-container">
        <button class="control-button">Add User</button>
        <button class="control-button">Modify User</button>
        <button class="control-button">Remove User</button>
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">
            <button class="control-button">Contact IT</button>
        </a>
    </div>

    <!-- Profiles -->
    <div id="profile-container" class="profile-container">
        <?php
            $jsonString = file_get_contents('people.json');
            $dataArray = json_decode($jsonString, true);

            foreach ($dataArray as $person) {
        ?>
            <div class="profile-box">
                <img class="profile-image" 
                    src="../assets/headshots/hs-<?php echo $person['id']; ?>.webp" 
                    alt="<?php echo $person['name']; ?>"
                    onerror="this.onerror=null; this.src='../assets/100.webp';">
                <div class="profile-details">
                    <h3 id="name-1"><?php echo $person['name']; ?></h3>
                    <p id="email-1"><a href="mailto:<?php echo $person['email']; ?>"><?php echo $person['email']; ?></a></p>
                    <p id="phone-1"><a href="tel:<?php echo $person['phone']; ?>"><?php echo $person['phone']; ?></a></p>
                    <button>Stats</button>
                </div>
            </div>
        <?php
            }
        ?>
    </div>
</div>

</body>
</html>
