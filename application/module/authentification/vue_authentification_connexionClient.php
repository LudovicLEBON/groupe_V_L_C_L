<h3>Connexion</h3>
        <form method="post">
            <div class='form-group'>
                <label for='cli_login'>login</label>
                <input id='cli_login' name='cli_login' type='text' size='50' value='<?= mhe($cli_login) ?>' class='form-control' />
            </div>

            <div class='form-group'>
                <label for='cli_pwd'>Mot de passe</label>
                <input id='cli_pwd' name='cli_pwd' type='password' size='50' value='' class='form-control' />
            </div>
            <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
        </form>