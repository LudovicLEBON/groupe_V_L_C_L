    <!-- <form method="post" action="/* hlien("donneracces", "save")*/ "> -->
    <h2>Gestion des services de la réservation n°<?= $id ?></h2>
    <h3>Les services associées</h3>
    <?= Donneracces::HTML_checkboxModiierSup($row, "ser_id", "ser_libelle", "don_service", "don_quantite", "don_quantite") ?>
    <h3>Ajouter des services</h3>
    <?php $row2 = Donneracces::selectAllServNoReser($hotel, $id);

    Donneracces::HTML_checkboxAjouter($row2, "ser_id", "ser_libelle", "don_service", "don_quantite", "don_quantite"); ?>
    <pre><?= print_r($row2) ?></pre>
    <!-- <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" /> 
    </form> -->