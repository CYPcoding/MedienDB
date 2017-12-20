<?php
$_SESSION['page'] = 'uploadimg';


 // if session is not set this will redirect to login page
if( !isset($_SESSION['email']) ) {
    header("Location: login");
    exit;
}

$error = false;

if(isset($_POST['newimage'])){

    $file = $_POST['file'];
    $imagesize = $_POST['imagesize'];
    $imagetags = $_POST['imagetags'];
    $licenceonline = $_POST['licenceonline'];
    $licenceprint = $_POST['licenceprint'];
    $dateToday = date("Y-m-d");

    if(empty($file)){
        $error = true;
        $fileError = "Bitte w&auml;hlen Sie eine Bild-Datei aus.";
    }
    if(empty($imagesize)){
        $error = true;
        $imagesizeError = "Bitte geben Sie die Bild-Grösse an.";
    }
    if(empty($imagetags)){
    	$error = true;
    	$imagetagError = "Bitte geben Sie mindestens einen Tag an.";
    }
    if(empty($licenceonline)){
        $error = true;
        $licenceoError = "Bitte geben Sie die Lizenznummer an.";
    }
    if(empty($licenceprint)){
        $error = true;
        $licencepError = "Bitte geben Sie die Lizenznummer an.";
    }

    if(!$error) {

    	$file = $_FILES['file'];
    	$fileName = $_FILES['file']['name'];
    	$fileTmpName = $_FILES['file']['tmp_name'];
    	$fileSize = $_FILES['file']['size'];
    	$fileError = $_FILES['file']['error'];
    	$fileType = $_FILES['file']['type'];

    	$fileExt = explode('.', $fileName);
    	$fileActualExt = strtolower(end($fileExt));

    	$allowed = array('jpg', 'jpeg', 'png');

    	if(in_array($fileActualExt, $allowed)) {
    		if($fileError === 0) {
    			if($fileSize < 5000000) {
    				$fileNameNew = uniqid('', true) . '.' . $fileActualExt;
    				$fileDestination = '../../assets/img/' . $fileNameNew;
    				move_uploaded_file($fileTmpName, $fileDestination);
    				echo 'upload success';
    			} else {
    				$error = true;
    				$fileTooBigError = "Your file is too big!";
    			}
    		} else {
    			$error = true;
    			$uploadError = "There was an error uploading your file!";
    		}
    	} else {
    		$error = true;
    		$fileTypeError = "You cannot upload files of this type!";
    	}

    	// db entries
    	// insert image itself
        $sql_image_entry = "INSERT INTO content_img (path, size, licence_online, licence_print, upload_date, uploaded_by) VALUES ('$file', '$imagesize', '$licenceonline', '$licenceprint', '$dateToday', '$userId');";
        mysqli_query($conn, $sql_image_entry);
        $newimageID = mysqli_insert_id($conn);
        // insert image tags
        // split user entry in separate tags
    	$imagetagsArray = explode(',', $imagetags);
    	// for every tag
    	foreach($imagetagsArray as $imagetagElement){
    		// delete whitespace at start end end of tag-string
    		$imagetagElement = trim($imagetagElement);
    		// check if this tag already exists
    		$sql_tag_exist = "SELECT id FROM tags WHERE name LIKE '$imagetagElement';";
    		$sql_tag_exist_result = mysqli_query($conn, $sql_tag_exist);
    		$sql_tag_exist_check = mysqli_num_rows($sql_tag_exist_result);
    		// if tag does not exists, $sql_tag_exist_check will be 0
    		if($sql_tag_exist_check == 0){
    			// create new tag
    			$sql_tag_entry = "INSERT INTO tags (name) VALUES ('$imagetagElement');";
    			$sql_tag_entry_result = mysqli_query($conn, $sql_tag_entry);
    			// get the id of the tag that we just created
    			$newtagID = mysqli_insert_id($conn);
    			// create new tag association
    			$sql_tag_assoc = "INSERT INTO img_to_tag (img_id, tag_id) VALUES ('$newimageID', '$newtagID');";
    			$sql_tag_assoc_result = mysqli_query($conn, $sql_tag_assoc);
    		} // if tag does exist, $sql_tag_exist_check will be 1
    		  else if($sql_tag_exist_check == 1) {
    			// create new tag association
    			while($row = mysqli_fetch_assoc($sql_tag_exist_result)){
    				$tagID = $row['id'];
	    			$sql_tag_assoc = "INSERT INTO img_to_tag (img_id, tag_id) VALUES ('$newimageID', '$tagID');";
	    			$sql_tag_assoc_result = mysqli_query($conn, $sql_tag_assoc);
    			}
		  	}
		}

        header('Location: bilderuc');
    }
}

?>