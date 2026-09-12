<?php

include("../database_conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$fullname = $_POST["fullname"];
	$password = $_POST["password"];
	$phone = $_POST["phone"];
	$barangay = $_POST["barangay"];
	$purok = $_POST["purok"];
	// paswrord protection
	$password = password_hash($password, PASSWORD_DEFAULT);
	// save
	$statement = $conn->prepare("
		INSERT INTO users
		(fullname, password, phone, barangay, purok)
		VALUES (?, ?, ?, ?, ?)
	");
	$statement->bind_param(
		"sssss",
		$fullname,
		$password,
		$phone,
		$barangay,
		$purok
	);

	if ($statement->execute()) {
		echo "<script>
			alert('Registered Successfully!');
			window.location='login.php';
		</script>";
	}
	else {
		echo "<script>
			alert('Registration Failed!');
		</script>";
	}
}
?>
	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
    <link rel="stylesheet" href="../cssDesigns/register.css">
</head>
    <body>
	<header>
	<a href="index.php">Return to Home Page</a>
	</header>
	<hr>
	<h1>Registration</h1>
	<br>
	<form method="POST">
	<div style="border: 1px solid black; padding: 5px;">
	<b>1. Fullname</b>
	<br>
	<input type="text" name="fullname" placeholder="Enter your name" required>
	<br>
	</div>
	<br>
	<div style="border: 1px solid black; padding: 5px;">
	<b>2. Password</b>
	<br>
	<input type="password" id="passW" name="password" required>
	<button type="button" id="toggle">
	<span id="indicator">
			Show
	</span>
	</button>
	<script>
			document.getElementById("toggle").addEventListener("click", () => {
				if (document.getElementById("passW").type === "password") {
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
			<b>3. Phone number</b>
			<br>
			<input type="tel" name="phone" placeholder="0912-345-6789" required>
		<br>
		</div>
		<br>
		<div style="border: 1px solid black; padding: 5px;">
			<b>4. Barangay & Purok</b>
			<br>
			<select name="barangay" required>
			<option value="">
					- Select Barangay -
			</option>
			<option value="Dagum">
					Dagum
			</option>
			<option value="Payahan">
					Payahan
			</option>
			<option value="Balud">
					Balud
			</option>
			<option value="Hamorawon">
					Hamorawon
			</option>
			<option value="Obrero">
					Obrero
			</option>
			<option value="Rawis">
					Rawis
			</option>
			<option value="Capoocan">
					Capoocan
			</option>
			</select>
			<input type="number" name="purok" style="width: 33px;" placeholder="purok" required>
		</div>
		<br><br>
		<button type="submit" style=" font-size: 1em;">
			Register
		</button>
	</form>
</body>
</html>
