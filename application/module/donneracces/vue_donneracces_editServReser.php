    <form method="post" action="<?= hlien("donneracces", "save") ?>">
        <?= Donneracces::HTML_checkboxModiierSup($row, "ser_id", "ser_libelle", "don_service", "don_quantite", "don_quantite") ?>
        <h3>ajouter des services</h3>
        <?php $row2 = Donneracces::selectAllServNoReser($hotel, $id);
        Donneracces::HTML_checkboxAjouter($row2, "ser_id", "ser_libelle", "don_service", "don_quantite", "don_quantite"); ?>
        <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
    </form>