<h2>reservation</h2>
<p><a class="btn btn-primary" href="<?= hlien("reservation", "creerClient", "id", 0) ?>">Nouvelle reservation</a></p>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>

            <th>Id</th>
            <th>Date_creation</th>
            <th>Date_maj</th>
            <th>Date_debut_sejour</th>
            <th>Date_fin_sejour</th>
            <th>Client</th>
            <th>Hotel</th>
            <th>Chambre</th>
            <th>Gérer les services</th>
            <th>Prix_total</th>
            <th>Etat</th>
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
                <td><?= mhe($row['cli_login']) ?></td>
                <td><?= mhe($row['hot_nom']) ?></td>
                <td><?= mhe($row['cha_nom']) ?></td>
                <td><a class="btn btn-info" href="<?= hlien("donneracces", "editServReser", "hotel", $row["res_hotel"], "id", $row["res_id"]) ?>">Modifier</a></td>
                <td><?= mhe($row['res_prix_total']) ?></td>
                <td><?= mhe($row['res_etat']) ?></td>
                <td><a class="btn btn-warning" href="<?= hlien("reservation", "edit", "id", $row["res_id"]) ?>">Modifier</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>