<h2>chambre</h2>
<p><a class="btn btn-primary" href="<?= hlien("chambre", "edit", "id", 0) ?>">Nouveau chambre</a></p>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>

            <th>Id</th>
            <th>Nom</th>
            <th>Photo</th>
            <th>Descriptif</th>
            <th>Statut</th>
            <th>Surface</th>
            <th>Type_lit</th>
            <th>Jacuzzi</th>
            <th>Balcon</th>
            <th>Wifi</th>
            <th>Minibar</th>
            <th>Coffre</th>
            <th>Vue</th>
            <th>Categorie</th>
            <th>Hotel</th>
            <td>prix</td>
            <th>modifier</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $row) { ?>
            <tr>

                <td><?= mhe($row['cha_id']) ?></td>
                <td><?= mhe($row['cha_nom']) ?></td>
                <td><?= mhe($row['cha_photo']) ?></td>
                <td><?= mhe($row['cha_descriptif']) ?></td>
                <td><?= mhe($row['cha_statut']) ?></td>
                <td><?= mhe($row['cha_surface']) ?></td>
                <td><?= mhe($row['cha_type_lit']) ?></td>
                <td><?= mhe($row['cha_jacuzzi']) ?></td>
                <td><?= mhe($row['cha_balcon']) ?></td>
                <td><?= mhe($row['cha_wifi']) ?></td>
                <td><?= mhe($row['cha_minibar']) ?></td>
                <td><?= mhe($row['cha_coffre']) ?></td>
                <td><?= mhe($row['cha_vue']) ?></td>
                <td><?= mhe($row['cha_categorie']) ?></td>
                <td><?= mhe($row['cha_hotel']) ?></td>
                <td><?= mhe($row['tar_prix']) ?></td>
                <td><a class="btn btn-warning" href="<?= hlien("chambre", "edit", "id", $row["cha_id"]) ?>">Modifier</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>