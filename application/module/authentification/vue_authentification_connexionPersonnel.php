        <h2>Connexion</h2>
        <form method="post">
            <div class='form-group'>
                <input id='ind_login' name='ind_login' type='text' size='50' value='<?= mhe($ind_login) ?>' class='form-control' />
                <label for='ind_login'>login</label>
            </div>

            <div class='form-group'>
                <label for='ind_pwd'>Mot de passe</label>
                <input id='ind_pwd' name='ind_pwd' type='password' size='50' value='' class='form-control' />
            </div>
            <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
        </form>