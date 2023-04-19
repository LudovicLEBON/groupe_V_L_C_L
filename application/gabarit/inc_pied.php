<ul class="navbar-nav ml-auto text-center text-light">
    <?php if (!isset($_SESSION["cli_id"]) || !isset($_SESSION["ind_id"])) { ?>

        <li class="text-light"><a class="nav-link text-light fs-6" href='<?= hlien("authentification", "connexionPersonnel") ?>'>Connexion du personnel</a></li>

    <?php } else { ?><li> </li> <?php } ?>
</ul>
<!--</div> -->
<h6 style="color:rgb(220, 188, 11)">ViveHotel_groupe_VLCL&copy;2022-2023</h6>
<script src="_js/index.js"></script>