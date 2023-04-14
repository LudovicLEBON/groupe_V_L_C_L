<?php

/**
Classe créé par le générateur.
 */
class Individu extends Table
{
	public function __construct()
	{
		parent::__construct("individu", "ind_id");
	}

	static public function estLoginUnique(string $ind_login): bool
	{
		$sql = "select * from individu where ind_login=:ind_login";
		$statement = Table::$link->prepare($sql);
		$statement->bindValue(":ind_login", $ind_login, PDO::PARAM_STR);
		$statement->execute();
		return  !($statement->rowCount() > 0);
	}

	static public function selectByLogin(string $ind_login): bool|array
	{
		$sql = "select * from individu where ind_login=:ind_login";
		$statement = Table::$link->prepare($sql);
		$statement->bindValue(":ind_login", $ind_login, PDO::PARAM_STR);
		$statement->execute();
		return  $statement->fetch();
	}

	//affiche toute les information d'un individu son profil et sont hôtel d'affectation
	static function selectAllProfHot(): array
	{
		$sql = "select * from individu,hotel,profil where ind_hotel=hot_id and ind_profil=pro_id order by ind_login,pro_libelle";
		$result = self::$link->query($sql);
		return $result->fetchAll();
	}


	public function selectResDuJour($hotel): array
	{
		$date = date("Y-m-d");
		$sql = "select * from reservation,chambre,hotel,client, individu  
		where res_client=cli_id and res_hotel=hot_id and res_chambre=cha_id 
		and res_date_debut_sejour<=:date and res_date_fin_sejour>=:date and res_hotel=:hotel
		 order by res_date_fin_sejour";
		$result = self::$link->prepare($sql);
		$result->bindValue(":date", $date, PDO::PARAM_STR);
		$result->bindValue(":hotel", $hotel, PDO::PARAM_STR);
		$result->execute();
		return $result->fetchAll();
	}
}
