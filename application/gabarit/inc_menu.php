<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li><a class='nav-link' href='<?= hlien("database", "creer") ?>'>Créer database</a></li>
        <li><a class='nav-link' href='<?= hlien("database", "dataset") ?>'>Dataset</a></li>



        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">accueil</span></a>
        </li>

        <?php if (isset($_SESSION["ind_id"]) and $_SESSION["profil"] == 4) { ?>

          <li><a class='nav-link' href='<?= hlien("chambre", "indexAdmin") ?>'>Chambre</a></li>
          <li><a class='nav-link' href='<?= hlien("hotel", "indexAdmin") ?>'>Hotel</a></li>
          <li><a class='nav-link' href='<?= hlien("reservation", "indexAdmin") ?>'>Reservation</a></li>
          <li><a class='nav-link' href='<?= hlien("tarifer", "indexAdmin") ?>'>Tarifer</a></li>



          <li><a class='nav-link' href='<?= hlien("client", "index") ?>'>Client</a></li>
          <li><a class='nav-link' href='<?= hlien("individu", "index") ?>'>Individu</a></li>
          <li><a class='nav-link' href='<?= hlien("donneracces", "index") ?>'>Donneracces</a></li>
          <li><a class='nav-link' href='<?= hlien("prestation", "index") ?>'>Prestation</a></li>
          <li><a class='nav-link' href='<?= hlien("services", "index") ?>'>Services</a></li>
          <li><a class='nav-link' href='<?= hlien("categorie", "index") ?>'>Categorie</a></li>
          <li><a class='nav-link' href='<?= hlien("standing", "index") ?>'>Standing</a></li>
          <li><a class='nav-link' href='<?= hlien("profil", "index") ?>'>Profil</a></li>
        <?php } ?>

        <?php if (isset($_SESSION["ind_id"]) and $_SESSION["profil"] == 3) { ?>

          <li><a class='nav-link' href='<?= hlien("chambre", "indexModerator") ?>'>Chambre</a></li>
          <li><a class='nav-link' href='<?= hlien("hotel", "indexModerator") ?>'>Hotel</a></li>
          <li><a class='nav-link' href='<?= hlien("reservation", "indexModerator") ?>'>Reservation</a></li>
          <li><a class='nav-link' href='<?= hlien("tarifer", "indexModerator") ?>'>Tarifer</a></li>
          <li><a class='nav-link' href='<?= hlien("donneracces", "index") ?>'>Donneracces</a></li>
        <?php } ?>
        <?php if (isset($_SESSION["cli_id"]) and $_SESSION["profil"] == 2) { ?>
          <li><a class='nav-link' href='<?= hlien("reservation", "indexUser") ?>'>Reservation</a></li>
          <li><a class='nav-link' href='<?= hlien("client", "indexPerso") ?>'>espace personnel</a></li>
        <?php } ?>



        <ul class="navbar-nav ml-auto">
          <?php if (isset($_SESSION["cli_id"]) || isset($_SESSION["ind_id"])) {
            $login = $_SESSION["profil"] >= "3" ? $_SESSION["ind_login"] : $_SESSION["cli_login"];
          ?>
            <li><a class="nav-link" href="<?= hlien("authentification", "deconnexion") ?>">déconnexion</a></li>
            <li><a class="nav-link"><?= $login ?></a></li>
          <?php } else { ?>
            <li><a class="nav-link" href='<?= hlien("authentification", "connexionPersonnel") ?>'>Connexion du personnel</a></li>
            <li><a class="nav-link" href='<?= hlien("authentification", "connexionClient") ?>'>Connexion</a></li>
            <li><a class="nav-link" href='<?= hlien("authentification", "inscriptionClient") ?>'>Inscription</a></li>
            <li><a class="nav-link" href='<?= hlien("authentification", "inscriptionPersonnel") ?>'>Inscription du personnel</a></li>
          <?php } ?>
        </ul>
    </div>
  </div>
</nav>