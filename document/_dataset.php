<?php
require("../include/inc_config.php");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require("../include/inc_head.php"); ?>
</head>

<body>
    <!-- lien de navigation pour lecteur d'écran -->
    <a href="#main" class="sr-only">aller au contenu principal</a>
    <!-- En-tête de page -->
    <header>
        <?php require("../include/inc_header.php"); ?>
    </header>

    <!-- menu de navigation -->
    <nav>
        <?php require("../include/inc_menu.php"); ?>
    </nav>

    <!-- contenu principal de la page -->
    <main id="main">
        <h1>Génération des données</h1>
        <?php

        //les fonctions génériques  

        /**
         * liste des services d'un hotel
         * avec le prix unitaire du service
         */
        function getServicesHotel($id)
        {
            global $link;
            $sql = "select pre_service,pre_prix from prestation where pre_hotel=$id ";
            $resultat = mysqli_query($link, $sql);
            //Charge toutes les données dans un tableau à 2 dimsensions
            return mysqli_fetch_all($resultat, MYSQLI_ASSOC);
        }

        /* fonction qui attribue un type d'hotel */

        function getStanding($s)
        {
            $c = $s;
            if ($c == 1)
                return '**';
            else if ($c == 2)
                return '***';
            else if ($c == 3)
                return '****';
            else if ($c == 4)
                return '*****';
            else
                return 'palace';
        }

        /* fonction qui attribue un type de chambre */

        function getCategorie($i)
        {
            $c = $i;
            if ($c == 1)
                return 'standard';
            else if ($c == 2)
                return 'superieure';
            else if ($c == 3)
                return 'luxe';
            else
                return 'suite';
        }

        /* fonction qui attribue le statut de l'hotel */

        function getStatutHotel($e)
        {
            $c = $e;
            if ($c == 1)
                return 'ouvert';
            else if ($c == 2)
                return 'complet';
            else if ($c == 3)
                return 'travaux';
            else
                return 'fermé';
        }

        /* fonction statut de la chambre */
        function getStatutChambre($f)
        {
            $c = $f;
            if ($c == 1)
                return 'occupée';
            else if ($c == 2)
                return 'libre';
            else
                return 'travaux';
        }

        /* fonction type d lit */
        function getTypeLit($l)
        {
            $t = $l;
            if ($t == 1)
                return '2 lits simples';
            else if ($t == 2)
                return 'lit double standard queen size';
            else if ($t == 3)
                return 'lit double confort';
            else if ($t == 4)
                return 'lit double king size';
            else
                return '1 lit double et 1 lit simple';
        }

        /* fonction pour l'état des réservation */
        function getEtatRes($e)
        {

            if ($e == 1)
                return 'initialisée';
            else if ($e == 2)
                return 'validée';
            else if ($e == 3)
                return 'annulée';
            else
                return 'en attente';
        }


        //génération du standing des hotels:
        $nbsta = 5;
        $tab = [];
        for ($i = 1; $i <= $nbsta; $i++) {
            $stand = getStanding($i);
            $tab[] = "(null,'$stand')";
        }
        $sql = "insert into standing values " . implode(",", $tab);
        mysqli_query($link, $sql);
        echo "<p>génération de $nbsta standing</p>";

        $nbcat = 4;
        $tab = [];
        for ($i = 1; $i <= $nbcat; $i++) {
            $cat = getCategorie($i);
            $tab[] = "(null,'$cat')";
        }
        $sql = "insert into categorie values " . implode(",", $tab);
        mysqli_query($link, $sql);
        echo "<p>génération de $nbcat catégories</p>";

        //génération des services:
        $tab = [];
        $services = [
            'Piscine',
            'Bien être',
            'Remise en forme',
            'Thalassothérapie',
            'Tennis',
            'Parking',
            'Animal domestique accepté',
            'Wifi internet',
            'Accessibilité personnes à mobilité réduite',
            'Garde d enfant sur demande',
            'Salle de fitness'
        ];

        for ($i = 0; $i < count($services); $i++) {
            $tab[] = "(null,'$services[$i]')";
        }
        $sql = "insert into services values " . implode(",", $tab);
        mysqli_query($link, $sql);
        echo "<p>génération des services</p>";

        //génération des tarifs:
        $tab = [];
        $t = [
            1 => [50, 60, 70, 80],
            2 => [70, 80, 90, 100],
            3 => [85, 110, 150, 200],
            4 => [120, 230, 290, 1500],
            5 => [0, 0, 1200, 2100]
        ];
        for ($i = 1; $i <= $nbsta; $i++) {
            for ($j = 1; $j <= $nbcat; $j++) {
                $c = $j - 1;
                $tar = $t[$i][$c];
                $tab[] = "(null,'$i','$j','$tar')";
            }
        }
        $sql = "insert into tarifer values " . implode(",", $tab);
        mysqli_query($link, $sql);
        echo "<p>génération des Tarifs de l'hotel</p>";

        //génération des hotel : 50 hotels

        $nbh = 50;
        $tab = [];
        for ($i = 1; $i <= $nbh; $i++) {
            $getHstanding = mt_rand(1, 5);
            $standing[] = $getHstanding;
            $getStatut = getStatutHotel(mt_rand(1, 4));
            $longi = mt_rand(-180, 180);
            $lati = mt_rand(-90, 90);
            $code = mt_rand(10000, 99900);
            $tab[] = "(null,'nom$i','0900000001',
                   '$i rue de l\'hotel $code Vivehotel','$longi','$lati','photo $i',
                   'descriptif de l\'hotel $i',
                   '$getStatut','$getHstanding')";
        }
        $sql = "insert into hotel values " . implode(",", $tab);
        mysqli_query($link, $sql);
        echo "<p>génération de $nbh hotel</p>";


        //génération des gérant  

        $nbg = 50;
        $tab = [];
        for ($i = 1; $i <= $nbg; $i++) {

            $pwd = "pwd$i";
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $tab[] = "(null,'nom_gérant$i','prenom_gérant$i','nom$i.prenom$i@vivehotel.fr','$pwd','4','$i')";
        }
        $sql = "insert into individu values " . implode(",", $tab);
        mysqli_query($link, $sql);
        echo "<p>génération de $nbg gérants</p>";

        //génération des individus personnels

        $nbperso = 2;
        $tab = [];
        for ($i = 1; $i <= 50; $i++) {
            for ($j = 1; $j <= $nbperso; $j++) {
                $pwd = "pwd$j";
                $pwd = password_hash($pwd, PASSWORD_DEFAULT);
                $tab[] = "(null,'nom_perso$j','prenom_perso$j','nom$j.prenom$j@vivehotel$i.fri','$pwd','2','$i')";
            }
        }
        $sql = "insert into individu values " . implode(",", $tab);
        mysqli_query($link, $sql);
        echo "<p>génération de $nbperso personnels par hotel</p>";

        //génération des individus SRC 

        $nbsrc = 10;
        $tab = [];
        for ($i = 1; $i <= $nbsrc; $i++) {
            $pwd = "pwd$i";
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $tab[] = "(null,'nom_src$i','prenom_src$i','nom$i.prenom$i@vivehotel.fr','$pwd','3',null)";
        }
        $sql = "insert into individu values " . implode(",", $tab);
        mysqli_query($link, $sql);
        echo "<p>génération de $nbsrc individus SRC</p>";


        //génération des clients   

        $nbcl = 500;
        $tab = [];
        for ($i = 1; $i <= $nbcl; $i++) {
            $pwd = "pwd$i";
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $tab[] = "(null,'nom$i','prenom$i','nom$i.prenom$i@login.fr','$pwd','1')";
        }
        $sql = "insert into client values " . implode(",", $tab);
        mysqli_query($link, $sql);
        echo "<p>génération de $nbcl clients</p>";

        //génération des chambres :
        $nbh = 50;
        $tab = [];
        //on parcoure les hotels pour attribuer les chambres
        for ($i = 0; $i < $nbh; $i++) {
            $nbch = mt_rand(10, 50);
            $cha[] = $nbch;
            for ($j = 1; $j <= $nbch; $j++) {
                //attribution des catégorie et option en fonction du standing de l'hotel
                if ($standing[$i] == 4) {
                    $categorie = mt_rand(1, 4);
                    $surface = mt_rand(25, 45);
                    $lit = getTypeLit(mt_rand(3, 5));
                    $jacuzzi = 1;
                    $balcon = 1;
                    $wifi = 1;
                    $minibar = 1;
                    $coffre = 1;
                    $vue = 1;
                } elseif ($standing[$i] == 5) {
                    $categorie = mt_rand(3, 4);
                    $surface = mt_rand(25, 60);
                    $lit = getTypeLit(mt_rand(3, 5));
                    $jacuzzi = 1;
                    $balcon = 1;
                    $wifi = 1;
                    $minibar = 1;
                    $coffre = 1;
                    $vue = 1;
                } elseif ($standing[$i] == 1) {
                    $categorie = mt_rand(1, 2);
                    $lit = getTypeLit(mt_rand(1, 2));
                    $surface = mt_rand(12, 19);
                    $jacuzzi = 0;
                    $balcon = 0;
                    $wifi = 1;
                    $minibar = 0;
                    $coffre = 0;
                    $vue = 0;
                } else {
                    $categorie = mt_rand(2, 4);
                    $surface = mt_rand(12, 25);
                    $lit = getTypeLit(mt_rand(1, 3));
                    $jacuzzi = 1;
                    $balcon = 1;
                    $wifi = 1;
                    $minibar = 1;
                    $coffre = 0;
                    $vue = 1;
                }
                //détermination du statut de la chambre
                $statut = getStatutChambre(mt_rand(1, 4));
                $stat[] = $statut;
                $x = $i + 1;

                $tab[] = "(null,'chambre $j hotel $x','photo chambre $j - h $x',
                'descriptif de la chambre $j de hotel $x','$statut','$surface','$lit',
                '$jacuzzi','$balcon','$minibar','$wifi','$coffre','$vue',
                '$categorie','$x')";
            }
        }
        $sql = "insert into chambre values " . implode(",", $tab);
        mysqli_query($link, $sql);
        echo "<p>génération des chambre des hotels</p>";

        //génération des prestations:

        $service = range(1, 11);
        $tab = [];

        for ($i = 1; $i <= $nbh; $i++) {
            shuffle($service);
            $s = mt_rand(0, 6);
            for ($j = 0; $j <= $s; $j++) {
                $ss = $service[$j];
                $prix = mt_rand(0, 25);
                $tab[] = "(null,'$ss','$i','$prix')";
            }
        }
        $sql = "insert into prestation values " . implode(",", $tab);
        mysqli_query($link, $sql);
        echo "<p>génération des services des hotels avec le prix à l'unité</p>";

        //génération des réservations et des services associers

        $nbcl = 500;
        $tab = [];
        for ($i = 1; $i <= $nbcl; $i++) {
            $dc = mktime(mt_rand(8, 23), mt_rand(0, 59), 0, mt_rand(1, 12), mt_rand(1, 30), 2022);
            $datec = date('Y-m-d H:i:s', $dc);
            //temps de maj
            $tm = mt_rand(0, 5);
            if ($tm == 0)
                $datem = $datec;
            else {
                $dm = $dc + 3600 * 24 * $tm;
                $datem = date('Y-m-d H:i:s', $dm);
            }
            $db = mktime(0, 0, 0, mt_rand(1, 12), mt_rand(1, 30), mt_rand(2021, 2022));
            $datedb = date('Y-m-d', $db);
            //le temps de séjour
            $ts = mt_rand(1, 7);
            $df = $db + 3600 * 24 * $ts;
            $datef = date('Y-m-d H:i:s', $df);

            $hot = mt_rand(1, 50);
            $y = $hot - 1;

            $chambre = mt_rand(1, $cha[$y]);
            //génération des service lié à la réservations
            $donA = getServicesHotel($hot);
            $prixS = 0;
            foreach ($donA as $ligne) {
                extract($ligne);
                // print_r($link);
                $q = mt_rand(1, 2);
                $q = $q * $ts;
                $prixS = $prixS + $q * $pre_prix;
                $tabd[] = "(null,'$i','$pre_service','$q')";
                // print_r($tabd);
            }
            $pHT = $prixS;
            $etat = getEtatRes(mt_rand(1, 4));
            $tab[] = "(null,'$datec','$datem','$datedb','$datef',
            '$pHT','$etat','$i','$hot','$chambre')";
        }
        $sql = "insert into reservation values " . implode(",", $tab);
        mysqli_query($link, $sql);
        echo "<p>génération de $nbh reservation</p>";

        //génération des donner acces:


        $sql = "insert into donnerAcces values " . implode(",", $tabd);

        mysqli_query($link, $sql);
        echo "<p>génération des accès aux services</p>";









        ?>
    </main>

    <!-- pied de page -->
    <footer>
        <?php require("../include/inc_footer.php"); ?>
    </footer>
</body>

</html>