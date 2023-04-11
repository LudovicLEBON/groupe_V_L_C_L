<?php
$liste=["Petit déjeuner","Accès piscine","Accès salle de sport/Fitness","Accès jacouzzi","Accès salle détente"];
$couleur="";

$message="";

extract($_POST);
if (isset($btsubmit)) {
    $message="" . $liste[$couleur];
}
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
        <label for="service">Services (optionel) : </label>
            <select id="service" name="service">
                <?php
                foreach($liste as $cle => $valeur) { 
                    if ($couleur == $cle)
                        $selection="selected";
                    else
                        $selection="";
                    ?>
                    <option <?=$selection?> value="<?=$cle?>"><?=$valeur?></option>
                <?php } ?>
            </select>
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
<h6 style="background-color:goldenrod">Des services pour tous les goûts</h6>
</p>
<li>Wi-Fi</li>
<li>Piscine</li>
<li>Jacouzzi</li>
<li>Salle de sport/fitness</li>
<li>Salle détente (TV, tables de jeux, etc...)</li>

<br><br>
<p><img src="_images/room4.jpg">
<h6 style="background-color:goldenrod">Sentez-vous y comme chez vous !</h6>
</p><br>