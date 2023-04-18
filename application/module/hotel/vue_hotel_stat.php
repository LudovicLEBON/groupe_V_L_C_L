<h2>Statistique de l'hotel n°<?= $_SESSION["hotel"] ?> du groupe ViveHotel</h2>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Hotel</th>
            <th>CA de l'hotel</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $link) {
            extract($link); ?>
            <tr>
                <td><?= $hot_nom ?></td>
                <td><?= $CA ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<h2>Les stat du groupe</h2>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Hotel</th>
            <th>CA de l'hotel</th>
        </tr>
    </thead>
    <tbody>
        <?php $data2 = (new Hotel)->selectCAserv($_SESSION["hotel"]);
        foreach ($data2 as $link) {
            extract($link); ?>
            <tr>
                <td><?= $hot_nom ?></td>
                <td><?= $CAservices ?> €</td>
            </tr>
        <?php } ?>
    </tbody>
</table>