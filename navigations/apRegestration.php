<?php
include('../database_conn.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $apFullName = trim($_POST["fullName"] ?? "");
    $apPhoneNum = trim($_POST["phoneNumber"] ?? "");
    $apPassword = $_POST["password"] ?? "";
    $apAssignedLoc = trim($_POST["assignedLoc"] ?? "");

    if (empty($apFullName) || empty($apPhoneNum) || empty($apPassword) || empty($apAssignedLoc)) {
        echo "<script>alert('All fields are required.');</script>";
    } else {
        $hashedPassword = password_hash($apPassword, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO apCredentials (fullName, phoneNumber, password, assignedLoc)
        VALUES (?, ?, ?, ?)");

        $stmt->bind_param("ssss", $apFullName, $apPhoneNum, $hashedPassword, $apAssignedLoc);

        if ($stmt->execute()) {
            echo "<script>
            alert('Authorized Personnel Registration Successful!');
            window.location.href = './authPerson.php';
            </script>";
        } else {
            if ($conn->errno === 1062) {
                echo "<script>alert('This phone number is already registered.');</script>";
            } else {
                echo "<script>alert('Failed to register AP. Please try again.');</script>";
            }
        }
        $stmt->close();
    }
    $conn->close();
}
?>

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
        <form method="POST">

        Fullname: <br>
        <input type="text" id="apFullname" name="fullName" required><br>

        Phone Number: <br>
        <input type="tel" id="apPhoneNum" name="phoneNumber" required><br>

        Password: <br>
        <input type="password" id="apPassword" name="password" required>
        <button type="button" id="toggle"><span id="indicator">Show</span></button><br>
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
        <input type="text" id="assignedLoc" name="assignedLoc" required><br><br>

        <button type="submit" id="registerAP">Register Authorized Personnel</button>
        </form>

    </main>
</body>
</html>