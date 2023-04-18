<?php if ($_SESSION["profil"] == 4) { ?><p><a class="btn btn-info" href="<?= hlien('hotel', 'indexAdmin') ?>">Retour aux hôtels</a></p>
<?php } else { ?> <p><a class="btn btn-info" href="<?= hlien('hotel', 'indexModerator') ?>">Retour aux hôtels</a></p><?php } ?>
<h2 class="text-center">Statistique de l'hotel n°<?= $_SESSION["hotel"] ?> du groupe ViveHotel</h2>
<h3>CA des chambres réservées</h3>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Hotel</th>
            <th>nb chambres réservées</th>
            <th>CA par chambres réservées</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $link) {
            extract($link); ?>
            <tr>
                <td><?= $hot_nom ?></td>
                <td><?= $nbChaRes ?></td>
                <td><?= $CAchambre ?> €</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<h3>CA des services proposées</h3>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Hotel</th>
            <th>CA des services vendus</th>
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
<h3>CA de l'hotel en <?= date("Y") ?></h3>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Hotel</th>
            <th>CA TTC annuel</th>
        </tr>
    </thead>
    <tbody>
        <?php $data2 = (new Hotel)->selectCATTC($_SESSION["hotel"]);
        foreach ($data2 as $link) {
            extract($link); ?>
            <tr>
                <td><?= $hot_nom ?></td>
                <td><?= $CATTC ?> €</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<h2 class="text-center">Les stat du groupe</h2>
<h3>le plus gros chiffre d'affaire de l'année</h3>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Hotel</th>

            <th>CA maximal de l'année</th>
        </tr>
    </thead>
    <tbody>
        <?php $data = (new Hotel)->selectCAMax();
        foreach ($data as $link) {
            extract($link); ?>
            <tr>
                <td><?= $hot_nom ?></td>
                <td><?= $CAmax ?> €</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<h3>Le CA annuel global <?= date("Y") ?></h4>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>

                <th>CA </th>
            </tr>
        </thead>
        <tbody>
            <?php $data2 = (new Hotel)->selectCAgroupe();
            foreach ($data2 as $link) {
                extract($link); ?>
                <tr>

                    <td><?= $CAglobal ?> €</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <h2 class="texte-center">Les stats global
</h3>
<h3>CA des chambres réservées</h3>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Hotel</th>
            <th>nb chambres réservées</th>
            <th>CA par chambres réservées</th>
        </tr>
    </thead>
    <tbody>
        <?php $data = (new Hotel)->selectCAHotelAll();
        foreach ($data as $link) {
            extract($link); ?>
            <tr>
                <td><?= $hot_nom ?></td>
                <td><?= $nbChaRes ?></td>
                <td><?= $CAchambre ?> €</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<h3>CA des services proposées</h3>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Hotel</th>
            <th>CA des services vendus</th>
        </tr>
    </thead>
    <tbody>
        <?php $data2 = (new Hotel)->selectCAservAll();
        foreach ($data2 as $link) {
            extract($link); ?>
            <tr>
                <td><?= $hot_nom ?></td>
                <td><?= $CAservices ?> €</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Hotel</th>
            <th>CA TTC annuel</th>
        </tr>
    </thead>
    <tbody>
        <?php $data2 = (new Hotel)->selectCATTCAll();
        foreach ($data2 as $link) {
            extract($link); ?>
            <tr>
                <td><?= $hot_nom ?></td>
                <td><?= $CATTC ?> €</td>
            </tr>
        <?php } ?>
    </tbody>
</table>