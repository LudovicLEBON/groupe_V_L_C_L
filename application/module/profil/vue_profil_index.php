    <h2>profil</h2>
    <p><a class="btn btn-primary" href="<?=hlien("profil","edit","id",0)?>">Nouveau profil</a></p>
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
			
			<td><?=mhe($row['pro_id'])?></td>
			<td><?=mhe($row['pro_libelle'])?></td>
			<td><a class="btn btn-warning" href="<?=hlien("profil","edit","id",$row["pro_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("profil","delete","id",$row["pro_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>