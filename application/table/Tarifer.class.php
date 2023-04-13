<?php

/**
Classe créé par le générateur.
 */
class Tarifer extends Table
{
	const AXES_TABLEAU_TARIFS = [
		'D1' => 'tar_standing',
		'D2' => 'tar_categorie',
		'Y' => 'tar_prix'
	];

	public function __construct()
	{
		parent::__construct("tarifer", "tar_id");
	}

	public function selectAll(): array
	{
		$sql = "SELECT tar_prix, 
		(tar_standing-1) `tar_standing`,
		(tar_categorie-1) `tar_categorie`
		FROM tarifer";
		$result = self::$link->query($sql);
		return $result->fetchAll();
	}

	/**
	 * Affiche tous les tarifs en fonction du standing et de la catégorie
	 */
	public function selectTarifer(): array
	{
		$sql = "select * from tarifer, standing, categorie
		 where tar_standing=sta_id and tar_categorie= cat_id ";
		$result = self::$link->query($sql);
		return $result->fetchAll();
	}

	/**
	 * sélect le prix d'un tarif par rapport à une catégorie et un standing donnée
	 * @param integer $hotSta le standing de l'hotel
	 * @param integer $chaCat la catégorie de la chambre
	 */
	public function selectPrix(int $hotSta, $chaCat): array
	{
		$sql = 'SELECT tar_id,  tar_prix
		FROM tarifer
		WHERE tar_categorie = :chaCat
		AND tar_standing = :hotSta';
		$stmt = self::$link->prepare($sql);
		$stmt->bindValue(':hotSta', $hotSta);
		$stmt->bindValue(':chaCat', $chaCat);
		$stmt->execute();
		return $stmt->fetch();
	}
}
