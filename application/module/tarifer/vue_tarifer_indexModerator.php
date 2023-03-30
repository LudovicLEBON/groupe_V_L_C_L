<h2>tarifer</h2>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>

            <th>Id</th>
            <th>Standing</th>
            <th>Categorie</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $row) { ?>
            <tr>

                <td><?= mhe($row['tar_id']) ?></td>
                <td><?= mhe($row['sta_libelle']) ?></td>
                <td><?= mhe($row['cat_libelle']) ?></td>
                <td><?= mhe($row['tar_prix']) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>