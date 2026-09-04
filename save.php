<?php

include("database_conn.php");

if($conn->connect_error){
  http_response_code(500);
  echo "Could not connect to the database";
  exit;
}


// ========================
// GET FORM DATA
// ========================

$name = $_POST["name"] ?? "";
$waterLevel = $_POST["water_level"] ?? "";
$lat = $_POST["lat"] ?? "";
$lng = $_POST["lng"] ?? "";
$description = $_POST["description"] ?? "";
$headcount = $_POST["headcount"] ?? "";
$phone = $_POST["phone"] ?? "";


// ========================
// GET PHOTO
// ========================

$photoPath = null;

if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK){

    $photo = $_FILES["photo"];

    $fileName = basename($photo["name"]);

    $photoPath = "uploads/" . $fileName;

    move_uploaded_file(
        $photo["tmp_name"],
        $photoPath
    );
}


// ========================
// INSERT INTO DATABASE
// ========================

$statement = $conn->prepare("
  INSERT INTO user_info
  (name, water_level, lat, lng, description, headcount, phone, photo)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)
");

$statement->bind_param(
  "ssddssss",
  $name,
  $waterLevel,
  $lat,
  $lng,
  $description,
  $headcount,
  $phone,
  $photoPath
);


if($statement->execute()){
  echo "Report saved succesfully!";
}
else {
  http_response_code(500);
  echo "DB error:" . $statement->error;
}

$statement->close();
$conn->close();

?>