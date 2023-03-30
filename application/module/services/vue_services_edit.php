    <form method="post" action="<?= hlien("services", "save") ?>">
        <input type="hidden" name="ser_id" id="ser_id" value="<?= $id ?>" />

        <div class='form-group'>
            <label for='ser_libelle'>Libelle</label>
            <input id='ser_libelle' name='ser_libelle' type='text' size='50' value='<?= mhe($ser_libelle) ?>' class='form-control' />
            <p class="form-group col">
                <Label for="ser_libelle">services:</Label>
                <select kid='ser_libelle' name='ser_libelle'>
                    <?= Table::HTMLoptions("select * from service order by hot_id", "ser_id", "ser_id", $ser_libelle) ?>
                </select>
            </p>
        </div>
        <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
    </form>