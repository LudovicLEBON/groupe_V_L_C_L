    <h2>individu</h2>
    <p><a class="btn btn-primary" href="<?=hlien("individu","edit","id",0)?>">Nouveau individu</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>Id</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Login</th>
			<th>Pwd</th>
			<th>Profil</th>
			<th>Hotel</th>
				<th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $data as $row) { ?>
		<tr>
			
			<td><?=mhe($row['ind_id'])?></td>
			<td><?=mhe($row['ind_nom'])?></td>
			<td><?=mhe($row['ind_prenom'])?></td>
			<td><?=mhe($row['ind_login'])?></td>
			<td><?=mhe($row['ind_pwd'])?></td>
			<td><?=mhe($row['ind_profil'])?></td>
			<td><?=mhe($row['ind_hotel'])?></td>
			<td><a class="btn btn-warning" href="<?=hlien("individu","edit","id",$row["ind_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("individu","delete","id",$row["ind_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>