<?php

/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
 */
class Ctr_donneracces extends Ctr_controleur implements I_crud
{

	public function __construct($action)
	{
		parent::__construct("donneracces", $action);
		$a = "a_$action";
		$this->$a();
	}

	function a_index()
	{
		$u = new Donneracces();
		$data = $u->selectAll();
		require $this->gabarit;
	}

	//$_GET["id"] : id de l'enregistrement
	function a_edit()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;

		$u = new Donneracces();
		if ($id > 0)
			$row = $u->select($id);
		else
			$row = $u->emptyRecord();

		extract($row);
		require $this->gabarit;
	}

	//édition des services d'une réservation
	function a_editServReser()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$hotel = isset($_GET["hotel"]) ? $_GET["hotel"] : "";
		$u = new Donneracces();
		if ($id > 0)
			$row = $u->selectAllServReser($hotel, $id);
		else
			$row = $u->emptyRecord();

		extract($row);
		require $this->gabarit;
	}

	//$_POST
	function a_save()
	{
		if (isset($_POST["btSubmit"])) {
			$u = new Donneracces();
			$u->save($_POST);
			if ($_POST["don_id"] == 0)
				$_SESSION["message"][] = "Le nouvel enregistrement Donneracces a bien été créé.";
			else
				$_SESSION["message"][] = "L'enregistrement Donneracces a bien été mis à jour.";
		}
		header("location:" . hlien("donneracces"));
	}



	//param GET id 
	function a_delete()
	{
		if (isset($_GET["id"])) {
			$u = new Donneracces();
			$u->delete($_GET["id"]);
			$_SESSION["message"][] = "L'enregistrement Donneracces a bien été supprimé.";
		}
		header("location:" . hlien("donneracces"));
	}
}
