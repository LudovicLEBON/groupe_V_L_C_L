    <form method="post" action="<?=hlien("prestation","save")?>">
		<input type="hidden" name="pre_id" id="pre_id" value="<?= $id ?>" />
		
                        <div class='form-group'>
                            <label for='pre_service'>Service</label>
                            <input id='pre_service' name='pre_service' type='text' size='50' value='<?=mhe($pre_service)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='pre_hotel'>Hotel</label>
                            <input id='pre_hotel' name='pre_hotel' type='text' size='50' value='<?=mhe($pre_hotel)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='pre_prix'>Prix</label>
                            <input id='pre_prix' name='pre_prix' type='text' size='50' value='<?=mhe($pre_prix)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              