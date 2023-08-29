
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
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 98vh;
            width: 100%;
            margin: 0;

            background-color: rgb(245, 245, 245);
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
            text-decoration: none;  /* Removes underline */
            color: inherit;  /* Takes on the color of the parent element */
        }
        
        /* Add hover effect if you want */
        .profile-details a:hover {
            text-decoration: underline;  /* Adds underline on hover */
        }

    </style>
</head>
<body>

<!-- Profiles -->
    <div class="center-container">


        <div class="profile-box">
            <img class="profile-image" src="https://via.placeholder.com/100" alt="John Doe">
            <div class="profile-details">
                <h3 id="name-1">Test</h3>
                <p><a id="email-1" href="mailto:">Error</a></p>
                <p><a id="phone-1" href="tel:">Error</a></p>
            </div>
        </div>
        

    </div>

<script>
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
        const myJSON = JSON.parse(this.responseText);

        document.getElementById("name-1").innerHTML = myJSON[0].name;
        document.getElementById("email-1").innerHTML = myJSON[0].email;
        document.getElementById("email-1").href = "mailto:" + myJSON[0].email;

        document.getElementById("phone-1").innerHTML = myJSON[0].phone;
        document.getElementById("phone-1").href = "tel:" + myJSON[0].phone;

    };
    xmlhttp.open("GET", "people.php");
    xmlhttp.send();
</script>

</body>
</html>



