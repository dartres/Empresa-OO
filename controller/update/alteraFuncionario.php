<?php
require_once '../../model/classFuncionario.php';

class alteraFuncionario {
    private $model;

    public function __construct() {
        $this->model = new Funcionario();
    }

    public function getFuncionario($funcional, $cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo) {
        return $this->model->getFuncionario($funcional, $cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo);
    }
    public function alterarFuncionario($funcional, $cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo) {
        return $this->model->alterarFuncionario($funcional, $cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo);
    }

    public function consultarCargo() {
        return $this->model->consultarCargo();
    }

    public function consultarDepartamento() {
        return $this->model->consultarDepartamento();
    }

}

$controller = new alteraFuncionario();


$funcional = isset($_GET['funcional']) ? $_GET['funcional'] : null;
$cpf = isset($_GET['cpf']) ? $_GET['cpf'] : null;
$nome = isset($_GET['nome']) ? $_GET['nome'] : null;
$telefone = isset($_GET['telefone']) ? $_GET['telefone'] : null;
$endereco = isset($_GET['endereco']) ? $_GET['endereco'] : null;
$codDepartamento = isset($_GET['codDepartamento']) ? $_GET['codDepartamento'] : null;
$codCargo = isset($_GET['codCargo']) ? $_GET['codCargo'] : null;

if ($funcional && $cpf && $nome && $telefone && $endereco && $codDepartamento && $codCargo) {
    $funcionario = $controller->getFuncionario($funcional, $cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo);
}


if (isset($_POST['update_funcionario'])) {
    $funcional = $_POST['funcional'];
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $codDepartamento = $_POST['codDepartamento'];
    $codCargo = $_POST['codCargo'];
    $controller->alterarFuncionario($funcional, $cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo);
    if ($controller->alterarFuncionario($funcional, $cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo)) {
        echo '<div class="alert alert-success" role="alert">Funcionário atualizado com sucesso!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao atualizar funcionário.</div>';
    }
    header('Location: ../../view/read/consultaFuncionario.php');

}