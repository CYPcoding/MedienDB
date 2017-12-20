<?php

if( !isset($_SESSION['email']) ) {
    header("Location: login");
    exit;
}

$_SESSION['page'] = 'bilder';
$_SESSION['s'] = $_GET['s'];

?>
