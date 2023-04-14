<h3 class="text-center">Bienvenue <?= $_SESSION["ind_prenom"] ?> sur votre espace de travail</h3>

<h3>Réservations du jour</h3>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Date de création</th>
            <th>Date début séjour</th>
            <th>Date fin séjour</th>
            <th>client</th>
            <th>Hotel</th>
            <th>Chambre</th>
            <th>Etat</th>
            <th>Prix total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $row) { ?>
            <tr>
                <td><?= mhe($row['res_id'])  ?> </td>
                <td><?= mhe($row['res_date_creation'])  ?> </td>
                <td><?= mhe($row['res_date_debut_sejour'])  ?> </td>
                <td><?= mhe($row['res_date_fin_sejour']) ?> </td>
                <td><?= mhe($row['cli_login']) ?> </td>
                <td><?= mhe($row['hot_nom'])  ?> </td>
                <td><?= mhe($row['cha_nom'])  ?> </td>
                <td><?= mhe($row['res_etat'])  ?> </td>
                <td><?= mhe($row['res_prix_total']) ?>€ </td>
            </tr>
        <?php } ?>
    </tbody>
</table>