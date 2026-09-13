<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorized Personnel Registration</title>
    <link rel="stylesheet" href="../cssDesigns/apRegister.css">
</head>
<body>
    <header>
        <?php include("../header.html"); ?>
    </header>
    <main>
        <a href="./admin.php">Return to admin</a>
        <h1>Authorized Personnel Registration</h1><br><br>

        Fullname: <br>
        <input type="text" id="apFullname"><br>
        
        Phone Number: <br>
        <input type="tel" id="apPhoneNum"><br>
        
        Password: <br>
        <input type="password" id="apPassword">
        <button id="toggle"><span id="indicator">Show</span></button><br>
        <script>
		document.getElementById("toggle").addEventListener("click", () => {
		if (document.getElementById("apPassword").type === "password"){
			document.getElementById("apPassword").type = "text";
			document.getElementById("indicator").textContent = "Hide";
			}
		else {
			document.getElementById("apPassword").type = "password";
			document.getElementById("indicator").textContent = "Show";
			}
		    })
	    </script>

        Assigned Location: <br>
        <input type="text" id="assignedLoc"><br><br>

        <button id="registerAP">Register Authorized Personnel</button>
        
    </main>
</body>
</html>
