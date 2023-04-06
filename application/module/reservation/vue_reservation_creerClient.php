<form method="post" action="<?= hlien("reservation", "saveClient") ?>">
    <input type="hidden" name="res_id" id="res_id" value="<?= $id ?>" />

    <div class='form-group'>
        <label for='res_date_creation'>Date_creation</label>
        <input readonly id='res_date_creation' name='res_date_creation' type="datetime" size='50' value='<?= date("Y-m-d H:i") ?>' class='form-control' />
    </div>
    <div class='form-group'>
        <label for='res_date_maj'>Date_maj</label>
        <input id='res_date_maj' name='res_date_maj' type='hidden' size='50' value='<?= date("Y-m-d H:i") ?>' class='form-control' />
    </div>
    <div class='form-group'>
        <label for='res_date_debut_sejour'>Date_debut_sejour</label>
        <input id='res_date_debut_sejour' name='res_date_debut_sejour' type='date' size='50' value='<?= mhe($res_date_debut_sejour) ?>' class='form-control' />
    </div>
    <div class='form-group'>
        <label for='res_date_fin_sejour'>Date_fin_sejour</label>
        <input id='res_date_fin_sejour' name='res_date_fin_sejour' type='date' size='50' value='<?= mhe($res_date_fin_sejour) ?>' class='form-control' />
    </div>

    <div class='form-group'>
        <label for='res_hotel'>Hotel</label>
        <select readonly id='res_hotel' name='res_hotel' type="text" size="50" value="hotel <?= $res_hotel ?>" class='form-control' />
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
        <label for='res_chambre'>Chambre</label>
        <select id='res_chambre' name='res_chambre' class='form-control'>
            <?= Chambre::HTMLoptionsChamb(
                "select * from chambre,hotel,categorie 
            where cha_hotel=hot_id and cha_categorie=cat_id and hot_id=" . $res_hotel . " and cha_statut='libre' ",
                "cha_id",
                "cha_nom",
                "cha_type_lit",
                "cat_libelle",
                $res_chambre
            ) ?>
        </select>
    </div>

    </div>
    <div class="form-group">
        <label for="res_commende">précision commande</label>
        <input type="text" name="res_commende" id="res_commende" size=50"" value="<?= mhe($res_commende) ?>" class="form_control">
    </div>
    <div class='form-group'>
        <label for='res_prix_total'>Prix_total</label>
        <input readonly id='res_prix_total' name='res_prix_total' type="floor" step="0.01" min="0.01" size='50' value='<?= mhe($res_prix_total) ?>' class='form-control' />
    </div>

    <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
</form>