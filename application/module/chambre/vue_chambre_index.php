<h2>Nos chambres </h2>

<div class="fichechambre">
    <?php
    foreach ($data as $row) { ?>
        <article class="artchambre">
            <h3 class="card"><?= mhe($row['cha_nom']) ?> </h3>
            <img src="<?= mhe($row['cha_photo']) ?>" alt="" class="card">
            <p class="card">
                Descriptif: <?= mhe($row['cha_descriptif']) ?>
            </p>
            <p class="card">
                Statut: <?= mhe($row['cha_statut']) ?>
            </p>
            <p class="card">
                Surface: <?= mhe($row['cha_surface']) ?> M²
            </p>
            <p class="card">
                Lit: <?= mhe($row['cha_type_lit']) ?>
            </p>
            <p class="card">
                <?= ($row['cha_jacuzzi'] == 0) ? "" : "jaccuzi" ?>
            </p>
            <p class="card">
                <?= ($row['cha_balcon'] == 0) ? "" : "balcon" ?>
            </p>
            <p class="card">
                <?= ($row['cha_wifi'] == 0) ? "" : "wifi" ?>
            </p>
            <p class="card">
                <?= ($row['cha_minibar'] == 0) ? "" : "minibar" ?>
            </p>
            <p class="card">
                <?= ($row['cha_coffre'] == 0) ? "" : "coffre" ?>
            </p>
            <p>
                <?= ($row['cha_vue'] == 0) ? "" : "vue" ?>
            </p>
            <p class="card">
                Catégorie: <?= mhe($row['cat_libelle']) ?>
            </p>
            <p class="card">
                Hotel: <?= mhe($row['hot_nom']) ?>

            </p>
            <p class="card">
                Prix: <?= mhe($row['tar_prix']) ?>€
            </p>
        </article>
    <?php } ?>
</div>