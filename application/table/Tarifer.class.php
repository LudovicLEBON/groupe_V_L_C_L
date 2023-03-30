<?php
/**
Classe créé par le générateur.
*/
class Tarifer extends Table {
	public function __construct() {
		parent::__construct("tarifer", "tar_id");
	}
	public function selectTarifer(): array
	{
		$sql = "select * from tarifer, standing, categorie
		 where tar_standing=sta_id and tar_categorie= cat_id ";
		$result = self::$link->query($sql);
		return $result->fetchAll();
	}



}
?>
