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

	
}
?>
