    <h2>donneracces</h2>
    <p><a class="btn btn-primary" href="<?=hlien("donneracces","edit","id",0)?>">Nouveau donneracces</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Reservation</th>
			<th>Service</th>
			<th>Quantite</th>
				<th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $data as $row) { ?>
		<tr>
			
			<td><?=mhe($row['don_id'])?></td>
			<td><?=mhe($row['don_reservation'])?></td>
			<td><?=mhe($row['don_service'])?></td>
			<td><?=mhe($row['don_quantite'])?></td>
			<td><a class="btn btn-warning" href="<?=hlien("donneracces","edit","id",$row["don_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("donneracces","delete","id",$row["don_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>