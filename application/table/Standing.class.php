<?php

/**
Classe créé par le générateur.
 */
class Standing extends Table
{
	public function __construct()
	{
		parent::__construct("standing", "sta_id");
	}

	public function selectAll(): array
	{
		$sql = 'SELECT sta_libelle from standing';
		$resultats = self::$link->query($sql);
		$hocCats = [];

		while ($nomCat = $resultats->fetchColumn()) {
			$hocCats[] = $nomCat;
		}

		return $hocCats;
	}

	//conpte le nombre standing 
	public function countSta()
	{
		$sql = "SELECT COUNT(DISTINCT sta_libelle) `nb_sta` FROM standing";
		$result = self::$link->query($sql);
		return $result->fetch()['nb_sta'];
	}
}
