    <form method="post" action="<?= hlien("tarifer", "save") ?>">
        <input type="hidden" name="tar_id" id="tar_id" value="<?= $id ?>" />

        <div class='form-group'>
            <label for='tar_standing'>Standing</label>
            <input id='tar_standing' name='tar_standing' type='text' size='20' value='<?= mhe($tar_standing) ?>' class='form-control' />
            <p class="form-group col">
                <Label for="tar_standing">Standing:</Label>
                <select kid='tar_standing' name='tar_standing'>
                    <?= Table::HTMLoptions("select * from standing order by hot_id", "tar_id", "tar_id", $tar_standing) ?>
                </select>
            </p>
        </div>
        <div class='form-group'>
            <label for='tar_categorie'>Categorie</label>
            <input id='tar_categorie' name='tar_categorie' type='text' size='50' value='<?= mhe($tar_categorie) ?>' class='form-control' />
            <p class="form-group col">
                <Label for="tar_categorie">Catégorie:</Label>
                <select kid='tar_categorie' name='tar_categorie'>
                    <?= Table::HTMLoptions("select * from categorie order by hot_id", "tar_id", "tar_id", $tar_categorie) ?>
                </select>
            </p>
        </div>
        <div class='form-group'>
            <label for='tar_prix'>Prix</label>
            <input id='tar_prix' name='tar_prix' type='number' size='10' value='<?= mhe($tar_prix) ?>' class='form-control' />
            <p class="form-group col">
                <Label for="tar_prix">Prix:</Label>
                <select kid='tar_prix' name='tar_prix'>
                    <?= Table::HTMLoptions("select * from prix order by hot_id", "tar_id", "tar_id", $tar_prix) ?>
                </select>
            </p>
        </div>
        <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
    </form>