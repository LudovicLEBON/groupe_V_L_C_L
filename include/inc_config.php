<?php
require "inc_fonctions.php";
session_start();
const NOM_DU_SITE="Vivehotel";
//connexion à la base de données
$link = mysqli_connect("localhost", "root", "", "vivehotel");
mysqli_set_charset($link,"utf8");
?>