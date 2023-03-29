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
}
