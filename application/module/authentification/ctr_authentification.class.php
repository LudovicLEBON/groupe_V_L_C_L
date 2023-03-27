<?php
class Ctr_authentification extends Ctr_controleur
{

    public function __construct($action)
    {
        parent::__construct("authentification", $action);
        $a = "a_$action";
        $this->$a();
    }

    //inscription des personnels
    public function a_inscriptionPersonnel()
    {
        extract($_POST);
        if (isset($_SESSION["ind_id"])) {
            $_SESSION["message"][] = "Tentative d'intrusion détectée...";
            require $this->gabarit;
            exit;
        }

        if (isset($btSubmit)) {
            //vérifier que $uti_email est unique
            if (!Individu::estLoginUnique($ind_login)) {
                $_SESSION["message"][] = "$ind_login : ce login est déjà prise. Veuillez en saisir une autre.";
                require $this->gabarit;
                exit;
            }

            //vérifier que $uti_mdp==$uti_mdp2
            if ($ind_pwd != $ind_pwd2) {
                $_SESSION["message"][] = "La vérification du mot de passe à échouer. Veuillez vérifier votre mot de passe.";
                require $this->gabarit;
                exit;
            }

            //Tous est ok : enregistrement du nouvel utilisateur
            $_POST["ind_id"] = 0;
            $_POST["ind_pwd"] = password_hash($_POST["ind_pwd"], PASSWORD_DEFAULT);
            $_POST["ind_profil"] = 3;
            (new Individu)->save($_POST);
            $_SESSION["message"][] = "Bravo $ind_login ! Inscription réussie. Vous pouvez maintenant vous connecter.";
            //rediriger sur l'accueil
            header("location:" . hlien("_default"));
        } else {
            //affichage du formulaire
            extract((new Individu())->emptyRecord());
            require $this->gabarit;
        }
    }

    //inscription des clients
    public function a_inscriptionClient()
    {
        extract($_POST);
        if (isset($_SESSION["cli_id"])) {
            $_SESSION["message"][] = "Tentative d'intrusion détectée...";
            require $this->gabarit;
            exit;
        }

        if (isset($btSubmit)) {
            //vérifier que $uti_email est unique
            if (!Client::estLoginUnique($cli_login)) {
                $_SESSION["message"][] = "$cli_login : ce login est déjà prise. Veuillez en saisir une autre.";
                require $this->gabarit;
                exit;
            }

            //vérifier que $uti_mdp==$uti_mdp2
            if ($cli_pwd != $cli_pwd2) {
                $_SESSION["message"][] = "La vérification du mot de passe à échouer. Veuillez vérifier votre mot de passe.";
                require $this->gabarit;
                exit;
            }

            //Tous est ok : enregistrement du nouvel utilisateur
            $_POST["cli_id"] = 0;
            $_POST["cli_pwd"] = password_hash($_POST["cli_pwd"], PASSWORD_DEFAULT);
            $_POST["cli_profil"] = 2;
            (new Client)->save($_POST);
            $_SESSION["message"][] = "Bravo $cli_login ! Inscription réussie. Vous pouvez maintenant vous connecter.";
            //rediriger sur l'accueil
            header("location:" . hlien("_default"));
        } else {
            //affichage du formulaire
            extract((new Client())->emptyRecord());
            require $this->gabarit;
        }
    }

    public function a_connexionPersonnel()
    {
        if (isset($_SESSION["ind_id"]) or isset($_SESSION["cli_id"])) {
            $_SESSION["message"][] = "Tentative d'intrusion détectée...";
            require $this->gabarit;
            exit;
        }

        extract($_POST);
        if (isset($btSubmit)) {

            //récupérer en bdd l'utilisateur qui posséde $uti_email
            $row = Individu::selectByLogin($ind_login);

            if ($row === false) {
                $_SESSION["message"][] = "$ind_login n'existe pas. Vérifiez votre saisie";
                require $this->gabarit;
                exit;
            }

            //vérification du mot de passe
            if (!password_verify($ind_pwd, $row["ind_pwd"])) {
                $_SESSION["message"][] = "Mot de passe incorrect.";
                require $this->gabarit;
                exit;
            }

            //Connexion réussie
            extract($row);
            $_SESSION["ind_id"] = $ind_id;
            $_SESSION["ind_nom"] = $ind_nom;
            $_SESSION["ind_prenom"] = $ind_prenom;
            $_SESSION["ind_login"] = $ind_login;
            $_SESSION["ind_profil"] = $ind_profil;
            $_SESSION["message"][] = "bienvenu $ind_prenom $ind_nom.";
            header("location:" . hlien("_default"));
        } else {
            $ind_login = "";

            require $this->gabarit;
        }
    }


    public function a_connexionCient()
    {
        if (isset($_SESSION["ind_id"]) or isset($_SESSION["cli_id"])) {
            $_SESSION["message"][] = "Tentative d'intrusion détectée...";
            require $this->gabarit;
            exit;
        }

        extract($_POST);
        if (isset($btSubmit)) {

            //récupérer en bdd l'utilisateur qui posséde $uti_email
            $row = Client::selectByLogin($cli_login);

            if ($row === false) {
                $_SESSION["message"][] = "$cli_login n'existe pas. Vérifiez votre saisie";
                require $this->gabarit;
                exit;
            }

            //vérification du mot de passe
            if (!password_verify($cli_pwd, $row["cli_pwd"])) {
                $_SESSION["message"][] = "Mot de passe incorrect.";
                require $this->gabarit;
                exit;
            }

            //Connexion réussie
            extract($row);
            $_SESSION["cli_id"] = $cli_id;
            $_SESSION["cli_nom"] = $cli_nom;
            $_SESSION["cli_prenom"] = $cli_prenom;
            $_SESSION["cli_login"] = $cli_login;
            $_SESSION["cli_profil"] = $cli_profil;
            $_SESSION["message"][] = "bienvenu $cli_prenom $cli_nom.";
            header("location:" . hlien("_default"));
        } else {

            $cli_login = "";
            require $this->gabarit;
        }
    }


    public function a_deconnexion()
    {
        $_SESSION = [];
        $_SESSION["message"][] = "Vous êtes bien déconnecté.";
        header("location:" . hlien("_default"));
    }
}
