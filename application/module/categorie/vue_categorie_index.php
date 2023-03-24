    <h2>categorie</h2>
    <p><a class="btn btn-primary" href="<?=hlien("categorie","edit","id",0)?>">Nouveau categorie</a></p>
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
			
			<td><?=mhe($row['cat_id'])?></td>
			<td><?=mhe($row['cat_libelle'])?></td>
			<td><a class="btn btn-warning" href="<?=hlien("categorie","edit","id",$row["cat_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("categorie","delete","id",$row["cat_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>