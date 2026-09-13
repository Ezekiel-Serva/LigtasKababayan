<?php
include("../database_conn.php");

// Pull every evacuation center, most recently updated first so the freshest
// data surfaces near the top of each list.
$stmt = $conn->prepare("SELECT centerName, maxCapacity, currentOccupancy, lastUpdated, latitude, longitude
                         FROM evacuationCenters
                         ORDER BY lastUpdated DESC");
$stmt->execute();
$result = $stmt->get_result();

$availableCenters = [];
$fullCenters = [];

while ($row = $result->fetch_assoc()) {
    $row["availableSpaces"] = $row["maxCapacity"] - $row["currentOccupancy"];

    if ($row["availableSpaces"] > 0) {
        $availableCenters[] = $row;
    } else {
        $fullCenters[] = $row;
    }
}
$stmt->close();

// Turns a MySQL timestamp into "18 mins ago" / "2 hours ago" style text,
// matching the wireframe. Falls back to a plain date if it's been a long time.
function timeAgo($timestamp) {
    $seconds = time() - strtotime($timestamp);

    if ($seconds < 60) {
        return "just now";
    }
    if ($seconds < 3600) {
        $mins = floor($seconds / 60);
        return $mins . ($mins === 1 ? " min ago" : " mins ago");
    }
    if ($seconds < 86400) {
        $hours = floor($seconds / 3600);
        return $hours . ($hours === 1 ? " hour ago" : " hours ago");
    }
    $days = floor($seconds / 86400);
    return $days . ($days === 1 ? " day ago" : " days ago");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find Shelter</title>
	<link rel="stylesheet" href="../cssDesigns/findShelter.css">
</head>
  <body>

    <header>
        <?php include("../header.html"); ?>
    </header>
    <main>
    <h1>Find Shelter</h1>
        <div class="gridContainer">

        <div id="availableShelters">
            <div id="availHeader">Available Shelters</div>
            <div id="availReports">
                <?php if (empty($availableCenters)): ?>
                    <p class="noResults">No available shelters right now.</p>
                <?php endif; ?>

                <?php foreach ($availableCenters as $center): ?>
                    <div class="shelterCard">
                        <p>Location: <?= htmlspecialchars($center["centerName"]) ?></p>
                        <p>Max Capacity: <?= htmlspecialchars($center["maxCapacity"]) ?></p>
                        <p>Current Occupancy: <?= htmlspecialchars($center["currentOccupancy"]) ?></p>
                        <p>Available Spaces: <?= htmlspecialchars($center["availableSpaces"]) ?></p>
                        <p class="updatedText">[Updated <?= timeAgo($center["lastUpdated"]) ?>]</p>
                        <?php if ($center["latitude"] !== null && $center["longitude"] !== null): ?>
                            <a href="https://www.google.com/maps?q=<?= urlencode($center['latitude'] . ',' . $center['longitude']) ?>" target="_blank">View Map</a>
                        <?php else: ?>
                            <span class="noLocation">Location not yet available</span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div id="occupiedShelters">
            <div id="occHeader">Occupied Shelters</div>
            <div id="occReports">
                <?php if (empty($fullCenters)): ?>
                    <p class="noResults">No full shelters to show.</p>
                <?php endif; ?>

                <?php foreach ($fullCenters as $center): ?>
                    <div class="shelterCard full">
                        <p>Location: <?= htmlspecialchars($center["centerName"]) ?></p>
                        <p>Max Capacity: <?= htmlspecialchars($center["maxCapacity"]) ?></p>
                        <p>Current Occupancy: <?= htmlspecialchars($center["currentOccupancy"]) ?></p>
                        <p>Available Spaces: <?= htmlspecialchars($center["availableSpaces"]) ?></p>
                        <p class="updatedText">[Updated <?= timeAgo($center["lastUpdated"]) ?>]</p>
                        <?php if ($center["latitude"] !== null && $center["longitude"] !== null): ?>
                            <a href="https://www.google.com/maps?q=<?= urlencode($center['latitude'] . ',' . $center['longitude']) ?>" target="_blank">View Map</a>
                        <?php else: ?>
                            <span class="noLocation">Location not yet available</span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        </div>
    </main>
</body>
</html>