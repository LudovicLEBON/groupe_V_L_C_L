<?php

/**
Classe créé par le générateur.
 */
class Hotel extends Table
{
	public function __construct()
	{
		parent::__construct("hotel", "hot_id");
	}
	public function selectHotel(): array
	{
		$sql = "select * from hotel,standing, prestation, services
		 where hot_standing=sta_id and pre_service=ser_id and pre_hotel=hot_id ";
		$result = self::$link->query($sql);
		return $result->fetchAll();
	}

	/**
	 * fonction générique pour générer les balises OPTION d'un SELECT
	 *
	 * @param string $sql requete sql
	 * @param string $pk nom du champ pk primaire
	 * @param string $label nom du champ à afficher dans la balise OPTION
	 * @param string $label2 nom du champ à afficher dans la balise OPTION
	 * @param integer $id valeur à préselectionner
	 */
	static public function HTMLoptionsHotel($sql, $pk, $label, $label2, $id)
	{
		$resultat = self::$link->query($sql);
		$s = "";
		foreach ($resultat as $tab) {
			if ($tab[$pk] == $id)
				$sel = " selected ";
			else
				$sel = "";

			$s = $s . "<option $sel value='$tab[$pk]'>$tab[$label] - $tab[$label2]</option>";
		}
		return $s;
	}
}
