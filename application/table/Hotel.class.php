<?php

/**
Classe créé par le générateur.
 */
class Hotel extends Table
{
	public function __construct()
	{
		parent::__construct("hotel", "hot_id");
	}
	public function selectHotel(): array
	{
		$sql = "select * from hotel,standing, prestation, services
		 where hot_standing=sta_id and pre_service=ser_id and pre_hotel=hot_id ";
		$result = self::$link->query($sql);
		return $result->fetchAll();
	}
}
