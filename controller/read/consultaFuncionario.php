<?php
require_once '../../model/classFuncionario.php';

class consultaFuncionario {
    private $model;

    public function __construct() {
        $this->model = new funcionario();
    }

    public function consultarFuncionarios() {
        return $this->model->consultarFuncionarios();
    }

    public function excluirFuncionario($funcional) {
        return $this->model->excluirFuncionario($funcional);
    }
}

$controller = new consultaFuncionario();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_funcionario'])) {
    $funcional = $_POST['funcional'];
    $controller->excluirFuncionario($funcional);
    header('Location: ../../view/read/consultaFuncionario.php');
}
?>
