<?php
//††††††††††††††
//††††††††††††††
//††††††††††††††
include("database_conn.php");

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

$users = [];

while($row = $result->fetch_assoc()){
  $users[] = $row;
}

header("Content-Type: application/json");

echo json_encode($users);

$conn->close();
?>
