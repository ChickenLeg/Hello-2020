<?php
session_start();
include("includes/config.php");
$_SESSION['login']=="";
date_default_timezone_set('America/New_York');

// Write code for log out from the session
//$_SESSION['fullname'] = $_SESSION['fullname'] = $_SESSION['fullname'] = $_SESSION['fullname'] = $_SESSION['fullname']= $_SESSION['fullname']="";
unset($_SESSION["email"]);
unset($_SESSION["password"]);
$_SESSION['login'] = FALSE;
$_SESSION['cart'] = array();
?>
<script language="javascript">
document.location="index.php";
</script>
