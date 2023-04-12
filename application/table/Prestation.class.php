<?php
/**
Classe créé par le générateur.
*/
class Prestation extends Table {
	public function __construct() {
		parent::__construct("prestation", "pre_id");
	}
	static public function HTMLli($sql, $pk, $label, $id)
	{
		$resultat = self::$link->query($sql);
		$s = "";
		foreach ($resultat as $tab) {
			if ($tab[$pk] == $id)
				$sel = " selected ";
			else
				$sel = "";

			$s = $s . "<li $sel value='$tab[$pk]'>$tab[$label]</li>";
		}
		return $s;
	}


	public function selectPrestation(): array
	{
		$sql = "select * from prestation, services, hotel 
		 where pre_service=ser_id and pre_hotel=hot_id ";
		$result = self::$link->query($sql);
		return $result->fetchAll();
	}




	public function selectNoSerHotel($hot_id): array
	{
		$sql = "select * from prestation  
		 where  pre_service not in (select * from prestation where pre_hotel=:id) ";
		$result = self::$link->prepare($sql);
		$result->bindvalue(":id", $hot_id, PDO::PARAM_INT);
		$result->execute();
		return $result->fetchAll();
	}


	
}
?>
