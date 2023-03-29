    <form method="post" action="<?= hlien("chambre", "save") ?>">
        <input type="hidden" name="cha_id" id="cha_id" value="<?= $id ?>" />

        <div class='form-group'>
            <label for='cha_nom'>Nom</label>
            <input id='cha_nom' name='cha_nom' type='text' size='50' value='<?= mhe($cha_nom) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='cha_photo'>Photo</label>
            <input id='cha_photo' name='cha_photo' type='text' size='50' value='<?= mhe($cha_photo) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='cha_descriptif'>Descriptif</label>
            <input id='cha_descriptif' name='cha_descriptif' type='text' size='50' value='<?= mhe($cha_descriptif) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='cha_statut'>Statut</label>
            <?php $statut = ["libre", "travaux", "occupé"]; ?>
            <select id='cha_statut' name='cha_statut' class='form-control'>
                <?php foreach ($statut as $key) {
                    $selected = ($key === $cha_statut) ? "selected" : ""; ?>
                    <option value="<?= $key ?>" <?= $selected ?>><?= $key ?></option>
                <?php } ?>
            </select>
        </div>
        <div class='form-group'>
            <label for='cha_surface'>Surface</label>
            <input id='cha_surface' name='cha_surface' type='number' size='50' value='<?= mhe($cha_surface) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='cha_type_lit'>Type_lit</label>
            <?php $lit = ["lit double confort", "lit double standard queen size", "2 lits simples", "1 lit double et 1 lit simple", "lit double king size"]; ?>
            <select id='cha_type_lit' name='cha_type_lit' class='form-control'>
                <?php foreach ($lit as $key) {
                    $selected = ($key === $cha_type_lit) ? "selected" : ""; ?>
                    <option value="<?= $key ?>" <?= $selected ?>><?= $key ?></option>
                <?php } ?>
            </select>
        </div>
        <div class='form-group'>
            <label for='cha_jacuzzi'>Jacuzzi</label>
            <input id='cha_jacuzzi' name='cha_jacuzzi' type='checkbox' size='50' value='<?= mhe($cha_jacuzzi) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='cha_balcon'>Balcon</label>
            <input id='cha_balcon' name='cha_balcon' type='checkbox' size='50' value='<?= mhe($cha_balcon) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='cha_wifi'>Wifi</label>
            <input id='cha_wifi' name='cha_wifi' type='checkbox' size='50' value='<?= mhe($cha_wifi) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='cha_minibar'>Minibar</label>
            <input id='cha_minibar' name='cha_minibar' type='checkbox' size='50' value='<?= mhe($cha_minibar) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='cha_coffre'>Coffre</label>
            <input id='cha_coffre' name='cha_coffre' type='checkbox' size='50' value='<?= mhe($cha_coffre) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='cha_vue'>Vue</label>
            <input id='cha_vue' name='cha_vue' type='checkbox' size='50' value='<?= mhe($cha_vue) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='cha_categorie'>Categorie</label>
            <select id='cha_categorie' name='cha_categorie'>
                <?= Table::HTMLoptions("select * from categorie order by cat_libelle", "cat_id", "cat_libelle", $cha_categorie) ?>
            </select>
        </div>
        <div class='form-group'>
            <label for='cha_hotel'>Hotel</label>
            <select id='cha_hotel' name='cha_hotel'>
                <?= Table::HTMLoptions("select * from hotel order by hot_id", "hot_id", "hot_nom", $cha_hotel) ?>
            </select>
        </div>
        <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
    </form>