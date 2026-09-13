<?php

session_start();

include("../database_conn.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fullname = $_POST["fullname"];
	$password = $_POST["password"];

	// find user
	$statement = $conn->prepare("
		SELECT * FROM users
		WHERE fullname = ?
	");

	$statement->bind_param(
		"s",
		$fullname
	);

	$statement->execute();
	$result = $statement->get_result();


	// check if the user exists
	if ($result->num_rows > 0) {

		$user = $result->fetch_assoc();

		// check paass
		if (password_verify($password, $user["password"])) {
			$_SESSION["user_id"] = $user["id"];
			$_SESSION["fullname"] = $user["fullname"];
			$_SESSION["barangay"] = $user["barangay"];

			echo "<script>
			alert('Login Successful!');
			window.location='index.php';
			</script>";
		}
		else {
			echo "<script>
				alert('Wrong Password!');
			</script>";
		}
	}
	else {

		echo "<script>
			alert('User Not Found!');
		</script>";

	}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
    <link rel="stylesheet" href="../cssDesigns/login.css">

</head>
<body>
	<header>
	<a href="index.php">Return to Home Page</a>
	</header>
	<hr>
	<form method="POST">
	<b>Username:</b><br>
	<input type="text" name="fullname" placeholder="username/name" required><br><br>
	<b>Password:</b>
	<br>
	<input type="password" id="passw" name="password" required>
		<button type="button" id="toggle">
		<span id="indicator">
			Show
		</span>
		</button>
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
	<button type="submit">
			Login
</button>
</form>
</body>
</html>
