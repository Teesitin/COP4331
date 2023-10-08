//const urlBase = 'http://contactsonline.xyz';
const urlBase = 'http://172.23.8.154';
const extension = 'php';

let userId = 0;
let firstName = "";
let lastName = "";

// Login Function
function doLogin()
{
	userId = 0;
	firstName = "";
	lastName = "";
	
	let userName = document.getElementById("userName").value;
	let password = document.getElementById("password").value;

	
	document.getElementById("loginResult").innerHTML = "";

	let tmp = {userName:userName,password:password};

	let jsonPayload = JSON.stringify( tmp );
	
	let url = urlBase + '/API/login.' + extension;

	let xhr = new XMLHttpRequest();
	xhr.open("POST", url, true);
	xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8");
	xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
	try
	{
		xhr.onreadystatechange = function() 
		{
			if (this.readyState == 4 && this.status == 200) 
			{
				let jsonObject = JSON.parse( xhr.responseText );
				userId = jsonObject.ID;
		
				if( userId < 1 )
				{		
					document.getElementById("loginResult").innerHTML = "User/Password combination incorrect";
					return;
				}
		
				firstName = jsonObject.firstName;
				lastName = jsonObject.lastName;

				saveCookie();
	
				window.location.href = "contacts/index.html";
			}
		};
		xhr.send(jsonPayload);
	}
	catch(err)
	{
		document.getElementById("loginResult").innerHTML = err.message;
	}

}

function saveCookie()
{
	let minutes = 20;
	let date = new Date();
	date.setTime(date.getTime()+(minutes*60*1000));	
	document.cookie = "firstName=" + firstName + ",lastName=" + lastName + ",userId=" + userId + ";expires=" + date.toGMTString() + "; path=/";
}

function readCookie()
{
	userId = -1;
	let data = document.cookie;
	let splits = data.split(",");
	for(var i = 0; i < splits.length; i++) 
	{
		let thisOne = splits[i].trim();
		let tokens = thisOne.split("=");
		if( tokens[0] == "firstName" )
		{
			firstName = tokens[1];
		}
		else if( tokens[0] == "lastName" )
		{
			lastName = tokens[1];
		}
		else if( tokens[0] == "userId" )
		{
			userId = parseInt( tokens[1].trim() );
		}
	}
	
	if( userId < 0 )
	{	
		console.log(window.location.href);
		if (window.location.href != urlBase + "/index.html") {
			window.location.href = "/index.html";
		}
	}
	else
	{	
		if (window.location.href != urlBase + "/contacts/index.html") {
			window.location.href = "/contacts/index.html";
		}
	}
}

function doLogout()
{
	userId = 0;
	firstName = "";
	lastName = "";
	document.cookie = "firstName= ; expires = Thu, 01 Jan 1970 00:00:00 GMT; path=/;";
	window.location.href = "index.html";

}