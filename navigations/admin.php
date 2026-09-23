<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
	<link rel="stylesheet" href="../cssDesigns/admin.css?v=2">
</head>
  <body>

    <header>
        <?php include("../header.html"); ?>
	</header>
	<main>
    <h1>Admin</h1>
    <br>
    <button id="rescuedBtn">RESCUED</button>
    <input type="number" id="userID" placeholder="User Id">

    <a href="./apRegestration.php"><button>Assign An AP</button></a><br><br>
    <a href="./apRegestration.php">
    <button>Assign An AP</button>
    </a>
    <button type="button">
    Remove AP
    </button>
    <br><br>

    <div class="report-container"> 
        
        <div id="normalQueue">
            <div id="normalQueueHeader">Normal Queue</div>
            <div id="normalQueueReports"></div>
        </div>

        <div id="vulnerableQueue">
            <div id="vulnerableQueueHeader">Vulnerable Queue</div>
            <div id="vulnerableQueueReports">..VulnerableReorrs</div>
        </div>
    
    </div>
    </main>


    <script src="../admin.js"></script>
</body>
</html>

