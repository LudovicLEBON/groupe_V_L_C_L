<h2>Statistique de l'hotel n°<?= $_SESSION["hotel"] ?> du groupe ViveHotel</h2>

<table>
    <tr>
        <th>Hotel</th>
        <th>CA de l'hotel</th>
    </tr>
    <?php foreach ($data as $link) {
        extract($link); ?>
        <tr>
            <td><?= $hot_nom ?></td>
            <td><?= $CA ?></td>
        </tr>
    <?php } ?>
</table>
<h2>Les stat du groupe</h2>
<table>
    <tr>
        <th>Hotel</th>
        <th>CA de l'hotel</th>
    </tr>
    <?php $data2 = (new Hotel)->selectCAserv($_SESSION["hotel"]);
    foreach ($data2 as $link) {
        extract($link); ?>
        <tr>
            <td><?= $hot_nom ?></td>
            <td><?= $CAservices ?></td>
        </tr>
    <?php } ?>
</table>