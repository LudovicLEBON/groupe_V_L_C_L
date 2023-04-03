<?php
/**
Classe créé par le générateur.
*/
class Reservation extends Table {
	public function __construct() {
		parent::__construct("reservation", "res_id");
	}
	public function selectReservation(): array
	{
		$sql = "select * from hotel,reservation,chambre, client 
		 where res_hotel=hot_id and res_client=cli_id and res_chambre=cha_id";
		$result = self::$link->query($sql);
		return $result->fetchAll();
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

	static public function selectAllClient($cli_id): array
	{
		$sql = "select * from client,hotel,reservation
		wher cli_id=:id and cli_id=res_client and res_hotel=hot_id order by res_date_debut_sejour";

		$stmt = Table::$link->prepare($sql);
		$stmt->bindValue(":id", $cli_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}


}
