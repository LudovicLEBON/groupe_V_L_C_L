<?php

/**
Classe créé par le générateur.
 */
class Categorie extends Table
{
	public function __construct()
	{
		parent::__construct("categorie", "cat_id");
	}

	public function selectAll(): array
	{
		$sql = 'SELECT cat_libelle from categorie';
		$resultats = self::$link->query($sql);
		$chcCats = [];

		while ($nomCat = $resultats->fetchColumn()) {
			$chcCats[] = $nomCat;
		}

		return $chcCats;
	}

	//conpte le nombre catégorie 
	public function countCat()
	{
		$sql = "SELECT COUNT(DISTINCT cat_libelle) `nb_cat` FROM categorie";
		$result = self::$link->query($sql);
		return $result->fetch()['nb_cat'];
	}
}
