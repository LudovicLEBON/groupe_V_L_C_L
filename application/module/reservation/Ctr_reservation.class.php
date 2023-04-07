<?php

/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
 */
class Ctr_reservation extends Ctr_controleur implements I_crud
{

	public function __construct($action)
	{
		parent::__construct("reservation", $action);
		$a = "a_$action";
		$this->$a();
	}

	function a_index()
	{
		$u = new Reservation();
		$data = $u->selectAll();
		require $this->gabarit;
	}

	function a_indexAdmin()
	{
		$u = new Reservation();
		$data = $u->selectreservation();
		require $this->gabarit;
	}

	function a_indexUser()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u = new Reservation();
		$data = $u->selectAllClient($id);
		require $this->gabarit;
	}

	function a_indexModerator()
	{
		$u = new Reservation();
		$data = $u->selectAll();
		require $this->gabarit;
	}

	//$_GET["id"] : id de l'enregistrement
	function a_creerClient()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u = new Reservation();

		$row = $u->emptyRecord();

		extract($row);
		require $this->gabarit;
	}

	//$_GET["id"] : id de l'enregistrement
	function a_creer()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u = new Reservation();

		$row = $u->emptyRecord();

		extract($row);
		require $this->gabarit;
	}

	//$_GET["id"] : id de l'enregistrement
	function a_edit()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u = new Reservation();
		if ($id > 0)
			$row = $u->select($id);
		else
			$row = $u->emptyRecord();

		extract($row);
		require $this->gabarit;
	}

	//$_GET["id"] : id de l'enregistrement
	function a_editAdmin()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u = new Reservation();

		$row = $u->select($id);


		extract($row);
		require $this->gabarit;
	}

	//$_GET["id"] : id de l'enregistrement
	function a_editModerator()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u = new Reservation();

		$row = $u->select($id);


		extract($row);
		require $this->gabarit;
	}

	//$_GET["id"] : id de l'enregistrement
	function a_editUser()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;

		$u = new Reservation();
		if ($id > 0)
			$row = $u->select($id);


		extract($row);
		require $this->gabarit;
	}

	//$_POST
	function a_save()
	{
		if (isset($_POST["btSubmit"])) {
			$value = [];
			$sta = Hotel::selectStanding($_POST["res_hotel"]);
			foreach ($sta as $key) $value[] = $key;
			$cat = Chambre::selectCategorie($_POST["res_chambre"]);
			foreach ($cat as $keys) $value[] = $keys;
			$_POST["res_date_maj"] = date("Y-m-d H:i");
			$TTC = Reservation::calculPrixTotal($_POST["res_hotel"], $value[0], $value[1], $_POST["res_id"]);
			foreach ($TTC as $prix) $_POST["res_prix_total"] = $prix;
			$u = new Reservation();
			$u->save($_POST);
			if ($_POST["res_id"] == 0)
				$_SESSION["message"][] = "Le nouvel enregistrement Reservation a bien été créé.";
			else
				$_SESSION["message"][] = "L'enregistrement Reservation a bien été mis à jour.";
		}
		$redirection = $_SESSION["ind_profil"] == "3" ? hlien("reservation", "indexModerator") :  hlien("reservation", "indexAdmin");
		header("location:" . $redirection);
	}

	//$_POST des réservation créées par un modérateur ou un admin
	function a_saveAdMod()
	{
		if (isset($_POST["btSubmit"])) {
			$_POST["res_date_maj"] = date("Y-m-d H:i");
			$_POST["res_chambre"] = 0;
			$u = new Reservation();
			$u->save($_POST);
			if ($_POST["res_id"] == 0)
				$_SESSION["message"][] = "Le nouvel enregistrement Reservation a bien été créé.";
			else
				$_SESSION["message"][] = "L'enregistrement Reservation a bien été mis à jour.";
		}
		$redirection = $_SESSION["ind_profil"] == "3" ? hlien("reservation", "indexModerator") :  hlien("reservation", "indexAdmin");
		header("location:" . $redirection);
	}

	//$_POST des réservation éditées par un client
	function a_saveEditClient()
	{
		if (isset($_POST["btSubmit"])) {
			$_POST["res_date_maj"] = date("Y-m-d H:i");
			$_POST["res_etat"] = $_POST["res_etat"] == "annulée" ? "annulée" : "initialisée";
			$u = new Reservation();
			$u->save($_POST);
			if ($_POST["res_id"] == 0)
				$_SESSION["message"][] = "Le nouvel enregistrement Reservation a bien été créé.";
			else
				$_SESSION["message"][] = "L'enregistrement des modification de la réservation a bien été mis à jour.";
		}
		header("location:" . hlien("reservation", "indexUser", "id", $_SESSION["cli_id"]));
	}

	//$_POST des réservation créées par un client
	function a_saveClient()
	{
		if (isset($_POST["btSubmit"])) {
			$_POST["res_date_maj"] = date("Y-m-d H:i");
			$_POST["res_client"] = $_SESSION["cli_id"];
			$_POST["res_chambre"] = 0;
			$_POST["res_prix_total"] = 0;
			$_POST["res_etat"] = "initialisée";
			$u = new Reservation();
			$u->save($_POST);
			if ($_POST["res_id"] == 0)
				$_SESSION["message"][] = "Le nouvel enregistrement Reservation a bien été créé.";
			else
				$_SESSION["message"][] = "L'enregistrement Reservation a bien été mis à jour.";
		}
		header("location:" . hlien("reservation", "indexUser", "id", $_SESSION["cli_id"]));
	}



	//param GET id 
	function a_delete()
	{
		if (isset($_GET["id"])) {
			$u = new Reservation();
			$u->delete($_GET["id"]);
			$_SESSION["message"][] = "L'enregistrement Reservation a bien été supprimé.";
		}
		header("location:" . hlien("reservation"));
	}
}
