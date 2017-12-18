<?php
$_SESSION['page'] = 'uploadvid';


 // if session is not set this will redirect to login page
if( !isset($_SESSION['email']) ) {
    header("Location: login");
    exit;
}

$error = false;

if(isset($_POST['newvideo'])){

    $videotitle = $_POST['videotitle'];
    $videolink = $_POST['videolink'];
    $videocode = $_POST['videocode'];
    $dateToday = date("Y-m-d");

    if(empty($videotitle)){
        $error = true;
        $videotitleError = "Bitte geben Sie Video-Titel an.";
    }
    if(empty($videolink)){
        $error = true;
        $videolinkError = "Bitte geben Sie den Video-Link an.";
    }
    if(empty($videocode)){
        $error = true;
        $videocodeError = "Bitte f&uuml;gen Sie den Einbettungscode ein.";
    }

    if(!$error) {

        $sql_video_entry = "INSERT INTO content_vid (title, link, code, add_date, added_by) VALUES ('$videotitle', '$videolink', '$videocode', '$dateToday', '$userId');";
        mysqli_query($conn, $sql_video_entry);

        header('Location: videos');
    }
}

?>