    <form method="post" action="<?= hlien("individu", "save") ?>">
        <input type="hidden" name="ind_id" id="ind_id" value="<?= $id ?>" />

        <div class='form-group'>
            <label for='ind_nom'>Nom</label>
            <input readonly id='ind_nom' name='ind_nom' type='text' size='50' value='<?= mhe($ind_nom) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='ind_prenom'>Prenom</label>
            <input readonly id='ind_prenom' name='ind_prenom' type='text' size='50' value='<?= mhe($ind_prenom) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='ind_login'>Login</label>
            <input readonly id='ind_login' name='ind_login' type='text' size='50' value='<?= mhe($ind_login) ?>' class='form-control' />
        </div>

        <div class='form-group'>
            <label for='ind_profil'>Profil</label>
            <select id='ind_profil' name='ind_profil' class='form-control'>
                <?= Table::HTMLoptions("select * from profil where pro_id>2", "pro_id", "pro_libelle", $ind_profil) ?>
            </select>
        </div>
        <div class='form-group'>
            <label for='ind_hotel'>Hotel</label>
            <select id='ind_hotel' name='ind_hotel' class='form-control'>
                <?= Table::HTMLoptions("select * from hotel", "hot_id", "hot_nom", $ind_hotel) ?>
            </select>
        </div>
        <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
    </form>