<?php

/**
Classe créé par le générateur.
 */
class Client extends Table
{
	public function __construct()
	{
		parent::__construct("client", "cli_id");
	}

	static public function estLoginUnique(string $cli_login): bool
	{
		$sql = "select * from client where cli_login=:cli_login";
		$statement = Table::$link->prepare($sql);
		$statement->bindValue(":cli_login", $cli_login, PDO::PARAM_STR);
		$statement->execute();
		return  !($statement->rowCount() > 0);
	}

	static public function selectByLogin(string $cli_login): bool|array
	{
		$sql = "select * from client where cli_login=:cli_login";
		$statement = Table::$link->prepare($sql);
		$statement->bindValue(":cli_login", $cli_login, PDO::PARAM_STR);
		$statement->execute();
		return  $statement->fetch();
	}

	//affiche toute les information d'un individu son profil et sont hôtel d'affectation
	static function selectAllProf(): array
	{
		$sql = "select * from client,profil where cli_profil=pro_id order by cli_login,pro_libelle";
		$result = self::$link->query($sql);
		return $result->fetchAll();
	}

	public function selectClientPerso($cli_id): array
	{
		$sql = "select * from client,reservation,chambre,hotel 
		 where cli_id=:id and  res_chambre=cha_id and hot_id=res_hotel and res_client=cli_id ";
		$result = self::$link->prepare($sql);
		$result->bindvalue(":id", $cli_id, PDO::PARAM_INT);
		$result->execute();
		return $result->fetchAll();
	}
}
