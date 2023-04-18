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
		$sql = "select * from hotel,standing
		 where hot_standing=sta_id order by hot_id  ";
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

			$s = $s . "<option $sel value='$tab[$pk]'>$tab[$label] - Hôtel $tab[$label2]</option>";
		}
		return $s;
	}

	/**
	 * fonction qui retourne le standing d'un hôtel passer en paramètre
	 * 
	 *@param integer $hot_id l'id de la chambre 
	 */
	static public function selectStanding($hot_id): array
	{
		$sql = "select hot_standing from hotel where hot_id=:hot_id";
		$result = Table::$link->prepare($sql);
		$result->bindValue(":hot_id", $hot_id, PDO::PARAM_INT);
		$result->execute();
		return $result->fetch();
	}

	/**
	 * donne le CA d'un hotel donné
	 */
	public function selectCA($hotel)
	{
		$sql = "select * from CAHOTELIER where hot_id=:hotel";
		$result = self::$link->prepare($sql);
		$result->bindValue(":hotel", $hotel, PDO::PARAM_INT);
		$result->execute();
		return $result->fetchAll();
	}

	public function selectCAHotelAll()
	{
		$sql = "select * from CAHOTELIER ";
		$result = self::$link->query($sql);

		return $result->fetchAll();
	}

	public function selectCAserv($hotel)
	{
		$sql = "select * from CASERHOTEL where hot_id=:hotel";
		$result = self::$link->prepare($sql);
		$result->bindValue(":hotel", $hotel, PDO::PARAM_INT);
		$result->execute();
		return $result->fetchAll();
	}

	public function selectCAservAll()
	{
		$sql = "select * from CASERHOTEL";
		$result = self::$link->query($sql);

		return $result->fetchAll();
	}

	public function selectCATTC($hotel)
	{
		$sql = "select * from CATTCHOTEL where hot_id=:hotel";
		$result = self::$link->prepare($sql);
		$result->bindValue(":hotel", $hotel, PDO::PARAM_INT);
		$result->execute();
		return $result->fetchAll();
	}

	public function selectCATTCAll()
	{
		$sql = "select * from CATTCHOTEL ";
		$result = self::$link->query($sql);

		return $result->fetchAll();
	}

	public function selectCAgroupe()
	{
		$sql = "select * from CAGROUP";
		$result = self::$link->query($sql);


		return $result->fetchAll();
	}

	public function selectCAMax()
	{
		$sql = "select * from MAXCA ";
		$result = self::$link->query($sql);

		return $result->fetchAll();
	}
}
