<?php

/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
 */
class Ctr_chambre extends Ctr_controleur implements I_crud
{

	public function __construct($action)
	{
		parent::__construct("chambre", $action);
		$a = "a_$action";
		$this->$a();
	}

	function a_index()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u = new Chambre($id);
		$data = $u->selectChambre($id);
		require $this->gabarit;
	}

	function a_indexAdmin()
	{

		$u = new Chambre();
		$data = $u->selectChambre($_SESSION['hotel']);
		require $this->gabarit;
	}

	function a_indexModerator()
	{
		$u = new Chambre();
		$data = $u->selectchambre($_SESSION["hotel"]);
		require $this->gabarit;
	}

	//$_GET["id"] : id de l'enregistrement
	function a_edit()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u = new Chambre();
		if ($id > 0)
			$row = $u->select($id);
		else
			$row = $u->emptyRecord();

		extract($row);
		require $this->gabarit;
	}

	//$_POST
	function a_save()
	{
		if (isset($_POST["btSubmit"])) {
			$u = new Chambre();
			$_POST["cha_jacuzzi"] = $_POST["cha_jacuzzi"] == "on" ? "1" : "0";
			$_POST["cha_balcon"] = $_POST["cha_balcon"] == "on" ? "1" : "0";
			$_POST["cha_coffre"] = $_POST["cha_coffre"] == "on" ? "1" : "0";
			$_POST["cha_wifi"] = $_POST["cha_wifi"] == "on" ? "1" : "0";
			$_POST["cha_minibar"] = $_POST["cha_minibar"] == "on" ? "1" : "0";
			$_POST["cha_vue"] = $_POST["cha_vue"] == "on" ? "1" : "0";
			$u->save($_POST);
			if ($_POST["cha_id"] == 0)
				$_SESSION["message"][] = "Le nouvel enregistrement Chambre a bien été créé.";
			else
				$_SESSION["message"][] = "L'enregistrement Chambre a bien été mis à jour.";
		}
		header("location:" . hlien("chambre", "indexAdmin"));
	}



	//param GET id 
	function a_delete()
	{
		if (isset($_GET["id"])) {
			$u = new Chambre();
			$u->delete($_GET["id"]);
			$_SESSION["message"][] = "L'enregistrement Chambre a bien été supprimé.";
		}
		header("location:" . hlien("chambre", "indexAdmin"));
	}
}
