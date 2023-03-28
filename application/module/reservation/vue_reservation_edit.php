    <form method="post" action="<?= hlien("reservation", "save") ?>">
        <input type="hidden" name="res_id" id="res_id" value="<?= $id ?>" />

        <div class='form-group'>
            <label for='res_date_creation'>Date_creation</label>
            <input readonly id='res_date_creation' name='res_date_creation' type="datetime" size='50' value='<?= mhe($res_date_creation) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='res_date_maj'>Date_maj</label>
            <input id='res_date_maj' name='res_date_maj' type='datetime' size='50' value='<?= date("Y-m-d H:m") ("Y","m","d","H","m")) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='res_date_debut_sejour'>Date_debut_sejour</label>
            <input id='res_date_debut_sejour' name='res_date_debut_sejour' type='text' size='50' value='<?= mhe($res_date_debut_sejour) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='res_date_fin_sejour'>Date_fin_sejour</label>
            <input id='res_date_fin_sejour' name='res_date_fin_sejour' type='text' size='50' value='<?= mhe($res_date_fin_sejour) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='res_prix_total'>Prix_total</label>
            <input id='res_prix_total' name='res_prix_total' type='text' size='50' value='<?= mhe($res_prix_total) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='res_etat'>Etat</label>
            <input id='res_etat' name='res_etat' type='text' size='50' value='<?= mhe($res_etat) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='res_client'>Client</label>
            <input id='res_client' name='res_client' type='text' size='50' value='<?= mhe($res_client) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='res_hotel'>Hotel</label>
            <input id='res_hotel' name='res_hotel' type='text' size='50' value='<?= mhe($res_hotel) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='res_chambre'>Chambre</label>
            <input id='res_chambre' name='res_chambre' type='text' size='50' value='<?= mhe($res_chambre) ?>' class='form-control' />
        </div>
        <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
    </form>