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
    $videotags = $_POST['videotags'];
    $dateToday = date("Y-m-d");

    if(empty($videotitle)){
        $error = true;
        $videotitleError = "Bitte geben Sie den Video-Titel an.";
    }
    if(empty($videolink)){
        $error = true;
        $videolinkError = "Bitte geben Sie den Video-Link an.";
    }
    if(empty($videocode)){
        $error = true;
        $videocodeError = "Bitte f&uuml;gen Sie den Einbettungscode ein.";
    }
    if(empty($videotags)){
    	$error = true;
    	$videotagError = "Bitte geben Sie mindestens einen Tag an.";
    }

    if(!$error) {

    	// insert video itself
        $sql_video_entry = "INSERT INTO content_vid (title, link, code, add_date, added_by) VALUES ('$videotitle', '$videolink', '$videocode', '$dateToday', '$userId');";
        mysqli_query($conn, $sql_video_entry);
        $newvideoID = mysqli_insert_id($conn);
        // insert video tags
        // split user entry in separate tags
    	$videotagsArray = explode(',', $videotags);
    	// for ever tag
    	foreach($videotagsArray as $videotagElement){
    		// delete whitespace at start end end of tag-string
    		$videotagElement = trim($videotagElement);
    		// check if this tag already exists
    		$sql_tag_exist = "SELECT id FROM tags WHERE name LIKE '$videotagElement';";
    		$sql_tag_exist_result = mysqli_query($conn, $sql_tag_exist);
    		$sql_tag_exist_check = mysqli_num_rows($sql_tag_exist_result);
    		// if tag does not exists, $sql_tag_exist_check will be 0
    		if($sql_tag_exist_check == 0){
    			// create new tag
    			$sql_tag_entry = "INSERT INTO tags (name) VALUES ('$videotagElement');";
    			$sql_tag_entry_result = mysqli_query($conn, $sql_tag_entry);
    			// get the id of the tag that we just created
    			$newtagID = mysqli_insert_id($conn);
    			// create new tag association
    			$sql_tag_assoc = "INSERT INTO vid_to_tag (vid_id, tag_id) VALUES ('$newvideoID', '$newtagID');";
    			$sql_tag_assoc_result = mysqli_query($conn, $sql_tag_assoc);
    		} // if tag does exist, $sql_tag_exist_check will be 1
    		  else if($sql_tag_exist_check == 1) {
    			// create new tag association
    			while($row = mysqli_fetch_assoc($sql_tag_exist_result)){
    				$tagID = $row['id'];
	    			$sql_tag_assoc = "INSERT INTO vid_to_tag (vid_id, tag_id) VALUES ('$newvideoID', '$tagID');";
	    			$sql_tag_assoc_result = mysqli_query($conn, $sql_tag_assoc);
    			}
		  	}
		}

        header('Location: videos');
    }
}

?>