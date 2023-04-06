<h2>Modification de la réservation</h2>
<form method="post" action="<?= hlien("reservation", "saveEditClient") ?>">
    <input type="hidden" name="res_id" id="res_id" value="<?= $id ?>" />

    <div class='form-group'>
        <label for='res_date_debut_sejour'>Date de debut de sejour</label>
        <input id='res_date_debut_sejour' name='res_date_debut_sejour' type='date' size='50' value='<?= mhe($res_date_debut_sejour) ?>' class='form-control' />
    </div>
    <div class='form-group'>
        <label for='res_date_fin_sejour'>Date de fin de sejour</label>
        <input id='res_date_fin_sejour' name='res_date_fin_sejour' type='date' size='50' value='<?= mhe($res_date_fin_sejour) ?>' class='form-control' />
    </div>

    <div class='form-group'>
        <label for='res_hotel'>Hotel</label>
        <select readonly id='res_hotel' name='res_hotel' type="text" class='form-control'>
            <?= Hotel::HTMLoptionsHotel(
                "select * from hotel,standing 
        where hot_standing=sta_id and hot_statut='ouvert'",
                "hot_id",
                "hot_nom",
                "sta_libelle",
                $res_hotel
            ) ?>
        </select>
    </div>
    <div class='form-group'>
        <label for='res_commende'>Listez vos critaires de la chambre (type de lit, taille, catégorie...)</label>
        <textarea id='res_commende' name='res_commende' rows="3" class='form-control'>
      <?= mhe($res_commende) ?>  
    </textarea>
    </div>
    <div class='form-group'>
        <label for='res_etat'>Etat: sélectionner annuler pour annuler la résevation</label>
        <?php $etat = [" ", "annulée"]; ?>
        <select id='res_etat' name='res_etat' class='form-control'>
            <?php foreach ($etat as $key) {
                $selected = ($key == " ") ? "selected" : ""; ?>
                <option value="<?= $key ?>" <?= $selected ?>><?= $key ?></option>
            <?php } ?>
        </select>
    </div>
    <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
</form>