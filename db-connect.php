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
  die("Connection failed: " . mysqli_connect_error());
 }
 echo "Connected successfully";
 
 ?>