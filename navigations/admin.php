<?php 
include("../header.html"); 

echo "ADMIN.PHP";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
	<link rel="stylesheet" href="/LigtasKababayan_App/style.css">
</head>
  <body>

    <header>
    <h1>Admin</h1>
	</header>
	  
    <input type="number" id="userID" placeholder="User Id"><br>
    <button id="rescuedBtn">RESCUED</button>

    <div id="reports"></div>

    <script src="admin.js"></script>
</body>
</html>

