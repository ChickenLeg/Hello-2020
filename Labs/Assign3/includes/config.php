<?php

$host = "localhost";
$username = "hellocom_portaluser";
$password = "a5078:DjNCU+js";
$database = "hellocom_paintingportal";

$con = mysqli_connect($host, $username, $password, $database);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>