<h2>Inscription du personnel</h2>
<form method="post" onsubmit="return verification()">
    <div class='form-group'>
        <label for='ind_nom'>Nom</label>
        <input id='ind_nom' name='ind_nom' type='text' size='500' value='<?= mhe($ind_nom) ?>' class='form-control' />
    </div>
    <div class='form-group'>
        <label for='ind_prenom'>Prénom</label>
        <input id='ind_prenom' name='ind_prenom' type='text' size='500' value='<?= mhe($ind_prenom) ?>' class='form-control' />
    </div>
    <div class='form-group'>
        <label for='ind_login'>login</label>
        <input id='ind_login' name='ind_login' type='text' size='500' value='<?= mhe($ind_login) ?>' class='form-control' />
    </div>
    <div class='form-group'>
        <label for='ind_pwd'>Mot de passe</label>
        <input id='ind_pwd' name='ind_pwd' type='password' size='500' value='' class='form-control' />
    </div>
    <div class='form-group'>
        <label for='ind_pwd2'>Vérification du Mot de passe</label>
        <input id='ind_pwd2' name='ind_pwd2' type='password' size='500' value='' class='form-control' />
    </div>
    <div class='form-group'>
        <label for='ind_hotel'>Hôtel d'affectation</label>
        <select id='ind_hotel' name='ind_hotel' class='form-control'>
            <?= Table::HTMLoptions("select * from hotel order by hot_nom", "hot_id", "hot_nom", $ind_hotel) ?>
        </select>
    </div>

    <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
</form>
<script>
    function verification() {
        if (ind_pwd.value == ind_pwd2.value)
            return true;
        else {
            alert("Erreur : vérification du mot de passe incorrecte.");
            return false;
        }
    }
</script>