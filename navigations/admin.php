<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
	<link rel="stylesheet" href="../cssDesigns/admin.css">
</head>
  <body>

    <header>
        <?php include("../header.html"); ?>
	</header>
	<main>
    <h1>Admin</h1>
    <a href="vulnerablePage.php"><button id="vulnerableQueue">Vulnerable Queue</button></a>
    <br><br>
    <button id="rescuedBtn">RESCUED</button>
    <input type="number" id="userID" placeholder="User Id"><br>

    <div class="report-cont">     
        <div id="reports"></div>
    </div>
    </main>


    <script src="../admin.js"></script>
</body>
</html>

