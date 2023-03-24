    <h2>tarifer</h2>
    <p><a class="btn btn-primary" href="<?=hlien("tarifer","edit","id",0)?>">Nouveau tarifer</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Standing</th>
			<th>Categorie</th>
			<th>Prix</th>
				<th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $data as $row) { ?>
		<tr>
			
			<td><?=mhe($row['tar_id'])?></td>
			<td><?=mhe($row['tar_standing'])?></td>
			<td><?=mhe($row['tar_categorie'])?></td>
			<td><?=mhe($row['tar_prix'])?></td>
			<td><a class="btn btn-warning" href="<?=hlien("tarifer","edit","id",$row["tar_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("tarifer","delete","id",$row["tar_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>