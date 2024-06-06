<?php
require_once '../../model/classDepartamento.php';

class excluiDepartamento {
    private $model;

    public function __construct() {
        $this->model = new departamento();
    }

public function excluirDepartamento($codDepartamento) {
        return $this->model->excluirDepartamento($codDepartamento);
    }
}

$excluir = new excluiDepartamento();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_departamento'])) {
    $codDepartamento = $_POST['codDepartamento'];
    if ($excluir->excluirDepartamento(false)) {
        echo '<script>alert("Não é possível excluir o departamento porque está relacionado a outras tabelas.");</script>';
        
    } else {
        header('Location: ../../view/read/consultaDepartamento.php');
        exit;
    }
}

?>