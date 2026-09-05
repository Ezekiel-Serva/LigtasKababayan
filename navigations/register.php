
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
</head>

	<header>
	<a href="index.php">Return to Home Page</a>		
	</header>
	<hr>
	<h1>Registration</h1><br>
	<div style="border: 1px solid black; padding: 5px;">
	<b>1. Fullname</b><br>
	<input type="text" placeholder="Enter your name"><br>
	</div>	
	<br>

	<div style="border: 1px solid black; padding: 5px;">
	<b>2. Password</b><br>
	<input type="password" id="passW">
	<button type="button" id="toggle"><span id="indicator">Show</span></button>
	<script>
		document.getElementById("toggle").addEventListener("click", () => {
			if (document.getElementById("passW").type === "password"){
				document.getElementById("passW").type = "text";
				document.getElementById("indicator").textContent = "Hide";
			}
			else {
				document.getElementById("passW").type = "password";
				document.getElementById("indicator").textContent = "Show";
			}
		})
	</script>
	</div>
	
	<br>

	<div style="border: 1px solid black; padding: 5px;">
	<b>3. Phone number</b><br>
	<input type="tel" placeholder="0912-345-6789"><br>
	</div>
	<br>

	<div style="border: 1px solid black; padding: 5px;">
	<b>4. Barangay & Purok</b><br>
	<select>
		<option value="">- Select Barangay -</option>
		<option value="Dagum">Dagum</option>
		<option value="Payahan">Payahan</option>
		<option value="Balud">Balud</option>
		<option value="Hamorawon">Hamorawon</option>
		<option value="Obrero">Obrero</option>
		<option value="Rawis">Rawis</option>
		<option value="Capoocan">Capoocan</option>
	</select>
	<input type="number" style="width: 33px;" placeholder="purok">
	</div>
	
	<br><br>

	<button style="font-size: 1em;">Register</button>

	
</body>
</html>