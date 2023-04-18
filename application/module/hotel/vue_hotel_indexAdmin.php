<h2>hotel</h2>

<div class="formulaire">
	<form method="post" class="row">
		<p class="form_group col">
			<label for="hot_nom">Nom:</label>
			<select id='hot_nom' name='hot_nom'>
				<?= Table::HTMLoptions("select * from hotel order by hot_id", "hot_id", "hot_nom", $hot_nom) ?>
			</select>
		</p>
		<p class="form_group col">
			<label for="hot_standing">Standing:</label>
			<select id='hot_standing' name='hot_standing'>
				<?= Table::HTMLoptions("select * from standing  order by sta_libelle", "sta_id", "sta_libelle", $hot_standing) ?>
			</select>
		</p>
		<p class="form-group col">
			<label for="hot_statut">Statut </label>
			<input type="text" name="hot_statut" id="hot_statut" size="25">
		</p>
		<p class="form-group col">
			<input type="submit" class="btsearch" value="rechercher">
		</p>
	</form>

</div>

<p><a class="btn btn-info" href="<?= hlien('hotel', 'stat') ?>">consulter les stats</a></p>
<p><a class="btn btn-primary" href="<?= hlien("hotel", "edit", "id", 0) ?>">Nouveau hotel</a></p>
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>

			<th>Id</th>
			<th>Nom</th>
			<th>Telephone</th>
			<th>Adresse</th>
			<th>Longitude</th>
			<th>Latitude</th>
			<th>Photo</th>
			<th>Descriptif</th>
			<th>Statut</th>
			<th>Standing</th>
			<th>service</th>
			<th>modifier</th>
			<th>supprimer</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($data as $row) { ?>
			<tr>

				<td><?= mhe($row['hot_id']) ?></td>
				<td><?= mhe($row['hot_nom']) ?></td>
				<td><?= mhe($row['hot_telephone']) ?></td>
				<td><?= mhe($row['hot_adresse']) ?></td>
				<td><?= mhe($row['hot_longitude']) ?></td>
				<td><?= mhe($row['hot_latitude']) ?></td>
				<td><img class="w-75 h-75" src="<?= mhe($row['hot_photo']) ?>" alt="photo de l'hôtel"></td>
				<td><?= mhe($row['hot_descriptif']) ?></td>
				<td><?= mhe($row['hot_statut']) ?></td>
				<td><?= mhe($row['sta_libelle']) ?></td>
				<td>
					<ul> <?= Prestation::HTMLli("select * from prestation,services
				where pre_service=ser_id and pre_hotel=" . $row['hot_id'] . "  order by ser_libelle", "ser_id", "ser_libelle", $row['hot_id'])  ?></ul>
				</td>
				<td><a class="btn btn-warning" href="<?= hlien("hotel", "edit", "id", $row["hot_id"]) ?>">Modifier</a></td>
				<td><a class="btn btn-danger" href="<?= hlien("hotel", "delete", "id", $row["hot_id"]) ?>">Supprimer</a></td>
			</tr>
		<?php } ?>
	</tbody>
</table>