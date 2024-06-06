<?php
require_once '../../model/classCargo.php';

class alteraCargo {
    private $model;

    public function __construct() {
        $this->model = new Cargo();
    }

    public function getCargo($codCargo) {
        return $this->model->getCargo($codCargo);
    }
    public function alterarCargo($codCargo, $nomeCargo) {
        return $this->model->alterarCargo($codCargo, $nomeCargo);
    }

}

$controller = new alteraCargo();

if (isset($_GET['id'])) {
    $codCargo = $_GET['id'];
    $cargo = $controller->getCargo($codCargo);
}

if (isset($_POST['update_cargo'])) {
    $codCargo = $_POST['codCargo'];
    $nomeCargo = $_POST['nomeCargo'];
    $controller->alterarCargo($codCargo, $nomeCargo);
    if ($controller->alterarCargo($codCargo, $nomeCargo)) {
        echo '<div class="alert alert-success" role="alert">Cargo atualizado com sucesso!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao atualizar Cargo.</div>';
    }
    header('Location: ../../view/read/consultaCargo.php');
}

?>