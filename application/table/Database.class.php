<?php
class Database
{

    static public function creer(string $sqlfile): string
    {
        $sql = file_get_contents($sqlfile);
        Table::$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, 0);
        Table::$link->exec($sql);
        return $sql;
    }

    //retourne un tableau des services d'un hotel
    static public function getServicesHotel($id): array
    {

        $sql = "select pre_service,pre_prix from prestation where pre_hotel=:id ";
        $resultat = Table::$link->prepare($sql);
        $resultat->bindValue(":id", $id, PDO::PARAM_INT);
        $resultat->execute();
        return $resultat->fetchAll();
    }

    /**
     * retourne le tarif d'un chambre d'un hotel donnée
     * @param integer $hotel l'id de l'hotel
     * @param integer $chambre l'id de la chambre
     */
    static public function getTarif($hotel, $chambre): array
    {
        $sql = "select tar_prix from tarifer,
        (select hot_standing from hotel where hot_id=:hotel) standing,
        (select cha_categorie from chambre where cha_id=:chambre) categorie 
        where tar_standing=hot_standing and tar_categorie=cha_categorie";
        $resultat = Table::$link->prepare($sql);
        $resultat->bindValue(":hotel", $hotel, PDO::PARAM_INT);
        $resultat->bindValue(":chambre", $chambre, PDO::PARAM_INT);
        $resultat->execute();
        return $resultat->fetchAll();
    }





    static public function datasetVivehotel()
    {
        $message = "";


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
                return 'en travaux';
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
        $tabsta = [];
        for ($i = 1; $i <= $nbsta; $i++) {
            $stand = getStanding($i);
            $tabsta[] = "(null,'$stand')";
        }
        $sql = "insert into standing values " . implode(",", $tabsta);
        //echo "$sql";
        table::$link->query($sql);
        $message .= "<p>génération de $nbsta standing</p>";

        //catégorie des chambres
        $nbcat = 4;
        $tabcat = [];
        for ($i = 1; $i <= $nbcat; $i++) {
            $cat = getCategorie($i);
            $tabcat[] = "(null,'$cat')";
        }
        $sql = "insert into categorie values " . implode(",", $tabcat);
        Table::$link->query($sql);
        $message .= "<p>génération de $nbcat catégories</p>";

        //génération des services:
        $tabser = [];
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
            $tabser[] = "(null,'$services[$i]')";
        }
        $sql = "insert into services values " . implode(",", $tabser);
        Table::$link->query($sql);
        $message .= "<p>génération des services</p>";

        //génération des tarifs:
        $tabtar = [];
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
                $tabtar[] = "(null,'$i','$j','$tar')";
            }
        }
        $sql = "insert into tarifer values " . implode(",", $tabtar);
        Table::$link->query($sql);
        $message .= "<p>génération des Tarifs de l'hotel</p>";

        //génération des hotel : 50 hotels

        $nbh = 50;
        $tabhot = [];
        for ($i = 1; $i <= $nbh; $i++) {
            $getHstanding = mt_rand(1, 5);
            $standing[] = $getHstanding;
            $getStatut = getStatutHotel(mt_rand(1, 4));
            $longi = mt_rand(-180, 180);
            $lati = mt_rand(-90, 90);
            $code = mt_rand(10000, 99900);
            $tabhot[] = "(null,'nom$i','0900000001',
                   '$i rue de l\'hotel $code Vivehotel','$longi','$lati','photo $i',
                   'descriptif de l\'hotel $i',
                   '$getStatut','$getHstanding')";
        }
        $sql = "insert into hotel values " . implode(",", $tabhot);
        Table::$link->query($sql);
        $message .= "<p>génération de $nbh hotel</p>";


        //génération des admin  

        $nbg = 49;
        $tabadm = [];
        for ($i = 1; $i <= $nbg; $i++) {

            $pwd = "pwd$i";
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $tabadm[] = "(null,'nom_gérant$i','prenom_gérant$i','nom$i.prenom$i@vivehotel.fr','$pwd','4','$i')";
        }
        $pwd = password_hash("mariokart", PASSWORD_DEFAULT);
        $tabadm[] = "(null,'Kart','Mario','mariokart@vivehotel.fr','$pwd','4','50')";
        $sql = "insert into individu values " . implode(",", $tabadm);
        Table::$link->query($sql);
        $message .= "<p>génération de $nbg gérants</p>";

        //génération des individus personnels

        $nbperso = 4;
        $tabmod = [];
        for ($i = 1; $i <= 50; $i++) {
            for ($j = 1; $j <= $nbperso; $j++) {
                $pwd = "pwd$j";
                $pwd = password_hash($pwd, PASSWORD_DEFAULT);
                $tabmod[] = "(null,'nom_perso$j','prenom_perso$j','nom$j.prenom$j@vivehotel.fr','$pwd','3','$i')";
            }
        }
        $pwd = password_hash("victorhugo", PASSWORD_DEFAULT);
        $tabmod[] = "(null,'Hugo','Victor','victorhugo@vivehotel.fr','$pwd','3','12')";
        $sql = "insert into individu values " . implode(",", $tabmod);
        Table::$link->query($sql);
        $message .= "<p>génération de $nbperso personnels par hotel</p>";

        //génération des individus SRC 

        $nbsrc = 10;
        $tabsrc = [];
        for ($i = 1; $i <= $nbsrc; $i++) {
            $pwd = "pwd$i";
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $tabsrc[] = "(null,'nom_src$i','prenom_src$i','nom$i.prenom$i@vivehotel.fr','$pwd','3',null)";
        }
        $sql = "insert into individu values " . implode(",", $tabsrc);
        Table::$link->query($sql);
        $message .= "<p>génération de $nbsrc individus SRC</p>";


        //génération des clients   

        $nbcl = 500;
        $tabcli = [];
        for ($i = 1; $i <= $nbcl; $i++) {
            $pwd = "pwd$i";
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $tabcli[] = "(null,'nom$i','prenom$i','nom$i.prenom$i@login.fr','$pwd','2')";
        }
        $pwd = password_hash("jeandujardin", PASSWORD_DEFAULT);
        $tabcli[] = "(null,'Dujardin','Jean','jeandujardin@gmail.com','$pwd','2')";
        $sql = "insert into client values " . implode(",", $tabcli);
        Table::$link->query($sql);
        $message .= "<p>génération de $nbcl clients</p>";

        //génération des chambres :
        $nbh = 50;
        $tabcha = [];
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

                $tabcha[] = "(null,'chambre $j hotel $x','photo chambre $j - h $x',
                'descriptif de la chambre $j de hotel $x','$statut','$surface','$lit',
                '$jacuzzi','$balcon','$minibar','$wifi','$coffre','$vue',
                '$categorie','$x')";
            }
        }
        $sql = "insert into chambre values " . implode(",", $tabcha);
        Table::$link->query($sql);
        $message .= "<p>génération des chambre des hotels</p>";

        //génération des prestations:

        $service = range(1, 11);
        $tabpre = [];

        for ($i = 1; $i <= $nbh; $i++) {
            shuffle($service);
            $s = mt_rand(0, 6);
            for ($j = 0; $j <= $s; $j++) {
                $ss = $service[$j];
                $prix = mt_rand(0, 25);
                $tabpre[] = "(null,'$ss','$i','$prix')";
            }
        }
        $sql = "insert into prestation values " . implode(",", $tabpre);
        Table::$link->query($sql);
        $message .= "<p>génération des services des hotels avec le prix à l'unité</p>";

        //génération des réservations et des services associers

        $nbcl = 501;
        $tabres = [];
        $tabd = [];
        for ($i = 1; $i <= $nbcl; $i++) {
            $dc = mktime(mt_rand(8, 23), mt_rand(0, 59), 0, mt_rand(1, 12), mt_rand(1, 30), 2023);
            $datec = date('Y-m-d H:i:s', $dc);
            //temps de maj
            $tm = mt_rand(0, 5);
            if ($tm == 0)
                $datem = $datec;
            else {
                $dm = $dc + 3600 * 24 * $tm;
                $datem = date('Y-m-d H:i:s', $dm);
            }
            $db = mktime(0, 0, 0, mt_rand(1, 12), mt_rand(1, 30), mt_rand(2022, 2023));
            $datedb = date('Y-m-d', $db);
            //le temps de séjour
            $ts = mt_rand(1, 7);
            $df = $db + 3600 * 24 * $ts;
            $datef = date('Y-m-d H:i:s', $df);

            $hot = mt_rand(1, 50);
            $y = $hot - 1;

            $chambre = mt_rand(1, $cha[$y]);
            //génération des service lié à la réservations
            $donA = self::getServicesHotel($hot);

            //----------------------------------------------------
            /*à modifier absolument pour regénérerla base de donné*/
            shuffle($donA);
            // on parcour le tableau des service d'un hotel
            $prixS = 0;
            $tar = self::getTarif($y, $chambre);

            foreach ($donA as $ligne) {
                extract($ligne);
                //extract($donA[$w]);
                //print_r($donA[$w]);
                //print_r($ligne);
                $q = mt_rand(1, 2);
                $q = $q * $ts;
                foreach ($tar as $ttar)  extract($ttar);
                $prixS = $prixS + $q * $pre_prix + $ts * $tar_prix;
                $tabd[] = "(null,'$i','$pre_service','$q')";
                // print_r($tabd);
            }
            $pHT = $prixS;
            $etat = getEtatRes(mt_rand(1, 4));
            $tabres[] = "(null,'$datec','$datem','$datedb','$datef',
            '$pHT','$etat','$i','$hot','$chambre',' ')";
        }
        $sqlres = "insert into reservation values " . implode(',', $tabres);
        //echo $sqlres;
        Table::$link->query($sqlres);
        $message .= "<p>génération de $nbcl reservations</p>";
        //--------------------------------------------------------
        //génération des donner acces:


        $sqldon = "insert into donnerAcces values " . implode(',', $tabd);
        //echo $sqldon;

        Table::$link->query($sqldon);
        $message .= "<p>génération des accès aux services</p>";

        return $message;
    }
}
