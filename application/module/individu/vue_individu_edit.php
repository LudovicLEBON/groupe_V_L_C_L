    <form method="post" action="<?=hlien("individu","save")?>">
		<input type="hidden" name="ind_id" id="ind_id" value="<?= $id ?>" />
		
                        <div class='form-group'>
                            <label for='ind_nom'>Nom</label>
                            <input id='ind_nom' name='ind_nom' type='text' size='50' value='<?=mhe($ind_nom)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='ind_prenom'>Prenom</label>
                            <input id='ind_prenom' name='ind_prenom' type='text' size='50' value='<?=mhe($ind_prenom)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='ind_login'>Login</label>
                            <input id='ind_login' name='ind_login' type='text' size='50' value='<?=mhe($ind_login)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='ind_pwd'>Pwd</label>
                            <input id='ind_pwd' name='ind_pwd' type='text' size='50' value='<?=mhe($ind_pwd)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='ind_profil'>Profil</label>
                            <input id='ind_profil' name='ind_profil' type='text' size='50' value='<?=mhe($ind_profil)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='ind_hotel'>Hotel</label>
                            <input id='ind_hotel' name='ind_hotel' type='text' size='50' value='<?=mhe($ind_hotel)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              