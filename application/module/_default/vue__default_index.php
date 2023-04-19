<?php
$options = [
    1 => ["nom" => "Petit déjeuner", "prix" => 5],
    2 => ["nom" => "Accès piscine", "prix" => 10],
    3 => ["nom" => "Accès salle de sport", "prix" => 10],
    4 => ["nom" => "Accès salle de massage/bien-être", "prix" => 20],
    5 => ["nom" => "Accès jacouzzi", "prix" => 15]
];

$services = [];
$somme = 0;
extract($_POST);

$liste = [
    "Paris",
    "Marseille",
    "Lion",
    "Montpeliers",
    "Nantes",
    "Lille",
    "Toulouse",
    "Nice",
    "Nancy",
    "Le Havre",
    "Bordeaux",
    "Nîmes",
    "Angers",
    "Saint-Etienne",
    "Clermont-Ferrand",
    "Brest",
    "Ajaccio",
    "Bastia",
    "Lens",
    ""
];

$city = "";
$message = "";

extract($_POST);
if (isset($btsubmit)) {
    $message = "" . $liste[$city];
}
?>

<div class="container">><h2 class="text-center display-3 fs-3">Bienvenue sur le site du groupe hôtelier ViveHotel !</h2>
    <div class="partners">
        <td>
            <img src="_images/Pullman.png" class="pull">
            <img src="_images/Mercure_logo.jpg" class="mer">
            <img src="_images/Ibis_Logo.png" class="ibs">
            <img src="_images/Novotel_logo.jpg" class="nov">
            <img src="_images/Sofitellogo.png" class="sof">
        </td>
    </div>
</div>
<br><br>
<div class="container " style=" display:inline-block">
    <div class="block img w-50"><img class="w-25 h-25" alt="carte de france" src="_images/France.jpg">
        <h6 style="background-color:rgb(220, 188, 11)" style="color:white" class="w-25">50 hôtels répartis en France</h6>
    </div>
    <div class="form w-50 block">
        <!--Formulaire de réservation-->
        <form method="post">
            <h4 style="color:goldenrod">Réservez ici : </h4><br>
            <p><br>
                <label for="city">ville : </label>
                <select id="city" name="city">
                    <?php
                    foreach ($liste as $cle => $valeur) {
                        if ($city == $cle)
                            $selection = "selected";
                        else
                            $selection = "";
                    ?>
                        <option <?= $selection ?> value="<?= $cle ?>"><?= $valeur ?></option>
                    <?php } ?>
                </select>
            </p>
            <p>
                <label for="datearrivee">Date d'arrivée : </label>
                <input type="date" id="datearrivee" name="datearrivee" required>
            </p>
            <p>
                <label for="datedepart">Date de départ : </label>
                <input type="date" id="datedepart" name="datedepart" required>
            </p>
            <br>
            <h5>Services (optionnel) </h5><br><br>
            <form method="post">
                <?php
                foreach ($options as $cle => $valeur) {
                    $ck = "";
                    if (in_array($cle, $services)) {
                        $ck = "checked";
                        $somme = $somme + $valeur["prix"];
                    }

                    echo "<p><input $ck type='checkbox' id='ck$cle' name='services[]' value='$cle'><label for='ck$cle'>{$valeur['nom']}</label>";
                }
                ?>

                </p>
                <p>
                    <input style="background-color:mediumseagreen" type="submit" name="btsubmit" value="Lancer la recherche">
                </p>
                <h6 style=color:goldenrod>Remboursable jusqu'au jour d'arrivée, avant 18 heures.</h6>
            </form>
    </div>
</div>
<br><br>

<div class="container">
    <img src="_images/services.jpg" class="services">
</div>