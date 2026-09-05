<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<header>
	<a href="index.php">Return to Home Page</a>		
	</header>
	<hr>
	<b>Username:</b><br>
	<input type="text" placeholder="username/name"><br><br>

	<b>Password:</b><br>
	<input type="password" id="passw">
	<button id="toggle"><span id="indicator">Show</span></button>
	<script>
		document.getElementById("toggle").addEventListener("click", () => {
			if(document.getElementById("passw").type === "password"){
				document.getElementById("passw").type = "text";
				document.getElementById("indicator").textContent = "Hide";
			}
			else{
				document.getElementById("passw").type = "password";
				document.getElementById("indicator").textContent = "Show";
			}
		})
	</script>

	<br><br>
	
	<button>Login</button>
</body>
</html>