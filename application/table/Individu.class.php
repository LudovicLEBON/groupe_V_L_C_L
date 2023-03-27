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
}
