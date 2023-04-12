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

?>

<h2>Bienvenue sur le site du groupe hôtelier ViveHotel !</h2>

<table>
    <td>
        <p><img src="_images/France.jpg">
        <h6 style="background-color:goldenrod">30 hôtels répartis en France</h6>
        </p><br>
    </td>
    <p>
        <td>

            <!--Formulaire de réservation-->
            <form method="post">
                <h4 style="color:goldenrod">Réservez ici : </h4><br>
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
        <input style="background-color:goldenrod" type="submit" name="btsubmit" value="Lancer la recherche">
    </p>
    <h6 style=color:goldenrod>Remboursable jusqu'au jour d'arrivée, avant 18 heures.</h6>
    </form>
    </td>
</table>
</p><br>

<p><img src="_images/services.jpg">
<h6 style="background-color:goldenrod">Des services qui conviendront à chaqun</h6>
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