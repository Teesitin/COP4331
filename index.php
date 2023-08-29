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
</div>

<script>

// <div class="profile-box">
//     <img class="profile-image" src="https://via.placeholder.com/100" alt="{NAME}">
//     <div class="profile-details">
//         <h3 id="name-1">{NAME}</h3>
//         <p id="email-1"><a href="{EMAIL}">{EMAIL}</a></p>
//         <p id="phone-1"><a href="{NUMBER}">{NUMBER}</a></p>
//     </div>
// </div>


    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
        const people = JSON.parse(this.responseText);
        const profileContainer = document.getElementById("profile-container");

        people.forEach((person, index) => {
            const profileBox = document.createElement("div");
            profileBox.className = "profile-box";

            const profileImage = document.createElement("img");
            profileImage.className = "profile-image";
            profileImage.src = "https://via.placeholder.com/100";
            profileImage.alt = person.name;

            const profileDetails = document.createElement("div");
            profileDetails.className = "profile-details";

            const name = document.createElement("h3");
            name.innerHTML = person.name;

            const email = document.createElement("p");
            email.innerHTML = `<a href="mailto:${person.email}">${person.email}</a>`;

            const phone = document.createElement("p");
            phone.innerHTML = `<a href="tel:${person.phone}">${person.phone}</a>`;

            profileDetails.appendChild(name);
            profileDetails.appendChild(email);
            profileDetails.appendChild(phone);

            profileBox.appendChild(profileImage);
            profileBox.appendChild(profileDetails);

            profileContainer.appendChild(profileBox);
        });
    };

    xmlhttp.open("GET", "people.php");
    xmlhttp.send();
</script>
    

</body>
</html>