<?php
    $themejson = file_get_contents('theme.json');
    $themeArray = json_decode($themejson, true);
    $themeID = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Title and Favicon -->
    <title>User Database</title>
    <link rel="icon" type="image/webp" href='../assets/branding/sprockets-fav-white.webp'/>

    <!-- Google Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- CSS -->
    <style>
        .material-symbols-outlined {
            font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 24
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #<?php echo $themeArray[$themeID]['primary']; ?>;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            color: #<?php echo $themeArray[$themeID]['text']; ?>;
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
            background-color: #<?php echo $themeArray[$themeID]['sub-1']; ?>;
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
            background-color: #<?php echo $themeArray[$themeID]['secondary']; ?>;
            width: 150px;
            height: 35px;
            border: none;
            border-radius: 5px;
            margin: 25px;
            font-weight: bold;
            font-size: 15px;
            transition: transform 1s ease;
            cursor: pointer;
            color: #<?php echo $themeArray[$themeID]['text']; ?>;
            
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
            background-color: #<?php echo $themeArray[$themeID]['sub-1']; ?>;
        }


        /* Menu */

        .menu-button {
            background-color: #<?php echo $themeArray[$themeID]['secondary']; ?>;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            cursor: pointer;

            position: fixed;
            right: 0;
            bottom: 0;

            z-index: 11;
        }

        .menu-blackout{
            display:absolute;
            background-color: rgb(256,256,256);
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 120;
        }

        .menu-modal {
            display: none;

            position: fixed;
            right: 0px;
            bottom: 75px;
            width: 200px;
            height: auto;
            background-color: transparent;
            z-index: 10;

            outline: 2px solid blue;
        }

        .menu-content-button {
            width: 100%;
            text-align: center;

            outline: 2px solid red;
        }


        /* Break Points */

        @media screen and (max-width: 1096px) {
            .controls-container{
            width: 660px;
            }

            button{
                width: 125px;
                height: 35px;
                margin: 15px;
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
            }   

            button{
                width: 125px;
                height: 35px;
                margin: 7px;
            }
        }


    /* Animations */
    @keyframes menu-animate-in {
        0% {
            opacity: 0;
        }
        100% {

            opacity: 1;
        }
    }

    @keyframes menu-animate-out {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
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


<!-- Menu Button -->
<button id="menuButton" class="menu-button">
    <span class="material-symbols-outlined">more_horiz</span>
</button>

<!-- Menu  -->
<div id="menuModal" class="menu-modal">
    <div class="menu-content-button">
        <button>Item 1</button>
        <button>Item 2</button>
        <button>Item 3</button>
        <button>Item 4</button>
    </div>
</div>

<div id="menuBlackout" class="menu-blackout">
</div>



<!-- JS -->
<script>
    var menuButton = document.getElementById('menuButton');
    var menuModal = document.getElementById('menuModal');
    var menuBlackout = document.getElementById('menuBlackout');

    var menuOpened = false;

    menuButton.addEventListener('click', function() {
        if(menuOpened){
            menuModal.style.animation = "menu-animate-out 0.5s";

            setTimeout(function() {
                menuModal.style.display = "none";
                menuBlackout.style.display = "none";
            }, 499);

            menuOpened = !menuOpened;
        }
        else {
            menuModal.style.display = "block";
            menuModal.style.animation = "menu-animate-in 0.5s";
            menuOpened = !menuOpened;
            menuBlackout.style.display = "fixed";
        }
    });
</script>



</body>
</html>
