<?php
require_once '../../model/classFuncionario.php';

class excluiFuncionario {
    private $model;

    public function __construct() {
        $this->model = new Funcionario();
    }

public function excluirFuncionario($funcional) {
        return $this->model->excluirFuncionario($funcional);
    }
}

$excluir = new excluiFuncionario();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_funcionario'])) {
    $funcional = $_POST['funcional'];
    $excluir->excluirFuncionario($funcional);
    header('Location: ../../view/read/consultaFuncionario.php');
}

?>