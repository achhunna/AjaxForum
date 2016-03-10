<?php

$dbHost = "";
$dbUser = "";
$dbPassword = "";
$dbName = "";

$con = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
// Check connection
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
