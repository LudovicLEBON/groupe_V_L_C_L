    <form method="post" action="<?=hlien("standing","save")?>">
		<input type="hidden" name="sta_id" id="sta_id" value="<?= $id ?>" />
		
                        <div class='form-group'>
                            <label for='sta_libelle'>Libelle</label>
                            <input id='sta_libelle' name='sta_libelle' type='text' size='50' value='<?=mhe($sta_libelle)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              