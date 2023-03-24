    <form method="post" action="<?=hlien("categorie","save")?>">
		<input type="hidden" name="cat_id" id="cat_id" value="<?= $id ?>" />
		
                        <div class='form-group'>
                            <label for='cat_libelle'>Libelle</label>
                            <input id='cat_libelle' name='cat_libelle' type='text' size='50' value='<?=mhe($cat_libelle)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              