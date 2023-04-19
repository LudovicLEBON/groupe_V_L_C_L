<h3>Inscription</h3>
<div class="form">
    <form method="post" onsubmit="return verification()">
        <div class='form-group'>
            <label for='cli_nom'>Nom</label>
            <input id='cli_nom' name='cli_nom' type='text' size='500' value='<?= mhe($cli_nom) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='cli_prenom'>Prénom</label>
            <input id='cli_prenom' name='cli_prenom' type='text' size='500' value='<?= mhe($cli_prenom) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='cli_login'>login</label>
            <input id='cli_login' name='cli_login' type='text' size='500' value='<?= mhe($cli_login) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='cli_pwd'>Mot de passe</label>
            <input id='cli_pwd' name='cli_pwd' type='password' size='500' value='' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='cli_pwd2'>Vérification du Mot de passe</label>
            <input id='cli_pwd2' name='cli_pwd2' type='password' size='500' value='' class='form-control' />
        </div>

        <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
    </form>
</div>
<script>
    function verification() {
        if (cli_pwd.value == cli_pwd2.value)
            return true;
        else {
            alert("Erreur : vérification du mot de passe incorrecte.");
            return false;
        }
    }
</script>