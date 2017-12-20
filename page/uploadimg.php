<?php

?>

<div class="uk-position-center uploadimg">
<form class="uk-form-horizontal" action="uploadimg" method="POST" enctype="multipart/form-data">
    <fieldset class="uk-fieldset">

        <legend class="uk-legend"><span class="uk-float-left" uk-icon="icon: image; ratio: 2"></span>&nbsp;Neues Bild erfassen</legend>
            <span class="uk-text-danger"><?php echo $fileTooBigError; echo $uploadError; echo $fileTypeError; ?></span>
            <p>Alle mit * markierten Felder sind Pflicht</p>
        	<div class="uk-margin" uk-margin>
        		<div>
        			<label class="uk-text-left" style="margin-right: 30px;">Datei *</label>
            		<input type="file" name="file" accept="image/*" required>
        		</div>
    		</div>
            <div class="uk-margin">
        		<div uk-form-custom>
        			<label class="uk-text-left" style="margin-right: 19px;">Grösse *</label>
            		<input class="uk-input" style="width: 337px" type="text" placeholder="1920 x 720 px" name="imagesize" value="<?php if(isset($_POST['imagesize'])){ echo $_POST['imagesize']; } ?>"><br>
                    <span class="uk-text-danger"><?php echo $imagesizeError; ?></span>
        		</div>
    		</div>
    		<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
    			<label class="uk-text-left" style="margin-right: 86px;">Tags *<br>mit Komma (,) trennen</label>
                <input class="uk-input uk-form-width-large" type="text" name="imagetags" value="<?php if(isset($_POST['imagetags'])){ echo $_POST['imagetags']; } ?>"><br>
                <span class="uk-text-danger"><?php echo $imagetagError; ?></span>
            </div>
            <style>
            .uk-label {
                background: #949494;
            }
            </style>
                <?php
                $sql_tags = "SELECT * FROM tags LIMIT 8;";
                $result_tags = mysqli_query($conn, $sql_tags);
                $resultCheckTag = mysqli_num_rows($result_tags);

                if($resultCheckTag > 0){
                    echo '
                    <p>Beispiel: <span class="uk-label">';
                    while($row = mysqli_fetch_assoc($result_tags)){
                        echo $row['name'] . ', ';
                    }
                    echo '...</span></p>';
                }
                ?>
            <div class="uk-margin">
        		<div uk-form-custom>
        			<label class="uk-text-left" style="margin-right: 24px;">Lizenz *</label>
        			<label class="uk-text-left" style="margin-right: 19px;">online *</label>
            		<input class="uk-input" style="width: 260px" type="text" placeholder="187333325" name="licenceonline" value="<?php if(isset($_POST['licenceonline'])){ echo $_POST['licenceonline']; } ?>"><br>
                    <span class="uk-text-danger"><?php echo $licenceoError; ?></span>
            		<br><br>
        			<label class="uk-text-left" style="margin-left: 83px; margin-right: 29px">print *</label>
            		<input class="uk-input" style="width: 260px" type="text" placeholder="182214579" name="licenceprint" value="<?php if(isset($_POST['licenceprint'])){ echo $_POST['licenceprint']; } ?>"><br>
                    <span class="uk-text-danger"><?php echo $licencepError; ?></span>
        		</div>
    		</div>
    		<button class="uk-button uk-button-primary" type="submit" name="newimage" style="width: 337px; margin-left: 84px">Bild in Mediendatenbank speichern</button>

    </fieldset>
</form>
</div>