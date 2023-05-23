<?php
session_start();
unset($_SESSION["CustID"]);
unset($_SESSION["CustEmail"]);
unset($_SESSION["CustName"]);
unset($_SESSION["CompID"]);
unset($_SESSION["CompEmail"]);
unset($_SESSION["CompName"]);
header("Location: index.php");
?>