    <h2>prestation</h2>
    <p><a class="btn btn-primary" href="<?=hlien("prestation","edit","id",0)?>">Nouveau prestation</a></p>
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
		foreach ( $data as $row) { ?>
		<tr>
			
			<td><?=mhe($row['pre_id'])?></td>
			<td><?=mhe($row['pre_service'])?></td>
			<td><?=mhe($row['pre_hotel'])?></td>
			<td><?=mhe($row['pre_prix'])?></td>
			<td><a class="btn btn-warning" href="<?=hlien("prestation","edit","id",$row["pre_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("prestation","delete","id",$row["pre_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>