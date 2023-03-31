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
	 * @param string $pkserv nom du champ pk primaire
	 * @param string $label nom du champ à afficher dans la balise OPTION
	 * @param integer $servAcc valeur à préselectionner
	 * @param string $label2 nom du champ à afficher dans la balise OPTION
	 * @param integer $quantAcc valeur à préselectionner
	 */
	static public function HTML_checkboxModiierSup($row, $pkserv, $label, $servAcc, $label2, $quantAcc)
	{
		$s = "";

		echo "<pre>" . print_r($row) . "</pre>";
		foreach ($row as $tab) {
			if ($tab[$pkserv] == $servAcc)
				$sel = " checked ";
			else
				$sel = "";

			$s = $s . "<input type='checkbox' name='$servAcc' id='$servAcc' $sel  value='$tab[$pkserv]'><label for='$servAcc'>$tab[$label]</label>
			 - <label for='$quantAcc'>Quantité</label><input type='number' name='$quantAcc' id='$quantAcc' size='5' value='$tab[$label2]'>
			<button class='btn submitServices btn-success'>Modifier</button>
			<button class='btn delatServices btn-danger'>Suprimer</button>
			<br>";
		}
		return $s;
	}

	/**
	 * fonction générique pour générer les balises Checkbox et input d'un champ d'une table
	 *
	 * @param string $sql requete sql
	 * @param string $pkserv nom du champ pk primaire
	 * @param string $label nom du champ à afficher dans la balise OPTION
	 * @param integer $servAcc valeur à préselectionner
	 * @param string $label2 nom du champ à afficher dans la balise OPTION
	 * @param integer $quantAcc valeur à préselectionner
	 */
	static public function HTML_checkboxAjouter($row, $pkserv, $label, $servAcc, $label2, $quantAcc)
	{
		$s = "";
		foreach ($row as $tab) {
			if ($tab[$pkserv] == $servAcc)
				$sel = "";
			else
				$sel = "checked";

			$s = $s . "<input type='checkbox' name='$servAcc' id='$servAcc' $sel  value='$tab[$pkserv]'><label for='$servAcc'>$tab[$label]</label>
			 - <label for='$quantAcc'>Quantité</label><input type='number' name='$quantAcc' id='$quantAcc' size='5' value='$tab[$label2]'>
			<button class='btn submitServices btn-warning'>Modifier</button>
			
			<br>";
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
		return $stmt->fetchAll();
	}

	//les service non réservé dans une réservation
	static public function selectAllServNoReser($hotel, $res_id): array
	{
		$sql = "select * from services,prestation 
		where pre_service=ser_id and pre_hotel=:hotel and ser_id not in 
	   (select * from donneracces,prestation,services
	   where don_reservation=:res_id and don_service=ser_id and ser_id=pre_service and pre_hotel=:hotel) 
	   order by ser_libelle";

		$stmt = Table::$link->prepare($sql);
		$stmt->bindValue(":hotel", $hotel, PDO::PARAM_INT);
		$stmt->bindValue(":res_id", $res_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}
