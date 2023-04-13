<h2>Gestion des services de la réservation n°<?= $id ?></h2>
<h3>Les services associées</h3>
<?= Donneracces::HTML_checkboxModiierSup($row, "ser_id", "ser_libelle", "don_service", "don_quantite", "don_quantite") ?>
<h3>Ajouter des services</h3>
<?php $row2 = Donneracces::selectAllServNoReser($hotel, $id);
echo Donneracces::HTML_checkboxAjouter($row2, "ser_id", "ser_libelle", "don_service", "don_quantite", "don_quantite"); ?>
<?php if ($_SESSION["profil"] == 4) { ?><a class="btn btn-info" href="<?= hlien("reservation", "indexAdmin") ?>">Valider ces actions</a>
<?php } else if ($_SESSION["profil"] == 2) { ?><a class="btn btn-info" href="<?= hlien("reservation", "indexUser", "id", $_SESSION["cli_id"]) ?>">Valider ces actions</a>
<?php } else { ?> <?= hlien("reservation", "indexModerator") ?>">Valider ces actions</a><?php } ?>