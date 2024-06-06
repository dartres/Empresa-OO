<?php
require_once '../../model/classCargo.php';

class consultaCargo {
    private $model;

    public function __construct() {
        $this->model = new cargo();
    }

    public function consultarCargo() {
        return $this->model->consultarCargo();
    }

    public function excluirCargo($codCargo) {
        return $this->model->excluirCargo($codCargo);
    }
}

$controller = new consultaCargo();


?>