    <form method="post" action="<?=hlien("donneracces","save")?>">
		<input type="hidden" name="don_id" id="don_id" value="<?= $id ?>" />
		
                        <div class='form-group'>
                            <label for='don_reservation'>Reservation</label>
                            <input id='don_reservation' name='don_reservation' type='text' size='50' value='<?=mhe($don_reservation)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='don_service'>Service</label>
                            <input id='don_service' name='don_service' type='text' size='50' value='<?=mhe($don_service)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='don_quantite'>Quantite</label>
                            <input id='don_quantite' name='don_quantite' type='text' size='50' value='<?=mhe($don_quantite)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              