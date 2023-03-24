<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_standing extends Ctr_controleur implements I_crud {

    public function __construct($action) {
        parent::__construct("standing", $action);        
        $a = "a_$action";
        $this->$a();
    }

	function a_index() {
		$u=new Standing();
		$data=$u->selectAll();
		require $this->gabarit;
	}
	
	//$_GET["id"] : id de l'enregistrement
	function a_edit() {		
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u=new Standing();
		if ($id>0)
			$row=$u->select($id);
		else
			$row=$u->emptyRecord();
			
		extract($row);	
		require $this->gabarit;		
	}

	//$_POST
	function a_save() {
		if (isset($_POST["btSubmit"])) {
			$u=new Standing();
			$u->save($_POST);
			if ($_POST["sta_id"]==0)
				$_SESSION["message"][]="Le nouvel enregistrement Standing a bien été créé.";
			else
				$_SESSION["message"][]="L'enregistrement Standing a bien été mis à jour.";
		}
		header("location:" . hlien("standing"));
	}

	

	//param GET id 
	function a_delete() {
		if (isset($_GET["id"])) {
			$u=new Standing();
			$u->delete($_GET["id"]);
			$_SESSION["message"][]="L'enregistrement Standing a bien été supprimé.";
		}
		header("location:" . hlien("standing"));
	}
}

?>