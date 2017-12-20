<?php

if( !isset($_SESSION['email']) || $userRole == 'User' ) {
    header("Location: login");
    exit;
}

$_SESSION['page'] = 'rangliste';

?>