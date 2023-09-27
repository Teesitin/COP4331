<!-- Establishing Connection-->
<?php
// Change these fields if testing on local mysql server
$servername = "localhost";
$username = "contact_man";
$password = "BxFj&Y4qd!Y6Mw";
$database = "cm_db";

// Create connection
$db = new mysqli($servername, $username, $password, $database);

// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

// User table
$sql = "CREATE TABLE IF NOT EXISTS User(
id INT(6) PRIMARY KEY,
firstName VARCHAR(50),
lastName VARCHAR(50),
userName VARCHAR(50),
profileImg VARCHAR(256),
dateCreated DATETIME,
dateLastLoggedIn DATETIME,
'password' VARCHAR(256)
)";

if ($db->query($sql) === TRUE) {
	echo "Table User created successfully";
  } else {
	echo "Error creating table: " . $db->error;
  }

//other tables coming soon :)
?>


<?php
    $themejson = file_get_contents('theme.json');
    $themeArray = json_decode($themejson, true);
    $themeID = 0;
?>

<script>
    var themeArray = <?php echo json_encode($themeArray); ?>;
    console.log(themeArray);
</script>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Title and Favicon -->
    <title>User Database</title>
    <link rel="icon" type="image/webp" href='../assets/branding2/co-white-fav.webp'/>

    <!-- Google Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- CSS -->
    <style>
        :root {
            /* Colors */
            --background: #579BB1;
            --containers: #ECE8DD;
            --container-border: transparent;
            --text: #000000;
            --buttons: #E1D7C6;
            --button-border: transparent;
            --button-text: #000000;

            /* Sizes */
            --global-font-size: 1rem;
            --button-font-size: 1.02rem;
            --profile-box-width: 300px;
        }

        .material-symbols-outlined {
            font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 24
        }

        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: var(--containers);
            border-radius: 6px;
            opacity: 0.6;
        }

        .menu-container::-webkit-scrollbar-thumb {
            background-color: grey;
            border-radius: 6px;
            opacity: 0.6;
        }

        ::-webkit-scrollbar-track {
            background-color: transparent;
        }


        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--background);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            color: var(--text);
            font-size: var(--global-font-size);
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
            width: var(--profile-box-width);
            border-radius: 20px; 
            box-shadow: 0px 4px 6px #00000029;
            padding: 15px;
            margin: 15px;
            background-color: var(--containers);
            outline: 2px solid var(--container-border);
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
            background-color: var(--buttons);
            outline: 2px solid var(--button-border);
            width: 125px;
            height: auto;

            border: none;
            border-radius: 5px;

            margin: 25px;
            padding: 10px;

            font-weight: bold;
            font-size: var(--button-font-size);
            transition: transform 1s ease;
            cursor: pointer;
            color: var(--button-text);
            
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
            background-color: var(--containers);
        }


        /* Menu */

        .menu-button {
            background-color: var(--buttons);
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

        .menu-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;    
            width: 100%;
            height: 100%;        

            background-color: rgba(0,0,0,.8);
            z-index: 10;
            
            backdrop-filter: blur(3px);
        }

        .menu-container{
            position:fixed;
            bottom: 100px;
            right: 0;

            width: 500px;
            height: 500px;
            padding: 20px;

            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;

            background-color: var(--containers);
            font-weight: bold;
            letter-spacing: 3px;

            overflow-y: auto;

        }

        .menu-content-button {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }


        /* Break Points */

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
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            .profile-box {
                width: 70%;
                padding: 15px;
                margin: 15px;
            }   

            .menu-container{
                position:fixed;
                bottom: 100px;
                right: 0;

                width: 80%;
                height: 500px;
                padding: 20px;

                border-top-left-radius: 20px;
                border-bottom-left-radius: 20px;

                background-color: var(--containers);
                font-weight: bold;
                letter-spacing: 3px;
            }

            button {
                width: 100px;
                height: auto;

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
    <img class="logo" id="logo" src='../assets/branding2/co-color-rectangle.webp'>

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

    <div class="menu-container" >

        Theme
        <div class="menu-content-button">
            <button id="themeLight" onclick="switchTheme(0)">Online Day</button>
            <button id="themeLight" onclick="switchTheme(1)">Online Night</button>
            <button id="themeLight" onclick="switchTheme(2)">Dual Hue</button>
            <button id="themeLight" onclick="switchTheme(3)">High Contrast</button>
        </div>

        Accessibility
        <div class="menu-content-button">
            <button onclick="toggleAccessibility(true)">On</button>
            <button onclick="toggleAccessibility(false)">Off</button>
        </div>

        Language
        <div class="menu-content-button">
            <button>English</button>
            <button>Spanish</button>
        </div>

        Option 4
        <div class="menu-content-button">
            <button>1</button>
            <button>2</button>
            <button>3</button>
            <button>4</button>
            <button>5</button>
        </div>

    </div>
</div>



<!-- JS -->
<script>

//General
    const root = document.documentElement;


//Menu Operation
    var menuButton = document.getElementById('menuButton');
    var menuModal = document.getElementById('menuModal');
    var menuOpened = false;

    menuButton.addEventListener('click', function() {
        if(menuOpened){
            menuModal.style.animation = "menu-animate-out 0.5s";

            setTimeout(function() {
                menuModal.style.display = "none";
            }, 490);

            document.body.style.overflow = "auto";
            menuOpened = !menuOpened;
        }
        else {
            menuModal.style.display = "block";
            menuModal.style.animation = "menu-animate-in 0.5s";
            menuOpened = !menuOpened;
            document.body.style.overflow = "hidden";
        }
    });


//Theme
    var logo = document.getElementById('logo');

    function switchTheme(themeID) {
        var theme = themeArray[themeID];
        console.log(theme);

        root.style.setProperty('--background', theme['background']);
        root.style.setProperty('--containers', theme['containers']);
        root.style.setProperty('--container-border', theme['container-border']);
        root.style.setProperty('--text', theme['text']);
        root.style.setProperty('--buttons', theme['buttons']);
        root.style.setProperty('--button-border', theme['button-border']);
        root.style.setProperty('--button-text', theme['button-text']);

        logo.src = '../assets/branding2/' + theme['logo'];
    }


//Accessibility
    function toggleAccessibility(enable) {
        if(enable){
            root.style.setProperty('--global-font-size', '1.3rem');
            root.style.setProperty('--button-font-size', '1.306rem');   
            root.style.setProperty('--profile-box-width', '480px');      
        }
        else {
            root.style.setProperty('--global-font-size', '1rem');
            root.style.setProperty('--button-font-size', '1.02rem');
            root.style.setProperty('--profile-box-width', '300px');  
        }
    }


</script>



</body>
</html>
