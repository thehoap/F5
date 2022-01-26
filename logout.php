<?php
session_start();
unset($_SESSION["currUser"]);
unset($_SESSION["currAdmin"]);
header("Location:login.php");
?>