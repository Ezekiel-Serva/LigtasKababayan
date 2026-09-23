<?php
session_start();
session_destroy();
header("Location: authPerson.php");
exit;
?>
