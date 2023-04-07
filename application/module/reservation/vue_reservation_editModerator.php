<h2>Modification de la réservation n°<?= $id ?> </h2>
<form method="post" action="<?= hlien("reservation", "save") ?>">
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
        <label for='res_client'>Client</label><?php $cli = (new Client)->select($res_client) ?>
        <p id='res_client' class='form-control'> <?= $cli["cli_login"] ?></p>
    </div>
    <div class='form-group'>
        <label for='res_hotel'>Hotel</label>
        <p id='res_hotel' class='form-control'>hotel <?= $res_hotel ?> </p>
    </div>
    <div class="form-group">
        <label for='res_commende'>Listez vos critaires de la chambre (type de lit, taille, catégorie...)</label>
        <textarea id='res_commende' name='res_commende' rows="3" class='form-control'>
      <?= mhe($res_commende) ?>  
    </textarea>
    </div>
    <div class='form-group'>
        <label for='res_chambre'>Chambre</label>
        <select id='res_chambre' name='res_chambre' class='form-control'>
            <?= Chambre::HTMLoptionsChamb(
                "select * from chambre,hotel,categorie 
            where cha_hotel=hot_id and cha_categorie=cat_id and hot_id=" . $res_hotel . " and cha_statut='libre'",
                "cha_id",
                "cha_nom",
                "cha_type_lit",
                "cat_libelle",
                $res_chambre
            ) ?>
        </select>
    </div>
    <div class='form-group'>
        <label for='res_prix_total'>Prix total</label>
        <input id='res_prix_total' name='res_prix_total' type="floor" step="0.01" min="0.01" size='50' value='<?= mhe($res_prix_total) ?>' class='form-control' />
    </div>
    <div class='form-group'>
        <label for='res_etat'>Etat</label>
        <?php $etat = ["initialisée", "validée", "en attente", "annulée"]; ?>
        <select id='res_etat' name='res_etat' class='form-control'>
            <?php foreach ($etat as $key) {
                $selected = ($key == $res_etat) ? "selected" : ""; ?>
                <option value="<?= $key ?>" <?= $selected ?>><?= $key ?></option>
            <?php } ?>
        </select>
    </div>
    <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
</form>