<?php
date_default_timezone_set('Asia/Manila');
$conn = new mysqli(
  "127.0.0.1",
  "root",
  "",
  "ligtaskababayan_db"
);

if($conn->connect_error){ 
  http_response_code(500); 
  echo "Could not connect to the database"; 
  exit; 
} 
?>