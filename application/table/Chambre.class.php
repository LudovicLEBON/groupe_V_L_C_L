<?php

/**
Classe créé par le générateur.
 */
class Chambre extends Table
{
	public function __construct()
	{
		parent::__construct("chambre", "cha_id");
	}

	public function selectChambre(): array
	{
		$sql = "select * from chambre, categorie, hotel,tarifer, standing 
		 where cha_categorie=cat_id and cha_hotel=hot_id and tar_standing=sta_id and tar_categorie ";
		$result = self::$link->query($sql);
		return $result->fetchAll();
	}

	//fonction non usuelle, permet d'afficher moins de données pour ne pas faire buger chrome.
	public function selectShort(): array
	{
		$sql = "select * from chambre, categorie, hotel,tarifer, standing 
		 where cha_categorie=cat_id and cha_hotel=hot_id and tar_standing=sta_id
		  and tar_categorie and cha_statut='travaux' and hot_id=8  ";
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
	 * @param string $label3 nom du champ à afficher dans la balise OPTION
	 * @param integer $id valeur à préselectionner
	 */
	static public function HTMLoptionsChamb($sql, $pk, $label, $label2, $label3, $id)
	{
		$resultat = self::$link->query($sql);
		$s = "";
		foreach ($resultat as $tab) {
			if ($tab[$pk] == $id)
				$sel = " selected ";
			else
				$sel = "";

			$s = $s . "<option $sel value='$tab[$pk]'>$tab[$label] - $tab[$label2] - $tab[$label3]</option>";
		}
		return $s;
	}

	/**
	 * fonction qui retourne la catégorie d'une chmbre passer en paramètre
	 * 
	 *@param integer $cha_id l'id de la chambre 
	 */
	static public function selectCategorie($cha_id): array
	{
		$sql = "select cha_categorie from chambre where cha_id=:cha_id";
		$result = Table::$link->prepare($sql);
		$result->bindValue(":cha_id", $cha_id, PDO::PARAM_INT);
		$result->execute();
		return $result->fetch();
	}
}
