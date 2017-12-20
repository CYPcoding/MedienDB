<?php
// session_start();
// require_once '../db-connect.php';

if(isset($_SESSION['email'])){
    // gets Username
    $email_SS = $_SESSION['email'];
    $sql_username = "SELECT id, name, role FROM users WHERE email='$email_SS';";
    $result_username = mysqli_query($conn, $sql_username);
    $resultCheck_username = mysqli_num_rows($result_username);

    if($resultCheck_username > 0){
        while($row_u = mysqli_fetch_assoc($result_username)){
        	$userId = $row_u['id'];
            $userName = $row_u['name'];
            $userRole = $row_u['role'];
        }
    }
}

?>