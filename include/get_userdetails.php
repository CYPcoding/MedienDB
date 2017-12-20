<?php

if(isset($_SESSION['email'])){
    $userId = $_SESSION['id'];
    $userName = $_SESSION['name'];
    $userEmail = $_SESSION['email'];
    $userRole = $_SESSION['role'];
}

?>