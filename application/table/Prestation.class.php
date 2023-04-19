<?php
/**
Classe créé par le générateur.
*/
class Prestation extends Table {
	public function __construct() {
		parent::__construct("prestation", "pre_id");
	}
	/**
	 * fonction que permet de créer une lise des prestation associées à un hotel
	 * @param string $sql la requette sql à exécuter
	 * @param integer $pk l'id du champ à afficher
	 * @param string $label le champ à afficher
	 * @param integer $id le champ de la clé étangère qui reçoie la valeur
	 */
	static public function HTMLli($sql, $pk, $label, $id)
	{
		$resultat = self::$link->query($sql);
		$s = "";
		foreach ($resultat as $tab) {
			if ($tab[$pk] == $id)
				$sel = " selected ";
			else
				$sel = "";

			$s = $s . "<li $sel value='$tab[$pk]'>$tab[$label]</li>";
		}
		return $s;
	}

//affiche les prestations
	public function selectPrestation(): array
	{
		$sql = "select * from prestation, services, hotel 
		 where pre_service=ser_id and pre_hotel=hot_id ";
		$result = self::$link->query($sql);
		return $result->fetchAll();
	}




	public function selectNoSerHotel($hot_id): array
	{
		$sql = "select * from prestation  
		 where  pre_service not in (select * from prestation where pre_hotel=:id) ";
		$result = self::$link->prepare($sql);
		$result->bindvalue(":id", $hot_id, PDO::PARAM_INT);
		$result->execute();
		return $result->fetchAll();
	}


	
}
