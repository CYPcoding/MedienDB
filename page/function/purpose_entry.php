<?php
session_start();
require_once '../../db-connect.php';
require_once '../../include/get_userdetails.php';

// header('Set-Cookie: fileLoading=true');

/* Extra check if purpose is filled out (ensures that simply opening this file is not downloading anything) */
$purpose = $_POST['purpose'];
if($purpose = '') {
	header("Location: ../../home");
    exit;
}
$licencetype = $_POST['licencetype'];
$purpose = $_POST['purpose'];
$imgid = $_POST['imgid'];
$dateToday = date("Y-m-d");

$sql_purpose_entry = "INSERT INTO img_usage (img_id, licence_type, purpose, user_id, date) VALUES ('" . $imgid . "', '" . $licencetype . "', '" . $purpose . "', '" . $userId . "', '" . $dateToday . "');";
mysqli_query($conn, $sql_purpose_entry);

/* Force Image Download */

// Get parameters
$sql_getimg = "SELECT path FROM content_img WHERE id =" . $imgid .";";
$result_getimg = mysqli_query($conn, $sql_getimg);
$resultCheckGetImg = mysqli_num_rows($result_getimg);

if ($resultCheckGetImg > 0) {
    while($row_gi = mysqli_fetch_assoc($result_getimg)) {
        $imgPath = $row_gi['path'];
    }
}
$filepath = "../../assets/img/" . $imgPath;

/* saves filepath in cookie for sending to img_download.php */
$_SESSION['filepath'] = $filepath;

$e= "../../index.php?page=userprofiledc" ; 
echo "<script>setTimeout(function(){window.location.href = '$e';} ,2)</script>" ; 
echo "<iframe src='img_download.php'></iframe>" ; 


?>