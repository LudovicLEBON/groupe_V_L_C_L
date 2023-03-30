<?php

/**
Classe créé par le générateur.
 */
class Donneracces extends Table
{
	public function __construct()
	{
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
	static public function HTML_checkbox($sql, $pk, $label, $id, $label2, $id2)
	{
		$resultat = self::$link->query($sql);
		$s = "";
		foreach ($resultat as $tab) {
			if ($tab[$pk] == $id)
				$sel = " checked ";
			else
				$sel = "";

			$s = $s . "<input type='checkbox' name='$id' id='$id' $sel  value='$tab[$label]'><label for='$id'>$tab[$label]</label>
			 - <label for='$id2'>Quantité</label><input type='number' name='$id2' id='$id2' size='5' value='$tab[$label2]'>
			<button class='btn submitServices btn-warning'>Ajouter</button>
			<a class='btn btn-danger' href='hlien(\"donneracces\",\"delete\",\"id\",\"don_id\")'>Supprimer</a><br>";
		}
		return $s;
	}

	//faire une fonction selectAll pour les service lié à une réservation et un hotel donnée

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

	/*<form method="post" action="<?= hlien("donneracces", "save") ?>">
            <?=
            Donneracces::HTML_checkbox("select * from donneracces,services,reservation,hotel,prestation 
            where don_service=ser_id and don_reservation=res_id and res_hotel=hot_id and pre_hotel=hot_id and hot_id=" . $res_hotel . "
            and res_id=" . $res_id . " order by ser_libelle", "ser_id", "ser_libelle", 0, "don_quantite", "don_id");

            ?>
        </form>*/
	static public function selectAllServReser($res_hotel, $res_id): array
	{
		$sql = "select * from donneracces,services,reservation,hotel,prestation 
            where don_service=ser_id and don_reservation=res_id and res_hotel=hot_id and pre_hotel=hot_id and hot_id=:res_hotel
            and res_id=:res_id order by ser_libelle";

		$stmt = Table::$link->prepare($sql);
		$stmt->bindValue(":res_hotel", $res_hotel, PDO::PARAM_INT);
		$stmt->bindValue(":res_id", $res_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fachAll();
	}
}
