<?php

/**
Classe créé par le générateur.
 */
class Reservation extends Table
{
	public function __construct()
	{
		parent::__construct("reservation", "res_id");
	}

	public function selectReservation(): array
	{
		$sql = "select * from hotel,reservation,chambre, client, standing, categorie 
		 where res_hotel=hot_id and res_client=cli_id and res_chambre=cha_id and hot_standing=sta_id and cha_categorie=cat_id order by res_date_creation";
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

	/**
	 * fonction générique pour les réservations d'un client dont on rentre l'id
	 *
	 * @param integer $cli_id l'id du client à afficher les réservations
	 */
	static public function selectAllClient($cli_id): array
	{
		$sql = "select * from client,hotel,reservation,chambre,standing,categorie
		where cli_id=res_client and res_client=:id and res_hotel=hot_id and hot_standing=sta_id and res_chambre=cha_id and cha_categorie=cat_id order by res_date_debut_sejour";

		$stmt = Table::$link->prepare($sql);
		$stmt->bindValue(":id", $cli_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}


	/**
	 * fonction générique pour calculer le prix TTC d'une réservation
	 *
	 * @param integer $hot_id id d'un hotel
	 * @param integer $hot_standing le standing de l'hotel
	 * @param integer $cha_categorie la catégorie de la chambre
	 * @param integer $id l'id de la réservation correspondante
	 */
	static public function calculPrixTotal($hot_id, $hot_standing, $cha_categorie, $id): array
	{
		$sql = "
		select (prixUnit+tar_prix) res_prix_total from reservation,
			(select sum(don_quantite*nbjours*pre_prix) prixUnit from donneracces,prestation,
				(select (res_date_fin_sejour-res_date_debut_sejour) nbjours from reservation 
				where res_id=:id
				) duree 
			where don_service=pre_service and don_reservation=:id and pre_hotel=:hot_id 
			) prixTotalServices,
			(select tar_prix from tarifer 
			where tar_standing=:hot_standing and tar_categorie=:cha_categorie
			) prixTarifer 
		where res_id=:id 
		";
		$stmt = Table::$link->prepare($sql);
		$stmt->bindValue(":hot_id", $hot_id, PDO::PARAM_INT);
		$stmt->bindValue(":hot_standing", $hot_standing, PDO::PARAM_INT);
		$stmt->bindValue(":cha_categorie", $cha_categorie, PDO::PARAM_INT);
		$stmt->bindValue(":id", $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
/**
 * Requette que retoure les réservation du jour pour un hotel donnée
 * @param integer $hotel l'id de l'hotel à afficher
 */
	public function selectResDuJour($hotel):array
	{
		$date=date("Y-m-d");
		$sql="select * from reservation,chambre,hotel,client 
		where res_client=cli_id and res_hotel=hot_id and res_chambre=cha_id 
		and res_date_debut_sejour<=:date and res_date_fin_sejour>=:date and res_hotel=:hotel
		 order by res_date_fin_sejour";
		 $result=self::$link->prepare($sql);
		 $result->bindValue(":date",$date,PDO::PARAM_STR);
		 $result->bindValue(":hotel",$hotel,PDO::PARAM_STR);
		 $result->execute();
return $result->fetchAll()
	}
}
