<?php
require_once '../../model/classCargo.php';

class excluiCargo {
    private $model;

    public function __construct() {
        $this->model = new Cargo();
    }

public function excluirCargo($codCargo) {
        return $this->model->excluirCargo($codCargo);
    }
}

$excluir = new excluiCargo();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_cargo'])) {
    $codCargo = $_POST['codCargo'];
    $excluir->excluirCargo($codCargo);
    header('Location: ../../view/read/consultaCargo.php');
    }

?>