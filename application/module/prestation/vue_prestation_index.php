    <h2 class="text-center">prestation</h2>

    
    <form method="post" action="<?= hlien("prestation", "save") ?>">
	<h2 class="text-center">Ajouter une prestation</h2>
    	<input type="hidden" name="pre_id" id="pre_id" value="<?= $id ?>" />

    	<div class='form-group'>
    		<label for='pre_service'>Service</label>
    		<input id='pre_service' name='pre_service' type='text' size='50' value='<?= mhe($pre_service) ?>' class='form-control' />
    	</div>
    	<div class='form-group'>
    		<label for='pre_hotel'>Hotel</label>
    		<input id='pre_hotel' name='pre_hotel' type='text' size='50' value='<?= mhe($pre_hotel) ?>' class='form-control' />
    	</div>
    	<div class='form-group'>
    		<label for='pre_prix'>Prix</label>
    		<input id='pre_prix' name='pre_prix' type='text' size='50' value='<?= mhe($pre_prix) ?>' class='form-control' />
    	</div>
    	<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
    </form>


    <table class="table table-striped table-bordered table-hover">
    	<thead>
    		<tr>

    			<th>Id</th>
    			<th>Service</th>
    			<th>Hotel</th>
    			<th>Prix</th>
    			<th>modifier</th>
    			<th>supprimer</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php
			foreach ($data as $row) { ?>
    			<tr>

    				<td><?= mhe($row['pre_id']) ?></td>
    				<td><?= mhe($row['ser_libelle']) ?></td>
    				<td><?= mhe($row['hot_nom']) ?></td>
    				<td><?= mhe($row['pre_prix']) ?> €</td>
    				<td><a class="btn btn-warning" href="<?= hlien("prestation", "edit", "id", $row["pre_id"]) ?>">Modifier</a></td>
    				<td><a class="btn btn-danger" href="<?= hlien("prestation", "delete", "id", $row["pre_id"]) ?>">Supprimer</a></td>
    			</tr>
    		<?php } ?>
    	</tbody>
    </table>