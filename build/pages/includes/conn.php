<?php

$dbHost = "Localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "cart";

	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
	if(!$conn){
		die ("Cannot connect to the database");
	}
?>	
