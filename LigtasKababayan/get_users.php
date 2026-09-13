<?php
//††††††††††††††
//††††††††††††††
//††††††††††††††
include("database_conn.php");

header("Content-Type: application/json");

if ($conn->connect_error){
  http_response_code(500);
  echo json_encode([
    "error" => "failed to connect db"
  ]);
  exit;
}

$result = $conn->query("
  SELECT
  id,
  name,
  water_level,
  lat,
  lng,
  description,
  headcount,
  phone,
  photo,
  vulnerable_status,
  vulnerable_type
  FROM user_info
  WHERE status = 'active'
  ORDER BY CASE water_level
    WHEN 'Head' THEN 1
    WHEN 'Neck' THEN 2
    WHEN 'Waist' THEN 3
    WHEN 'Knee' THEN 4
    WHEN 'Ankle' THEN 5
    ELSE 6
  END
  ");

if (!$result) {
  http_response_code(500);
  echo json_encode([
    "error" => "Failed to load reports: " . $conn->error
  ]);
  exit;
}

$users = [];

while($row = $result->fetch_assoc()){
  $users[] = $row;
}

echo json_encode($users);

$conn->close();
?>
