<?php

?>

<div class="uk-position-center uploadvid">
<form class="uk-form-horizontal" action="uploadvid" method="POST">
    <fieldset class="uk-fieldset">

        <legend class="uk-legend"><span class="uk-float-left" uk-icon="icon: video-camera; ratio: 2"></span>&nbsp;Neues Video erfassen</legend>

            <p>Alle mit * markierten Felder sind Pflicht</p>
            <div class="uk-margin">
        		<div uk-form-custom>
        			<label class="uk-text-left" style="margin-right: 107px;">Titel *</label>
            		<input class="uk-input uk-form-width-large" type="text" name="videotitle" value="<?php if(isset($_POST['videotitle'])){ echo $_POST['videotitle']; } ?>"><br>
                    <span class="uk-text-danger"><?php echo $videotitleError; ?></span>
        		</div>
    		</div>
            <div class="uk-margin">
        		<div uk-form-custom>
        			<label class="uk-text-left" style="margin-right: 59px;">Wistia-Link *</label>
            		<input class="uk-input uk-form-width-large" type="text" name="videolink" value="<?php if(isset($_POST['videolink'])){ echo $_POST['videolink']; } ?>"><br>
                    <span class="uk-text-danger"><?php echo $videolinkError; ?></span>
        		</div>
    		</div>
    		<div class="uk-margin">
    			<label class="uk-text-left" style="margin-right: 19px;">Einbettungscode *<br>(Popover Embed<br>mit <strong>Thumbnail</strong>)</label>
            	<textarea class="uk-textarea uk-form-width-large" style="max-width: 500px" rows="5" name="videocode"><?php if(isset($_POST['videocode'])){ echo $_POST['videocode']; } ?></textarea><br>
                <span class="uk-text-danger"><?php echo $videocodeError; ?></span>
        	</div>
            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                <label class="uk-text-left" style="margin-right: 86px;">Tags *<br>mit Komma (,) trennen</label>
                <input class="uk-input uk-form-width-large" type="text" name="videotags" value="<?php if(isset($_POST['videotags'])){ echo $_POST['videotags']; } ?>"><br>
                <span class="uk-text-danger"><?php echo $videotagError; ?></span>
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
    		<button class="uk-button uk-button-primary" type="submit" name="newvideo" style="width: 500px; margin-left: 152px">Video in Mediendatenbank speichern</button>

    </fieldset>
</form>
</div>