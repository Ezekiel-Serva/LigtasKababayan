<?php include("../header.html"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request Help</title>
	<link rel="stylesheet" href="/LigtasKababayan_App/style.css">
</head>
  <body>
    
    <header>
      <h1>Request Help</h1>
    </header>
    
    <p>Please fill in the fields below.</p>

    <label><b>1. Name:</b></label><br>
    <input type="text" id="name" placeholder="Fist name, Lastname">

    <br><br>

    <label><b>2. Water Level:</b></label><br>

    <input type="radio" name="level" value="Ankle" id="ankle">
    Ankle
    <br>
    <input type="radio" name="level" value="Knee" id="knee">
    Knee
    <br>
    <input type="radio" name="level" value="Waist" id="waist">
    Waist
    <br>
    <input type="radio" name="level" value="Neck" id="neck">
    Chest/Neck
    <br>
    <input type="radio" name="level" value="Head" id="head">
    Head/Submerged

    <br><br>

    <label><b>3. Location:</b></label><br>
    <button type="button" id="locate">Get My Location</button>
    <br><br>
    
	<label>4. Description (optional):</label>
	<textarea rows="8" cols="30" id="locationDesc" placeholder="Description..."></textarea><br>
	<br>
	<label>5. Upload a photo:</label>
    <input type="file" id="cameraInput" accept="image/*">
    
	<!--Latitude/Longitude Locator Id-->
    <input type="hidden" id="lat">
    <input type="hidden" id="lng">

    <br><br>

    <label><b>4. Headcount:</b></label><br>

    <input type="radio" name="peoples" id="count1" value="1-10">
    1-10

    <br>
    <input type="radio" name="peoples" id="count2" value="11-20">
  	11-20

    <br>
    <input type="radio" name="peoples" id="count3" value="21-30">
   	21-30

    <br>
    <input type="radio" name="peoples" id="count4" value="31-40">
	31-40

    <br>
    <input type="radio" name="peoples" id="count5" value="41-50">
    41-50

	<br>
    <input type="radio" name="peoples" id="count5" value="50+">
    50+

    <br><br>
    <label><b>5. Phone Number:</b></label><br>
    <input type="tel" id="phone" placeholder="Phone Number">

    <br><br>
    <button type="button" id="submit">Submit Information</button>

    <p id="info">Pending Report…</p>

    <script src="script.js"></script>
    </body>
  </html>
