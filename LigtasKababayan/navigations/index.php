<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LigtasKababayan</title>
	<link rel="stylesheet" href="../cssDesigns/index.css">
</head>
<body>
    <?php include("../header.html");?>
    <main>      
    <div class="auth-buttons">
		<?php if (isset($_SESSION["fullname"])) { ?>
		<a href="logout.php"><button>Logout</button></a>
		<?php } else { ?>
		<a href="login.php"><button id="login">Login</button></a>		
		<a href="register.php"><button id="register">Register</button></a>	
		<a href="register.php">
		<button id="registerOthers">Register Other User</button>
		</a>
		<?php } ?>
    </div>  
    <h1>LigtasKababayan</h1>    
    <p>LigtasKababayan is a localized, responsive web system designed to bridge the critical communication gap between rural GIDAs, urban GIDAs, and local emergency responders (LGUs/Barangay DRRMOs) before and during severe flooding events. The system operates in two distinct phases to maximize survival rates and logistics efficiency. By doing this, LigtasKababayan aims to reduce rescue response time and prevent deaths due to misinformation and delayed response.</p>
    </main>
		<?php if (isset($_SESSION["barangay"])) { ?>
   		<div class="barangay-box" style="position: fixed; right: 20px; bottom: 20px; color: green;">
        You are currently registered to barangay: <?php echo $_SESSION["barangay"]; ?>
        </div>
		<?php } ?>
</body>
</html>