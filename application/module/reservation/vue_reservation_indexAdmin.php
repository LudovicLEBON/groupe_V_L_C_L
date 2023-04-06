    <h2>reservation</h2>
    <p><a class="btn btn-primary" href="<?= hlien("reservation", "creer", "id", 0) ?>">Nouvelle reservation</a></p>
    <table class="table table-striped table-bordered table-hover">
    	<thead>
    		<tr>

    			<th>Id</th>
    			<th>Date de creation</th>
    			<th>Date de maj</th>
    			<th>Date de debut de sejour</th>
    			<th>Date de fin de sejour</th>
    			<th>Client</th>
    			<th>Hotel</th>
    			<th>Chambre</th>
    			<th>Recommendations</th>
    			<th>Gérer les services</th>
    			<th>Prix TTC</th>
    			<th>Etat</th>
    			<th>Modifier</th>
    			<th>Supprimer</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php
			foreach ($data as $row) { ?>
    			<tr>

    				<td><?= mhe($row['res_id']) ?></td>
    				<td><?= mhe($row['res_date_creation']) ?></td>
    				<td><?= mhe($row['res_date_maj']) ?></td>
    				<td><?= mhe($row['res_date_debut_sejour']) ?></td>
    				<td><?= mhe($row['res_date_fin_sejour']) ?></td>
    				<td><?= mhe($row['cli_login']) ?></td>
    				<td><?= mhe($row['hot_nom']) ?> <?= $row["sta_libelle"] ?></td>
    				<td><?= mhe($row['cha_nom']) ?> <?= $row["cat_libelle"] ?></td>
    				<td><?= mhe($row['res_commende']) ?></td>
    				<td><a class="btn btn-info" href="<?= hlien("donneracces", "editServReser", "hotel", $row["res_hotel"], "id", $row["res_id"]) ?>">Gestion</a></td>
    				<td><?= mhe($row['res_prix_total']) ?> €</td>
    				<td><?= mhe($row['res_etat']) ?></td>
    				<td><a class="btn btn-warning" href="<?= hlien("reservation", "editAdmin", "id", $row["res_id"]) ?>">Modifier</a></td>
    				<td><a class="btn btn-danger" href="<?= hlien("reservation", "delete", "id", $row["res_id"]) ?>">Supprimer</a></td>
    			</tr>
    		<?php } ?>
    	</tbody>
    </table>