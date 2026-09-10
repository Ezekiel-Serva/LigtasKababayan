<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request Help</title>
	<link rel="stylesheet" href="/LigtasKababayan_App/cssDesigns/reqhelp.css">
</head>
<body>  
    <header>
        <?php include("../header.html"); ?>
    </header>
      <h1>Request Help</h1>
    
    <p>Please fill in the fields below.</p>

    <div class="nameField">
        <b>1. Name:</b><br>
        <input type="text" id="name" placeholder="Fist name, Lastname">
        <br>    
    </div>
    <br>
    <div class="waterlvlField">      
        <b>2. Water Level:</b><br>
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
    </div>

    <br>
    
    <div class="locationsField">        
        <b>3. Location:</b><br>
        <button type="button" id="locate">Get My Location</button>
        <!--Latitude/Longitude Locator Id-->
        <input type="hidden" id="lat">
        <input type="hidden" id="lng">
    	<br><br>

        <hr>
    
    	<b>4. Description:</b><br>
    	<textarea rows="8" cols="30" id="locationDesc" placeholder="Description..."></textarea><br>
    	<br>

        <hr>
        
    	<b>5. Send a Picture:</b><br>
        <input type="file" id="imgInput" accept="image/*">
    </div>
    
    <br>

	<div class="headcountField">       
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
    </div>

    <br>
    
    <div class="phoneNumField">       
	    <b>7. Phone Number:</b><br>
        <input type="tel" id="phone" placeholder="Phone Number">
    </div>
    
    <br>

    <div class="vulnerableField">
    	<b>8. Present Vulnerable Person:</b><br>
    	Select here if you are WITH a vulnerable person<br>
    	<select name="WITH_USER">
    		<option value="">- Please Select an option -</option>
    		<option value="Senior_Citizen">Senior Citizen</option>
    		<option value="Children/Baby">Children/Baby</option>
    		<option value="Pregnant">Pregnant</option>
    		<option value="PWD">PWD</option>
    		<option value="Injured">Injured</option>
    	</select>
	
	    <br><br><hr>
	
    	Select here if you are THE vulnerable person
    	<select name="USER">
    		<option value="">- Please Select an option -</option>
    		<option value="Senior_Citizen">Senior Citizen</option>
    		<option value="Child">Child</option>
    		<option value="Pregnant">Pregnant</option>
    		<option value="PWD">PWD</option>
    		<option value="Injured">Injured</option>
    	</select>
    </div>

	<br><br>
    <button type="button" id="submit">Submit Information</button>

    <p>Report Information: <span id="info"></span></p>

    <script src="../script.js"></script>
</body>
</html>
