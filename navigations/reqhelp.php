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

   	<b>1. Name:</b><br>
    <input type="text" id="name" placeholder="Fist name, Lastname">
	
    <br><br>

    <b>2. Water Level::</b><br>
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

    <b>3. Location:</b><br>
    <button type="button" id="locate">Get My Location</button>
    <!--Latitude/Longitude Locator Id-->
    <input type="hidden" id="lat">
    <input type="hidden" id="lng">
	<br><br>
    
	<b>4. Description:</b><br>
	<textarea rows="8" cols="30" id="locationDesc" placeholder="Description..."></textarea><br>
	<br>
	<b>5. Send a Picture:</b><br>
    <input type="file" id="cameraInput" accept="image/*">
    

    <br><br>

	
	<b>6. Headcount:</b><br>
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
	<b>7. Phone Number:</b><br>
    <input type="tel" id="phone" placeholder="Phone Number">

    <br><br>

	<b>8. Present Vulnerable Person:</b><br><br>
	Select here if you are WITH a vulnerable person
	<select name="with_v" id="with_Vul">
		<option value="">- Please Select an option -</option>
		<option value="with_senior_citizen">Senior Citizen</option>
		<option value="with_children/baby">Children/Baby</option>
		<option value="with_pregnant">Pregnant</option>
		<option value="with_pwd">PWD</option>
		<option value="with_injured">Injjred</option>
	</select>
	
	<br><br>
	
	Select here if you are THE vulnerable person
	<select name="user_v" id="user_Vul">
		<option value="">- Please Select an option -</option>
		<option value="user_senior_citizen">Senior Citizen</option>
		<option value="user_child">Child</option>
		<option value="user_pregnant">Pregnant</option>
		<option value="user_pwd">PWD</option>
		<option value="user_injured">Injured</option>
	</select>	

	<br><br>
    <button type="button" id="submit">Submit Information</button>

    <p id="info">Pending Report…</p>

    <script src="../script.js"></script>
</body>
</html>
