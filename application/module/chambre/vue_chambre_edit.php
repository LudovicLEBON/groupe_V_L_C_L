    <form method="post" action="<?=hlien("chambre","save")?>">
		<input type="hidden" name="cha_id" id="cha_id" value="<?= $id ?>" />
		
                        <div class='form-group'>
                            <label for='cha_nom'>Nom</label>
                            <input id='cha_nom' name='cha_nom' type='text' size='50' value='<?=mhe($cha_nom)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cha_photo'>Photo</label>
                            <input id='cha_photo' name='cha_photo' type='text' size='50' value='<?=mhe($cha_photo)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cha_descriptif'>Descriptif</label>
                            <input id='cha_descriptif' name='cha_descriptif' type='text' size='50' value='<?=mhe($cha_descriptif)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cha_statut'>Statut</label>
                            <input id='cha_statut' name='cha_statut' type='text' size='50' value='<?=mhe($cha_statut)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cha_surface'>Surface</label>
                            <input id='cha_surface' name='cha_surface' type='text' size='50' value='<?=mhe($cha_surface)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cha_type_lit'>Type_lit</label>
                            <input id='cha_type_lit' name='cha_type_lit' type='text' size='50' value='<?=mhe($cha_type_lit)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cha_jacuzzi'>Jacuzzi</label>
                            <input id='cha_jacuzzi' name='cha_jacuzzi' type='text' size='50' value='<?=mhe($cha_jacuzzi)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cha_balcon'>Balcon</label>
                            <input id='cha_balcon' name='cha_balcon' type='text' size='50' value='<?=mhe($cha_balcon)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cha_wifi'>Wifi</label>
                            <input id='cha_wifi' name='cha_wifi' type='text' size='50' value='<?=mhe($cha_wifi)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cha_minibar'>Minibar</label>
                            <input id='cha_minibar' name='cha_minibar' type='text' size='50' value='<?=mhe($cha_minibar)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cha_coffre'>Coffre</label>
                            <input id='cha_coffre' name='cha_coffre' type='text' size='50' value='<?=mhe($cha_coffre)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cha_vue'>Vue</label>
                            <input id='cha_vue' name='cha_vue' type='text' size='50' value='<?=mhe($cha_vue)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cha_categorie'>Categorie</label>
                            <input id='cha_categorie' name='cha_categorie' type='text' size='50' value='<?=mhe($cha_categorie)?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='cha_hotel'>Hotel</label>
                            <input id='cha_hotel' name='cha_hotel' type='text' size='50' value='<?=mhe($cha_hotel)?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
	</form>              