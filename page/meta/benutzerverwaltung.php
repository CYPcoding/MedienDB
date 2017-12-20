<?php

if( !isset($_SESSION['email']) || $userRole == 'User' ) {
    header("Location: login");
    exit;
}

$_SESSION['page'] = 'benutzerverwaltung';
$_SESSION['s'] = $_GET['s'];

$error = false;

if(isset($_POST['newuserEntry'])) {

	$newuserName = $_POST['newuserName'];
	$newuserEmail = $_POST['newuserEmail'];
	$newuserPassword = $_POST['newuserPassword'];
	$newuserRole = $_POST['newuserRole'];

	// Hash Password
	$hashedPassword = password_hash($newuserPassword, PASSWORD_DEFAULT);

	if(empty($newuserName)){
		$error = true;
		$newusernameError = "Bitte geben Sie den Vor- und Nachnamen an.";
	}
	if(empty($newuserEmail)){
		$error = true;
		$newuseremailError = "Bitte geben Sie die E-Mailadresse an.";
	}
	if(empty($newuserPassword)){
		$error = true;
		$newuserpasswordError = "Bitte geben Sie ein Passwort an.";
	}
	if(!$error) {
		$sql_newuser_entry = "INSERT INTO users (name, email, password, role) VALUES ('$newuserName', '$newuserEmail', '$hashedPassword', '$newuserRole');";
		mysqli_query($conn, $sql_newuser_entry);

	}
}

?>