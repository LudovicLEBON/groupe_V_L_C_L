    <h2>client</h2>

    <table class="table table-striped table-bordered table-hover">
    	<thead>
    		<tr>

    			<th>Id</th>
    			<th>Nom</th>
    			<th>Prenom</th>
    			<th>Login</th>

    			<th>Profil</th>

    			<th>supprimer</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php
			foreach ($data as $row) { ?>
    			<tr>

    				<td><?= mhe($row['cli_id']) ?></td>
    				<td><?= mhe($row['cli_nom']) ?></td>
    				<td><?= mhe($row['cli_prenom']) ?></td>
    				<td><?= mhe($row['cli_login']) ?></td>

    				<td><?= mhe($row['pro_libelle']) ?></td>

    				<td><a class="btn btn-danger" href="<?= hlien("client", "delete", "id", $row["cli_id"]) ?>">Supprimer</a></td>
    			</tr>
    		<?php } ?>
    	</tbody>
    </table>