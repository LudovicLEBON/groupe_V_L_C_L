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
		$s = "<table class='table table-bordered'><thead><tr><th>Services</th><th>Quantités</th><th>Options</th></tr></thead>";
		//echo "<pre>" . print_r($row) . "</pre>";
		//echo "<pre>" . print_r($row) . "</pre>";
		foreach ($row as $tab) {
			extract($tab);


			$s = $s . "<tbody><tr><td><input type='hidden' name='$servAcc' id='$servAcc'   value='$tab[$pkserv]'><label for='$servAcc'>$tab[$label]</label>
			 </td><td><input type='number' name='$quantAcc' id='$quantAcc-$don_id' size='5' value='$tab[$label2]'>
			</td>
			<td><button class='btn submitServices btn-success' data-don_id='$don_id' data-don_res='$don_reservation' data-don_ser='$don_service' data-don_qtt='$quantAcc-$don_id'>Modifier</button>
			- <button class='btn deleteServices btn-danger' data-id='$don_id'>Suprimer</button></td>
			</tr>";
		}
		$s = $s . "</tbody>
			</table>";
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
		$s = "<table class='table table-bordered'>
				<thead>
					<tr>><th>Services</th>
						<th>Quantités</th>
						<th>Options</th>
					</tr>
				</thead>";
		foreach ($row as $tab) {
			print_r($tab[$pkserv]);
			extract($tab);
			if ($tab[$pkserv] == $servAcc)
				$sel = "";
			else
				$sel = "checked";

			$s = $s . "<tbody>
					<tr>
						<td>
						<input type='checkbox' name='$servAcc' id='$servAcc' $sel value='$tab[$pkserv]'><label for='$servAcc'>$tab[$label]</label></td>
						<td> <input type='number' name='$quantAcc' id='$quantAcc-$ser_id' size='5' value='$tab[$label2]'></td>
						<td>
						<button class='btn submitServices btn-warning' data-id=0 data-don_ser='$ser_id' data-don_quantite='$quantAcc-$ser_id'>Modifier</button>
						</td>
					</tr>";
		}
		$s = $s . "</tbody><table>";
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


	static public function selectAllServReser($res_id): array
	{
		$sql = "select * from donneracces,services 
where don_service=ser_id and don_reservation=:res_id 
order by ser_libelle";

		$stmt = Table::$link->prepare($sql);

		$stmt->bindValue(":res_id", $res_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	//les service non réservé dans une réservation
	static public function selectAllServNoReser($hotel, $res_id): array
	{
		$sql = "select * from services,prestation 
where pre_service=ser_id and pre_hotel=:hotel and ser_id not in 
(select don_service from donneracces
where don_reservation=:res_id) 
order by ser_libelle";

		$stmt = Table::$link->prepare($sql);
		$stmt->bindValue(":hotel", $hotel, PDO::PARAM_INT);
		$stmt->bindValue(":res_id", $res_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}
