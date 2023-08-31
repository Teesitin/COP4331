<!DOCTYPE html>
<html>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">


<head>
    <title>User Profile</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .center-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            height: 98vh;
            width: 100%;
            margin: 0;

            background-color: rgb(245, 245, 245);
        }

        @media screen and (max-width: 700px) {
            .center-container {
                flex-direction: column;
            }
        }

        .profile-box {
            background: white;
            border-radius: 20px; 
            width: 300px;
            text-align: center;
            box-shadow: 0px 4px 6px #00000029;
            padding: 15px;
            margin: 15px;
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

    </style>
</head>
<body>


<!-- Profiles -->
<div id="profile-container" class="center-container">

<?php
    $jsonString = file_get_contents('people.json');
    $dataArray = json_decode($jsonString, true);

    foreach ($dataArray as $person) {
        ?>
    <div class="profile-box">
        <img class="profile-image" 
             src="../assets/headshots/hs-<?php echo $person['id']; ?>.webp" 
             alt="<?php echo $person['name']; ?>"
             onerror="this.onerror=null; this.src='https://via.placeholder.com/100';">
        <div class="profile-details">
            <h3 id="name-1"><?php echo $person['name']; ?></h3>
            <p id="email-1"><a href="mailto:<?php echo $person['email']; ?>"><?php echo $person['email']; ?></a></p>
            <p id="phone-1"><a href="tel:<?php echo $person['phone']; ?>"><?php echo $person['phone']; ?></a></p>
        </div>
    </div>

    <?php
    }
?>

</div>
    
</body>
</html>