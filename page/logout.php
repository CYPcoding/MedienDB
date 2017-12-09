<?php
session_start();
session_destroy();
echo 'Logout successfull';
header("Location: ../page/login.php");

?>