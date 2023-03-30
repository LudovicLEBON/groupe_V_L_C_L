<h2>reservation</h2>
<p><a class="btn btn-primary" href="<?= hlien("reservation", "edit", "id", 0) ?>">Nouvelle reservation</a></p>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>

            <th>Id</th>
            <th>Date_creation</th>
            <th>Date_maj</th>
            <th>Date_debut_sejour</th>
            <th>Date_fin_sejour</th>
            <th>Prix_total</th>
            <th>Etat</th>
            <th>Client</th>
            <th>Hotel</th>
            <th>Chambre</th>
            <th>modifier</th>
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
                <td><?= mhe($row['res_prix_total']) ?></td>
                <td><?= mhe($row['res_etat']) ?></td>
                <td><?= mhe($row['res_client']) ?></td>
                <td><?= mhe($row['res_hotel']) ?></td>
                <td><?= mhe($row['res_chambre']) ?></td>
                <td><a class="btn btn-warning" href="<?= hlien("reservation", "edit", "id", $row["res_id"]) ?>">Modifier</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>