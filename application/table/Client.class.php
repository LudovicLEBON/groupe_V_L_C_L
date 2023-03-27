<?php
/**
Classe créé par le générateur.
*/
class Client extends Table {
	public function __construct() {
		parent::__construct("client", "cli_id");
	}

	static public function estLoginUnique(string $cli_login) : bool {
		$sql="select * from client where cli_login=:cli_login";
		$statement=Table::$link->prepare($sql);
		$statement->bindValue(":cli_login",$cli_login,PDO::PARAM_STR);
		$statement->execute();
		return  !($statement->rowCount()>0);			
	}

	static public function selectByLogin(string $cli_login) : bool|array {
		$sql="select * from client where cli_login=:cli_login";
		$statement=Table::$link->prepare($sql);
		$statement->bindValue(":cli_login",$cli_login,PDO::PARAM_STR);
		$statement->execute();
		return  $statement->fetch();
	}
}
