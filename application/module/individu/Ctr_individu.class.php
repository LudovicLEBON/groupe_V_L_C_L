<?php

/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
 */
class Ctr_individu extends Ctr_controleur implements I_crud
{

	public function __construct($action)
	{
		parent::__construct("individu", $action);
		$a = "a_$action";
		$this->$a();
	}

	function a_index()
	{
		$u = new Individu();
		$data = $u->selectAllProfHot();
		require $this->gabarit;
	}
	function a_indexPerso()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u = new Individu();
		$data = $u->selectResDuJour($id);
		require $this->gabarit;
	}


	//edition d'un individu
	//$_GET["id"] : id de l'enregistrement
	function a_edit()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u = new Individu();
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
			$u = new Individu();
			$u->save($_POST);
			if ($_POST["ind_id"] == 0)
				$_SESSION["message"][] = "Le nouvel enregistrement Individu a bien été créé.";
			else
				$_SESSION["message"][] = "L'enregistrement Individu a bien été mis à jour.";
		}
		header("location:" . hlien("individu"));
	}



	//param GET id 
	function a_delete()
	{
		if (isset($_GET["id"])) {
			$u = new Individu();
			$u->delete($_GET["id"]);
			$_SESSION["message"][] = "L'enregistrement Individu a bien été supprimé.";
		}
		header("location:" . hlien("individu"));
	}
}
