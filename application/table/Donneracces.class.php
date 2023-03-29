<?php
/**
Classe créé par le générateur.
*/
class Donneracces extends Table {
	public function __construct() {
		parent::__construct("donneracces", "don_id");
	}

	static public function HTML_liQtt($sql, $pk, $label, $id)
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

	static public function HTML_li_services($sql, $pk, $label, $id)
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

	/**
	 * fonction générique pour générer les balises Checkbox et input d'un champ d'une table
	 *
	 * @param string $sql requete sql
	 * @param string $pk nom du champ pk primaire
	 * @param string $label nom du champ à afficher dans la balise OPTION
	 * @param integer $id valeur à préselectionner
	 * @param string $label2 nom du champ à afficher dans la balise OPTION
	 * @param integer $id2 valeur à préselectionner
	 */
	static public function HTML_checkbox($sql, $pk, $label, $id,$label2,$id2)
	{
		$resultat = self::$link->query($sql);
		$s = "";
		foreach ($resultat as $tab) {
			if ($tab[$pk] == $id)
				$sel = " checked ";
			else
				$sel = "";

			$s = $s . "<input type='checkbox' name='$id' id='$id' $sel class='form-control' value='$tab[$pk]'><label for='$id'>$label</label><br><label for='$id2'>$label2</label><input type='number' name='$id2' id='$id2' class='form-control' value='$tab[$label2]'>";
		}
		return $s;
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
