<?php

// this will avoid mysqli_connect() deprecation error.
error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 
$servername = "mf14r0409.sui-inter.net";
$username = "Dev_MediaDBuser";
$password = "kgY939r_xBso67#0wwDo4&90";
$dbname = "Dev_MediaDB";
 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
if (!$conn) {
 	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  	die("Connection failed: " . mysqli_connect_error());
}
?>
