<h2>chambre</h2>

<div class="formulaire">
	<form method="post" class="row">
		<div class="form_group col">
			<label for="cha_nom">Nom:</label>
			<input type="text" name="cha_nom" id="cha_nom" size="25" class='form-control'>
		</div>
		<div class="form_group col">
			<label for="cha_categorie">Catégorie:</label>
			<select id='cha_categorie' name='cha_categorie' class='form-control'>
				<?= Table::HTMLoptions("select * from categorie order by cat_libelle", "cat_id", "cat_libelle", 0) ?>
			</select>
		</div>
		<div class="form-group col">
			<label for="cha_statut">Statut </label>
			<input type="text" name="cha_statut" id="cha_statut" size="25" class='form-control'>
		</div>
		<div class="form-group col">
			<Label for="cha_hotel">Hotel:</Label>
			<select id='cha_hotel' name='cha_hotel' class='form-control'>
				<?= Table::HTMLoptions("select * from hotel order by hot_id", "hot_id", "hot_nom", 0) ?>
			</select>
		</div>
		<div class="form-group col ">
			<input type="submit" class="btsearch btn btn-success" value="rechercher">
		</div>

	</form>
</div>
<p><a class="btn btn-primary" href="<?= hlien("chambre", "edit", "id", 0) ?>">Nouveau chambre</a></p>
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>

			<th>Id</th>
			<th>Nom</th>
			<th>Photo</th>
			<th>Descriptif</th>
			<th>Statut</th>
			<th>Surface</th>
			<th>Type_lit</th>
			<th>Jacuzzi</th>
			<th>Balcon</th>
			<th>Wifi</th>
			<th>Minibar</th>
			<th>Coffre</th>
			<th>Vue</th>
			<th>Categorie</th>
			<th>Hotel</th>
			<th>prix</th>
			<th>modifier</th>
			<th>supprimer</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($data as $row) { ?>
			<tr>

				<td><?= mhe($row['cha_id']) ?></td>
				<td><?= mhe($row['cha_nom']) ?></td>
				<td><img class="w-75 h-75" src="<?= mhe($row['cha_photo']) ?>" alt="photo de la chambre"></td>
				<td><?= mhe($row['cha_descriptif']) ?></td>
				<td><?= mhe($row['cha_statut']) ?></td>
				<td><?= mhe($row['cha_surface']) ?>m²</td>
				<td><?= mhe($row['cha_type_lit']) ?></td>
				<td><?= mhe($row['cha_jacuzzi']) ?></td>
				<td><?= mhe($row['cha_balcon']) ?></td>
				<td><?= mhe($row['cha_wifi']) ?></td>
				<td><?= mhe($row['cha_minibar']) ?></td>
				<td><?= mhe($row['cha_coffre']) ?></td>
				<td><?= mhe($row['cha_vue']) ?></td>
				<td><?= mhe($row['cat_libelle']) ?></td>
				<td><?= mhe($row['hot_nom']) ?></td>
				<td><?= mhe($row['tar_prix']) ?> €</td>
				<td><a class="btn btn-warning" href="<?= hlien("chambre", "edit", "id", $row["cha_id"]) ?>">Modifier</a></td>
				<td><a class="btn btn-danger" href="<?= hlien("chambre", "delete", "id", $row["cha_id"]) ?>">Supprimer</a></td>

			</tr>
		<?php } ?>
	</tbody>
</table>