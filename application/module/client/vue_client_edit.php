    <form method="post" action="<?=hlien("client","save")?>">
		<input type="hidden" name="cli_id" id="cli_id" value="<?= $id ?>" />
		
                        <div class='form-group'>
                            <label for='cli_nom'>Nom</label>
                            <input id='cli_nom' name='cli_nom' type='text' size='50' value='<?=mhe($cli_nom)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cli_prenom'>Prenom</label>
                            <input id='cli_prenom' name='cli_prenom' type='text' size='50' value='<?=mhe($cli_prenom)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cli_login'>Login</label>
                            <input id='cli_login' name='cli_login' type='text' size='50' value='<?=mhe($cli_login)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cli_pwd'>Pwd</label>
                            <input id='cli_pwd' name='cli_pwd' type='text' size='50' value='<?=mhe($cli_pwd)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cli_profil'>Profil</label>
                            <input id='cli_profil' name='cli_profil' type='text' size='50' value='<?=mhe($cli_profil)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              