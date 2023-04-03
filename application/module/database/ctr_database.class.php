<?php
class Ctr_database extends Ctr_controleur
{

    public function __construct($action)
    {
        parent::__construct("database", $action);
        $a = "a_$action";
        $this->$a();
    }

    public function a_creer()
    {
        $sql = Database::creer("../document/script_vivehotel_vincent.sql");
        require $this->gabarit;
    }

    public function a_dataset()
    {
        $message = Database::datasetVivehotel();
        require $this->gabarit;
    }
}
