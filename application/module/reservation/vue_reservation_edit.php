<<<<<<< HEAD
    <form method="post" action="<?= hlien("reservation", "save") ?>">
        <input type="hidden" name="res_id" id="res_id" value="<?= $id ?>" />

        <div class='form-group'>
            <label for='res_date_creation'>Date_creation</label>
            <input readonly id='res_date_creation' name='res_date_creation' type="datetime" size='50' value='<?= mhe($res_date_creation) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='res_date_maj'>Date_maj</label>
            <input id='res_date_maj' name='res_date_maj' type='datetime' size='50' value='<?= date("Y-m-d H:i") ?>' class='form-control' />
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
            <label for='res_client'>Client</label>
            <select id='res_client' name='res_client' class='form-control'>
                <?= Table::HTMLoptions("select * from client order by cli_login", "cli_id", "cli_login", $res_client) ?>
            </select>
        </div>
        <div class='form-group'>
            <label for='res_hotel'>Hotel</label>
            <selectt id='res_hotel' name='res_hotel' class='form-control'>
                <?= Table::HTMLoptions("select * from hotel order by hot_nom", "hot_id", "hot_nom", $res_hotel) ?>
                </select>

        </div>
        <div class='form-group'>
            <label for='res_chambre'>Chambre</label>
            <select id='res_chambre' name='res_chambre' class='form-control'>
                <?= Table::HTMLoptions("select * from chambre,hotel,reservation where cha_hotel=hot_id and hot_id=", "cli_id", "cli_login", $res_client) ?>
            </select>
        </div>
        </div>
        <div class='form-group'>
            <label for='res_prix_total'>Prix_total</label>
            <input id='res_prix_total' name='res_prix_total' type="floor" step="0.01" min="0.01" size='50' value='<?= mhe($res_prix_total) ?>' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='res_etat'>Etat</label>
            <?php $etat = ["initialisée", "validée", "en attente", "annulée"]; ?>
            <select id='res_etat' name='res_etat' size='50' value='<?= mhe($res_etat) ?>' class='form-control'>
                <?php foreach ($etat as $key) {
                    $selected = ($key === $res_etat) ? "selected" : ""; ?>
                    <option value="<?= $key ?>" <?= $selected ?>><?= $key ?></option>
                <?php } ?>
            </select>
        </div>
        <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
    </form>
=======
    <form method="post" action="<?=hlien("reservation","save")?>">
		<input type="hidden" name="res_id" id="res_id" value="<?= $id ?>" />
		
                        <div class='form-group'>
                            <label for='res_date_creation'>Date_creation</label>
                            <input id='res_date_creation' name='res_date_creation' type='date' size='10' value='<?=mhe($res_date_creation)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='res_date_maj'>Date_maj</label>
                            <input id='res_date_maj' name='res_date_maj' type='date' size='10' value='<?=mhe($res_date_maj)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='res_date_debut_sejour'>Date_debut_sejour</label>
                            <input id='res_date_debut_sejour' name='res_date_debut_sejour' type='date' size='10' value='<?=mhe($res_date_debut_sejour)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='res_date_fin_sejour'>Date_fin_sejour</label>
                            <input id='res_date_fin_sejour' name='res_date_fin_sejour' type='date' size='10' value='<?=mhe($res_date_fin_sejour)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='res_prix_total'>Prix_total</label>
                            <input id='res_prix_total' name='res_prix_total' type='number' size='10' value='<?=mhe($res_prix_total)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='res_etat'>Etat</label>
                            <input id='res_etat' name='res_etat' type='number' size='10' value='<?=mhe($res_etat)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='res_client'>Client</label>
                            <input id='res_client' name='res_client' type='text' size='50' value='<?=mhe($res_client)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='res_hotel'>Hotel</label>
                            <input id='res_hotel' name='res_hotel' type='text' size='50' value='<?=mhe($res_hotel)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='res_chambre'>Chambre</label>
                            <input id='res_chambre' name='res_chambre' type='text' size='50' value='<?=mhe($res_chambre)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              
>>>>>>> 3a32f06fcbe102b97533da1c66e8efa0a19d59fd
