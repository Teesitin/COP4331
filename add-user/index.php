<?php
    $themejson = file_get_contents('../theme.json');
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
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


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

        /* Icons */

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
            padding: 25px;
            margin: auto;
            text-align: center;
        }

        .logo {
            width: 512px;
            height: auto;
            padding: 25px;
        }

        .add-user-container{
            width: auto;
            height: auto;

            display: block;
            align-items: center;

            border-radius: 20px; 
            box-shadow: 0px 4px 6px #00000029;
            padding: 15px;
            margin: auto;
            margin-bottom: 15px;
            margin-top: 15px;
            background-color: var(--containers);
        }

        input{
            border: transparent;
            border-radius: 9999px;

            width:500px;
            height: 50px;


            padding: 15px;
            margin: 10px;

            font-size: 1rem;
        }

        @media screen and (max-width: 1096px) {
            input {
                width: auto;
            }

            .main-container {
                width: 100%;
            }

            .logo{
                width: 70%;
            }

            .add-user-container{
                width: 70%;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }
        }

        .custom-file-upload {
            position: relative;
        }

        .custom-file-upload input[type='file'] {
            display: none;
        }

        .custom-file-upload button {
            background-color: var(--buttons);
            outline: 2px solid var(--button-border);
            width: auto;
            height: auto;
            border: none;
            border-radius: 9999px;
            margin: 25px;
            padding: 10px;
            font-weight: bold;
            font-size: var(--button-font-size);
            transition: transform 1s ease;
            cursor: pointer;
            color: var(--button-text);
        }

        .custom-file-upload button:hover {
            transform: scale(1.1);
        }

        .custom-file-upload button:active {
            transform: scale(1.1);
        }

        .submit-button {
            background-color: var(--buttons);
            outline: 2px solid var(--button-border);
            width: 125px;
            height: 50px;
            border: none;
            border-radius: 5px;
            margin: 25px;
            padding: 5px;
            font-weight: bold;
            font-size: var(--button-font-size);
            transition: transform 1s ease;
            cursor: pointer;
            color: var(--button-text);
        }

        .submit-button:hover {
            transform: scale(1.1);
        }

        .submit-button:active {
            transform: scale(1.1);
        }




    </style>
</head>
<body>
<div class="main-container">
    <!-- Logo -->
    <img class="logo" id="logo" src='../assets/branding2/co-color-rectangle.webp'>


    <div class="add-user-container">

            <div>
                <input type="text" name="first" placeholder="First Name" required>
                <input type="text" name="last" placeholder="Last Name" required>
                <input type="email" name="email" placeholder="Enter your email" required>
                <input type="text" name="phone" placeholder="Phone" required>
            </div>

            <div class="custom-file-upload">
                <input type="file" id="file-upload" name="fileupload" />
                <button><span class="material-symbols-outlined">background_replace</span></button>
            </div>


            <button class="submit-button">Submit</button>



    </div>

</div>



<!-- JS -->
<script>

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

</script>



</body>
</html>
