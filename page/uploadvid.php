<?php


?>


<div class="uk-position-center uploadvid">
<form class="uk-form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] . '?page=uploadvid'; ?>" method="POST">
    <fieldset class="uk-fieldset">

        <legend class="uk-legend"><span class="uk-float-left" uk-icon="icon: video-camera; ratio: 2"></span>&nbsp;Neues Video erfassen</legend>

            <p>Alle mit * markierten Felder sind Pflicht</p>
            <div class="uk-margin">
        		<div uk-form-custom>
        			<label class="uk-text-left" style="margin-right: 107px;">Titel *</label>
            		<input class="uk-input uk-form-width-large" type="text" name="videotitle" value="<?php if(isset($_POST['videotitle'])){ echo $_POST['videotitle']; } ?>" required>
                    <span class="text-danger"><?php echo $videotitleError; ?></span>
        		</div>
    		</div>
            <div class="uk-margin">
        		<div uk-form-custom>
        			<label class="uk-text-left" style="margin-right: 59px;">Wistia-Link *</label>
            		<input class="uk-input uk-form-width-large" type="text" name="videolink" required>
                    <span class="text-danger"><?php echo $videolinkError; ?></span>
        		</div>
    		</div>
    		<div class="uk-margin">
    			<label class="uk-text-left" style="margin-right: 19px;">Einbettungscode *<br>(Popover Embed<br>mit <strong>Thumbnail</strong>)</label>
            	<textarea class="uk-textarea uk-form-width-large" style="max-width: 500px" rows="5" name="videocode" required></textarea>
                <span class="text-danger"><?php echo $videocodeError; ?></span>
        	</div>
            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                <label class="uk-text-left" style="margin-right: 86px;">Tags *&nbsp;&nbsp;</label>
                <?php
                $sql_tags = "SELECT * FROM tags;";
                $result_tags = mysqli_query($conn, $sql_tags);
                $resultCheckTag = mysqli_num_rows($result_tags);

                if($resultCheckTag > 0){
                    while($row = mysqli_fetch_assoc($result_tags)){
                        echo '<label><input class="uk-checkbox" type="checkbox" name="' . $row['name'] . '" value="' . $row['name'] . '">&nbsp;<span class="uk-label">' . $row['name'] . '</span></label>
                        ';
                    }
                }
                ?>
            </div>
    		<button class="uk-button uk-button-primary" type="submit" name="newvideo" style="width: 500px; margin-left: 152px">Video in Mediendatenbank speichern</button>

    </fieldset>
</form>
</div>