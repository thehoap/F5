<?php
session_start();
unset($_SESSION["currUser"]);
header("Location:login.php");
?>