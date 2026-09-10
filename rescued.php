<?php
//†††††††††††††††
//†††††††††††††††
//††††††††††††††††
include("database_conn.php");

$json = file_get_contents("php://input");
$data = json_decode($json, true);

if(!isset($data["id"])){
  echo"User id is required";
  exit;
}

$id = $data["id"];

$statement = $conn->prepare("
  UPDATE user_info
  SET status = 'rescued'
  WHERE id = ?
  ");

$statement->bind_param("i", $id);

if ($statement->execute()){
  if ($statement->affected_rows > 0){
    echo"Marked As Rescued/Safe";
  }
  else {
    echo"User Not Found";
  }
}
else {
  http_response_code(500);
  echo"Database Error" . $statement->error;
}

$statement->close();
$conn->close();
?>
