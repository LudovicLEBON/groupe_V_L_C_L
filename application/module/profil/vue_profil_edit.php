    <form method="post" action="<?=hlien("profil","save")?>">
		<input type="hidden" name="pro_id" id="pro_id" value="<?= $id ?>" />
		
                        <div class='form-group'>
                            <label for='pro_libelle'>Libelle</label>
                            <input id='pro_libelle' name='pro_libelle' type='text' size='50' value='<?=mhe($pro_libelle)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              