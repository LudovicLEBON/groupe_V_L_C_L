<h2>chambre</h2>

<div class="formulaire">
    <form method="post" class="row">
        <p class="form_group col">
            <label for="cha_nom">Nom:</label>
            <input type="text" name="cha_nom" id="cha_nom" size="20">
        </p>
        <p class="form_group col">
            <label for="cha_categorie">Catégorie:</label>
            <select id='cha_categorie' name='cha_categorie'>
                <?= Table::HTMLoptions("select * from categorie order by cat_libelle", "cat_id", "cat_libelle", $cha_categorie) ?>
            </select>
        </p>
        <p class="form-group col">
            <label for="cha_statut">Statut </label>
            <?php $statut = ["libre", "travaux", "occupé"]; ?>
            <select id='cha_statut' name='cha_statut' class='form-control'>
                <?php foreach ($statut as $key) {
                    $selected = ($key === $cha_statut) ? "selected" : ""; ?>
                    <option value="<?= $key ?>" <?= $selected ?>><?= $key ?></option>
                <?php } ?>
            </select>
        </p>
        <p class="form-group col">
            <Label for="cha_hotel">Hotel:</Label>
            <select id='cha_hotel' name='cha_hotel'>
                <?= Table::HTMLoptions("select * from hotel order by hot_id", "hot_id", "hot_nom", $cha_hotel) ?>
            </select>
        </p>
        <p class="form-group col-3">
            <input type="submit" class="btsearch" value="rechercher">
        </p>
    </form>
</div>


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
            </tr>
        <?php } ?>
    </tbody>
</table>