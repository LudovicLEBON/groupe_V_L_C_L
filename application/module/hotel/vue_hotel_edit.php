    <form method="post" action="<?=hlien("hotel","save")?>">
		<input type="hidden" name="hot_id" id="hot_id" value="<?= $id ?>" />
		
                        <div class='form-group'>
                            <label for='hot_nom'>Nom</label>
                            <input id='hot_nom' name='hot_nom' type='text' size='50' value='<?=mhe($hot_nom)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='hot_telephone'>Telephone</label>
                            <input id='hot_telephone' name='hot_telephone' type='text' size='50' value='<?=mhe($hot_telephone)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='hot_adresse'>Adresse</label>
                            <input id='hot_adresse' name='hot_adresse' type='text' size='50' value='<?=mhe($hot_adresse)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='hot_longitude'>Longitude</label>
                            <input id='hot_longitude' name='hot_longitude' type='text' size='50' value='<?=mhe($hot_longitude)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='hot_latitude'>Latitude</label>
                            <input id='hot_latitude' name='hot_latitude' type='text' size='50' value='<?=mhe($hot_latitude)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='hot_photo'>Photo</label>
                            <input id='hot_photo' name='hot_photo' type='text' size='50' value='<?=mhe($hot_photo)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='hot_descriptif'>Descriptif</label>
                            <input id='hot_descriptif' name='hot_descriptif' type='text' size='50' value='<?=mhe($hot_descriptif)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='hot_statut'>Statut</label>
                            <input id='hot_statut' name='hot_statut' type='text' size='50' value='<?=mhe($hot_statut)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='hot_standing'>Standing</label>
                            <input id='hot_standing' name='hot_standing' type='text' size='50' value='<?=mhe($hot_standing)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              