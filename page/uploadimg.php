<div class="uk-position-center uploadimg">
<form class="uk-form-horizontal">
    <fieldset class="uk-fieldset">

        <legend class="uk-legend">Neues Bild erfassen</legend>

        	<div class="uk-margin" uk-margin>
        		<div uk-form-custom="target: true">
        			<label class="uk-text-left" style="margin-right: 30px;">Datei *</label>
            		<input type="file" required>
            		<input class="uk-input uk-form-width-medium" style="width: 337px" type="text" placeholder="Datei auswählen..." disabled>
        		</div>
    		</div>
            <div class="uk-margin">
        		<div uk-form-custom>
        			<label class="uk-text-left" style="margin-right: 19px;">Grösse *</label>
            		<input class="uk-input" style="width: 337px" type="text" placeholder="1920 x 720 px" required>
        		</div>
    		</div>
    		<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
    			<label class="uk-text-left" style="margin-right: 19px;">Tags *&nbsp;&nbsp;</label>
            	<label><input class="uk-checkbox" type="checkbox">&nbsp;<span class="uk-label">BFE</span></label>
            	<label><input class="uk-checkbox" type="checkbox">&nbsp;<span class="uk-label">PAB</span></label>
            	<label><input class="uk-checkbox" type="checkbox">&nbsp;<span class="uk-label">Banking</span></label>
            	<label><input class="uk-checkbox" type="checkbox">&nbsp;<span class="uk-label">BFK</span></label>
        	</div>
            <div class="uk-margin">
        		<div uk-form-custom>
        			<label class="uk-text-left" style="margin-right: 24px;">Lizenz *</label>
        			<label class="uk-text-left" style="margin-right: 19px;">online *</label>
            		<input class="uk-input" style="width: 260px" type="text" placeholder="187333325" required>
            		<br><br>
        			<label class="uk-text-left" style="margin-left: 83px; margin-right: 29px">print *</label>
            		<input class="uk-input" style="width: 260px" type="text" placeholder="182214579" required>
        		</div>
    		</div>
    		<button class="uk-button uk-button-primary" style="width: 337px; margin-left: 84px">speichern</button>
    		<p>Alle mit * markierten Felder sind Pflicht</p>

    </fieldset>
</form>
</div>