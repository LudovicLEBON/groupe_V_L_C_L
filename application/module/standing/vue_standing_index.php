    <h2>standing</h2>
    <p><a class="btn btn-primary" href="<?=hlien("standing","edit","id",0)?>">Nouveau standing</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Libelle</th>
				<th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $data as $row) { ?>
		<tr>
			
			<td><?=mhe($row['sta_id'])?></td>
			<td><?=mhe($row['sta_libelle'])?></td>
			<td><a class="btn btn-warning" href="<?=hlien("standing","edit","id",$row["sta_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("standing","delete","id",$row["sta_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>