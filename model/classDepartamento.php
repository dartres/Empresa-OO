<?php 
require_once '../model/classConexao.php';
Class Departamento
{
    private $pdo;

    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->conectar();
    }

    public function insereDepartamento ($nomeDepartamento){
        $insere = $this->pdo->prepare("insert into departamento (nomeDepartamento) values (:n)");
        $insere->bindValue(":n",$nomeDepartamento);
        $insere->execute();
    }
public function validaDepartamento($nomeDepartamento){
    $valida = $this->pdo->prepare("select codDepartamento from departamento where nomeDepartamento = :depto");
    $valida->bindValue(":depto", $nomeDepartamento);
    $valida -> execute();

    if ($valida->rowCount()>0){
        echo"<script>alert('Departamento já cadastrado, verifique duplicidade')</script>";
    }
    else {
        $this->insereDepartamento($nomeDepartamento);
        echo "<script>alert('Cadastrado o novo departamento com sucesso!')</script>";
    }
}
}
?>