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

<h2>Bienvenue sur le site du groupe hôtelier ViveHotel !</h2>

<div>
    <table>
        <td>
            <img style="margin-top: -1100px;" src="_images/Pullman.png" alt="pull" height="42">
            <img style="margin-top: -1000px;" src="_images/Mercure_logo.jpg" alt="Mer" height="60">
            <img style="margin-top: -900px;" src="_images/Ibis_Logo.png" alt="ibis" height="55">
            <img style="margin-top: -800px;" src="_images/Novotel_logo.jpg" alt="novo" height="60">
            <img style="margin-top: -700px;" src="_images/Sofitellogo.png" alt="sof" height="66">
        <th>
</div>
<div style="margin-left: -100%;">
    <img src="_images/France.jpg" alt="france" height="220">
    <h6 style="background-color:goldenrod">50 hôtels répartis en France</h6>
</div>
<br>
</td>
</div>

<div>
    <p>
        <td>

            <!--Formulaire de réservation-->
        <td>
            <form method="post">
                <h4 style="color:goldenrod">Réservez ici : </h4><br>
                <p>
                <h5 style="color:goldenrod">Sélectionner une ville : </h5><br>
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
    <h5>Services (optionnel) </h5>
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
    </td>
    <td>
        <div class="contener dp-line">
            <br><br>
            <img src="_images/pullman.jpg" alt="pullman" height="210">
            <h6 style="background-color:lightslategrey">Pullman</h6><br>
            <img src="_images/Mercure.jpg" alt="mercure" height="210">
            <h6 style="background-color:darkmagenta">Mercure</h6><br>
            <img src="_images/Ibistyles.jpg" alt="ibis" height="210">
            <h6 style="background-color:red">Ibis</h6><br>
            <img src="_images/Novotel.jpg" alt="novotel" height="210">
            <h6 style="background-color:navy">Novotel</h6><br>
            <img src="_images/Sofitel.jpg" alt="sofitel" height="210">
            <h6 style="background-color:goldenrod">Sofitel</h6><br>
    </td>
</p><br>
</div>
</div>
        <th>
        <p><img src="_images/services.jpg">
        <h6 style="background-color:goldenrod" style="margin-top: 100%;">Des services qui conviendront à chaqun</h6>
        </p>
        <li>Wi-Fi</li>
        <li>Piscine</li>
        <li>Jacouzzi</li>
        <li>Salle de sport/fitness</li>
        <li>Salle de massage/bien-être</li>
        <li>Salle détente (TV, tables de jeux, etc...)</li>

        <br><br>
        <p><img src="_images/room4.jpg">
        <h6 style="background-color:goldenrod">Sentez-vous y comme chez vous !</h6>
        </p><br>
        </th>
</div>
</table>