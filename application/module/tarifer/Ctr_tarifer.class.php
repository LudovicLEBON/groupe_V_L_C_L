<?php

/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
 */
class Ctr_tarifer extends Ctr_controleur implements I_crud
{

	public function __construct($action)
	{
		parent::__construct("tarifer", $action);
		$a = "a_$action";
		$this->$a();
	}

	function a_index()
	{
		$tar = new Tarifer();
		$sta = new Standing();
		$cat = new Categorie();

		$arrayTarifs = $tar->selectAll();

		$chCategorie = $cat->selectAll();
		$hoStanding = $sta->selectAll();

		$dimArrayTarifs = [
			'D1' => $sta->countSta(),
			'D2' => $cat->countCat()
		];

		$grilleTarifaire = matriceSqlCD(
			$dimArrayTarifs,
			$tar::AXES_TABLEAU_TARIFS,
			$arrayTarifs
		);

		require $this->gabarit;
	}

	function a_indexAdmin()
	{
		$tar = new Tarifer();
		$sta = new Standing();
		$cat = new Categorie();

		$arrayTarifs = $tar->selectAll();

		$chCategorie = $cat->selectAll();
		$hoStanding = $sta->selectAll();

		$dimArrayTarifs = [
			'D1' => $sta->countSta(),
			'D2' => $cat->countCat()
		];

		$grilleTarifaire = matriceSqlCD(
			$dimArrayTarifs,
			$tar::AXES_TABLEAU_TARIFS,
			$arrayTarifs
		);

		require $this->gabarit;
	}

	function a_indexModerator()
	{
		$tar = new Tarifer();
		$sta = new Standing();
		$cat = new Categorie();

		$arrayTarifs = $tar->selectAll();

		$chCategorie = $cat->selectAll();
		$hoStanding = $sta->selectAll();

		$dimArrayTarifs = [
			'D1' => $sta->countSta(),
			'D2' => $cat->countCat()
		];

		$grilleTarifaire = matriceSqlCD(
			$dimArrayTarifs,
			$tar::AXES_TABLEAU_TARIFS,
			$arrayTarifs
		);

		require $this->gabarit;
	}

	/* 
	* Traitement de la modification de la grille tarifaire
	* Reçoit un appel AJAX de modification
	*/
	function a_ajax()
	{
		$tarif = new Tarifer();

		// Vérifier si l'utilsiateur est administrateur

		$reponseJSON = file_get_contents('php://input');
		$reponseArray = array_map('trim', json_decode($reponseJSON, true));

		$infosPrix = $tarif->selectPrix(
			$reponseArray['tar_standing'],
			$reponseArray['tar_categorie']
		);

		$infosPrix['tar_prix'] = $reponseArray['tar_prix'];
		$tarif->save($infosPrix);
	}

	//$_GET["id"] : id de l'enregistrement
	function a_edit()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u = new Tarifer();
		if ($id > 0)
			$row = $u->select($id);
		else
			$row = $u->emptyRecord();

		extract($row);
		require $this->gabarit;
	}

	// Pas de fonction de sauvegarde des tarifs
	function a_save()
	{
		header("location:" . hlien("tarifer"));
	}

	//$_POST
	function a_saves()
	{
		if (isset($_POST["btSubmit"])) {
			$u = new Tarifer();
			$u->save($_POST);
			if ($_POST["tar_id"] == 0)
				$_SESSION["message"][] = "Le nouvel enregistrement Tarifer a bien été créé.";
			else
				$_SESSION["message"][] = "L'enregistrement Tarifer a bien été mis à jour.";
		}
		header("location:" . hlien("tarifer"));
	}



	//param GET id 
	function a_delete()
	{
		if (isset($_GET["id"])) {
			$u = new Tarifer();
			$u->delete($_GET["id"]);
			$_SESSION["message"][] = "L'enregistrement Tarifer a bien été supprimé.";
		}
		header("location:" . hlien("tarifer"));
	}
}
