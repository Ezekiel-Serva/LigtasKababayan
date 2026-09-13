<?php
session_start();
include("../database_conn.php");

// ---- LOGIN HANDLING ----
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["phoneNum"]) && !isset($_SESSION["id"])) {
    $phoneNum = $_POST["phoneNum"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM apCredentials WHERE phoneNumber = ?");
    $stmt->bind_param("s", $phoneNum);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $authPerson = $result->fetch_assoc();

        if (password_verify($password, $authPerson["password"])) {
            $_SESSION["id"] = $authPerson["id"];
            $_SESSION["fullName"] = $authPerson["fullName"];
            $_SESSION["phoneNumber"] = $authPerson["phoneNumber"];
            $_SESSION["assignedLoc"] = $authPerson["assignedLoc"];
            $_SESSION["barangayId"] = $authPerson["barangayId"] ?? null;
        } else {
            $loginError = "Wrong password.";
        }
    } else {
        $loginError = "User not found.";
    }
    $stmt->close();
}

// ---- OCCUPANCY UPDATE Monitoring --------============-----ejrjdjd
// Only runs once AP is actually logged in, and only when the UPDATE button was pressed (not the login form, not the location form).
$updateMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["id"]) && isset($_POST["updateOccupancy"])) {

    // These may be left blank by the AP - default to 0 so the math below
    // doesn't break, rather than forcing every field to be filled in every single time.
    $familiesEntering = isset($_POST["familiesEntering"]) && $_POST["familiesEntering"] !== ""
        ? (int) $_POST["familiesEntering"] : 0;

    $peopleEntering = isset($_POST["peopleEntering"]) && $_POST["peopleEntering"] !== ""
        ? (int) $_POST["peopleEntering"] : 0;

    $peopleLeaving = isset($_POST["peopleLeaving"]) && $_POST["peopleLeaving"] !== ""
        ? (int) $_POST["peopleLeaving"] : 0;

    // Pull the center's current numbers before changing anything, so the
    // update is based on what's actually in the database right now, not
    // on a stale value the AP might be looking at.
    $centerId = $_SESSION["assignedLoc"];

    $stmt = $conn->prepare("SELECT maxCapacity, currentOccupancy FROM evacuationCenters WHERE centerName = ?");
    $stmt->bind_param("s", $centerId);
    $stmt->execute();
    $centerResult = $stmt->get_result();

    if ($centerResult->num_rows > 0) {
        $center = $centerResult->fetch_assoc();

        $newOccupancy = $center["currentOccupancy"] + $peopleEntering - $peopleLeaving;

        // Occupancy can't go below 0 or above the center's max capacity -
        // clamp it instead of letting a typo push it out of range.
        if ($newOccupancy < 0) {
            $newOccupancy = 0;
        }
        if ($newOccupancy > $center["maxCapacity"]) {
            $newOccupancy = $center["maxCapacity"];
        }

        $updateStmt = $conn->prepare("UPDATE evacuationCenters SET currentOccupancy = ? WHERE centerName = ?");
        $updateStmt->bind_param("is", $newOccupancy, $centerId);

        if ($updateStmt->execute()) {
            $updateMessage = "Updated successfully.";
        } else {
            $updateMessage = "Update failed. Please try again.";
        }
        $updateStmt->close();
    } else {
        $updateMessage = "Could not find your assigned evacuation center in the system.";
    }

    $stmt->close();
}

// ---- LOCATION CONFIRM HANDLING ----
// Only runs once AP is logged in, and only when the Confirm button was
// pressed specifically (not UPDATE, not login).
$locationMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["id"]) && isset($_POST["confirmLocation"])) {
    $lat = $_POST["latitude"] ?? "";
    $lng = $_POST["longitude"] ?? "";
    $assignedLoc = $_SESSION["assignedLoc"];

    if ($lat !== "" && $lng !== "") {
        $stmt = $conn->prepare("UPDATE evacuationCenters SET latitude = ?, longitude = ? WHERE centerName = ?");
        $stmt->bind_param("dds", $lat, $lng, $assignedLoc);

        if ($stmt->execute()) {
            $locationMessage = "Location confirmed and saved.";
        } else {
            $locationMessage = "Failed to save location. Please try again.";
        }
        $stmt->close();
    } else {
        $locationMessage = "No location captured yet. Press Get Location first.";
    }
}

// Pull the latest numbers to display, whether or not an update just happened.
$displayCapacity = null;
$displayOccupancy = null;
$displayAvailable = null;

if (isset($_SESSION["id"])) {
    $assignedLoc = $_SESSION["assignedLoc"];
    $stmt = $conn->prepare("SELECT maxCapacity, currentOccupancy FROM evacuationCenters WHERE centerName = ?");
    $stmt->bind_param("s", $assignedLoc);
    $stmt->execute();
    $centerResult = $stmt->get_result();

    if ($centerResult->num_rows > 0) {
        $center = $centerResult->fetch_assoc();
        $displayCapacity = $center["maxCapacity"];
        $displayOccupancy = $center["currentOccupancy"];
        $displayAvailable = $displayCapacity - $displayOccupancy;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Authorized Personnel</title>
	<link rel="stylesheet" href="../cssDesigns/authPerson.css">
</head>
<body>
	<header>
        <?php include("../header.html"); ?>
	</header>

    <?php if (isset($_SESSION["id"])): ?>

        <main class="apDashboard">
            <h1>Evacuation Center Management</h1>

            <div class="assignedCenterRow">
                <label for="assignedCenter">Assigned Evacuation Center:</label>
                <br>
                <input type="text" id="assignedCenter" value="<?= htmlspecialchars($_SESSION["assignedLoc"]) ?>" readonly>
            </div>

            <div class="dashboardGrid">

                <div class="statusBox">
                    <h2>Current Status</h2>
                    <?php if ($displayCapacity !== null): ?>
                        <p>Max Capacity: <?= htmlspecialchars($displayCapacity) ?></p>
                        <p>Current Occupancy: <?= htmlspecialchars($displayOccupancy) ?></p>
                        <p>Available Spaces: <?= htmlspecialchars($displayAvailable) ?></p>
                    <?php else: ?>
                        <p>No occupancy data found for your assigned center yet.</p>
                    <?php endif; ?>
                </div>

                <div class="updateBox">
                    <form method="POST">
                        <h2>New Arrivals</h2>

                        <label for="familiesEntering">Number of Families Entering:</label>
                        <input type="number" name="familiesEntering" id="familiesEntering" min="0"><br>

                        <label for="peopleEntering">Total People Entering:</label><br>
                        <input type="number" name="peopleEntering" id="peopleEntering" min="0">

                        <h2 class="leavingHeader">People Leaving</h2>

                        <label for="peopleLeaving">Number of people exiting/exited:</label>
                        <input type="number" name="peopleLeaving" id="peopleLeaving" min="0">

                        <?php if ($updateMessage !== ""): ?>
                            <p class="updateMessage"><?= htmlspecialchars($updateMessage) ?></p>
                        <?php endif; ?>

                        <button type="submit" name="updateOccupancy" value="1">UPDATE</button>
                    </form>
                </div>

            </div>

            <div class="locationBox">
                <h2>Evacuation Center Location</h2>

                <button type="button" id="getLocationBtn">Get Location</button>

                <div id="mapPreview" style="display:none;">
                    <iframe id="mapFrame" width="100%" height="250" style="border:0;" loading="lazy"></iframe>
                </div>

                <form method="POST" id="confirmLocationForm" style="display:none;">
                    <input type="hidden" name="latitude" id="latInput">
                    <input type="hidden" name="longitude" id="lngInput">
                    <button type="submit" name="confirmLocation" value="1">Confirm This Location</button>
                </form>

                <?php if ($locationMessage !== ""): ?>
                    <p class="updateMessage"><?= htmlspecialchars($locationMessage) ?></p>
                <?php endif; ?>
            </div>

            <script>
            document.getElementById("getLocationBtn").addEventListener("click", () => {
                if (!navigator.geolocation) {
                    alert("Geolocation is not supported on this device.");
                    return;
                }

                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;

                        document.getElementById("latInput").value = lat;
                        document.getElementById("lngInput").value = lng;

                        document.getElementById("mapFrame").src =
                            `https://maps.google.com/maps?q=${lat},${lng}&z=17&output=embed`;

                        document.getElementById("mapPreview").style.display = "block";
                        document.getElementById("confirmLocationForm").style.display = "block";
                    },
                    (error) => {
                        alert("Could not get location: " + error.message);
                    },
                    { enableHighAccuracy: true, timeout: 6000, maximumAge: 0 }
                );
            });
            </script>

            <form method="POST" action="apLogout.php" class="logoutForm">
                <button type="submit">Log Out</button>
            </form>
        </main>

    <?php else: ?>

        <main class="loginPage">
            <h1>Authorized Personnel</h1><br>

            <?php if (isset($loginError)): ?>
                <p style="color:red;"><?= htmlspecialchars($loginError) ?></p>
            <?php endif; ?>

            <form method="POST">
            Phone Number: <br>
            <input type="tel" name="phoneNum" required><br>

            Password: <br>
            <input type="password" name="password" id="password" required>
            <button id="toggle" type="button"><span id="indicator">Show</span></button><br>
            <script>
            document.getElementById("toggle").addEventListener("click", () => {
                if (document.getElementById("password").type === "password"){
                    document.getElementById("password").type = "text";
                    document.getElementById("indicator").textContent = "Hide";
                    }
                else {
                    document.getElementById("password").type = "password";
                    document.getElementById("indicator").textContent = "Show";
                    }
                })
            </script>
            <br>
            <button type="submit" id="loginAsAp">Login as AP</button>
            </form>
        </main>

    <?php endif; ?>

</body>
</html>
