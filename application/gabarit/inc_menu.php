<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</span></a>
        </li>


        <li><a class='nav-link' href='<?= hlien("categorie", "index") ?>'>Categorie</a></li>
        <li><a class='nav-link' href='<?= hlien("chambre", "indexAdmin") ?>'>Chambre</a></li>
        <li><a class='nav-link' href='<?= hlien("client", "index") ?>'>Client</a></li>
        <li><a class='nav-link' href='<?= hlien("donneracces", "index") ?>'>Donneracces</a></li>
        <li><a class='nav-link' href='<?= hlien("hotel", "indexAdmin") ?>'>Hotel</a></li>
        <li><a class='nav-link' href='<?= hlien("individu", "index") ?>'>Individu</a></li>
        <li><a class='nav-link' href='<?= hlien("prestation", "index") ?>'>Prestation</a></li>
        <li><a class='nav-link' href='<?= hlien("profil", "index") ?>'>Profil</a></li>
        <li><a class='nav-link' href='<?= hlien("reservation", "index") ?>'>Reservation</a></li>
        <li><a class='nav-link' href='<?= hlien("services", "index") ?>'>Services</a></li>
        <li><a class='nav-link' href='<?= hlien("standing", "index") ?>'>Standing</a></li>
        <li><a class='nav-link' href='<?= hlien("tarifer", "index") ?>'>Tarifer</a></li>

        <ul class="navbar-nav ml-auto">
          <?php if (isset($_SESSION["cli_id"]) || isset($_SESSION["ind_id"])) { ?>
            <li><a class="nav-link" href="<?= hlien("authentification", "deconnexion") ?>">Déconnexion</a></li>
            <li><a class="nav-link" ?><?= $_SESSION["ann_login"] ?></a></li>
          <?php } else { ?>
            <li><a class="nav-link" href='<?= hlien("authentification", "connexionPersonnel") ?>'>Connexion du personnel</a></li>
            <li><a class="nav-link" href='<?= hlien("authentification", "connexionClient") ?>'>Connexion</a></li>
            <li><a class="nav-link" href='<?= hlien("authentification", "inscriptionClient") ?>'>Inscription</a></li>
          <?php } ?>
        </ul>
    </div>
  </div>
</nav>