<h2>hotel</h2>
<p><a class="btn btn-primary" href="<?= hlien("hotel", "edit", "id", 0) ?>">Nouveau hotel</a></p>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>

            <th>Id</th>
            <th>Nom</th>
            <th>Telephone</th>
            <th>Adresse</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Photo</th>
            <th>Descriptif</th>
            <th>Statut</th>
            <th>Standing</th>
            <th>modifier</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $row) { ?>
            <tr>

                <td><?= mhe($row['hot_id']) ?></td>
                <td><?= mhe($row['hot_nom']) ?></td>
                <td><?= mhe($row['hot_telephone']) ?></td>
                <td><?= mhe($row['hot_adresse']) ?></td>
                <td><?= mhe($row['hot_longitude']) ?></td>
                <td><?= mhe($row['hot_latitude']) ?></td>
                <td><?= mhe($row['hot_photo']) ?></td>
                <td><?= mhe($row['hot_descriptif']) ?></td>
                <td><?= mhe($row['hot_statut']) ?></td>
                <td><?= mhe($row['hot_standing']) ?></td>
                <td><a class="btn btn-warning" href="<?= hlien("hotel", "edit", "id", $row["hot_id"]) ?>">Modifier</a></td>

            </tr>
        <?php } ?>
    </tbody>
</table>