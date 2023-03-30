    <form method="post" action="<?= hlien("tarifer", "save") ?>">
        <input type="hidden" name="tar_id" id="tar_id" value="<?= $id ?>" />

        <div class='form-group'>
            <label for='tar_standing'>Standing</label>
            <select id='tar_standing' name='tar_standing'>
                <?= Table::HTMLoptions("select * from standing  order by sta_libelle", "sta_id", "sta_libelle", $tar_standing) ?>
            </select>
        </div>
        <div class='form-group'>
            <Label for="tar_categorie">Catégorie:</Label>
            <select id='tar_categorie' name='tar_categorie'>
                <?= Table::HTMLoptions("select * from categorie order by cat_libelle", "cat_id", "cat_libelle", $tar_categorie) ?>
            </select>
        </div>
        <div class='form-group'>
            <label for='tar_prix'>Prix</label>
            <input id='tar_prix' name='tar_prix' type='number' size='10' value='<?= mhe($tar_prix) ?>' class='form-control' />
        </div>
        <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
    </form>