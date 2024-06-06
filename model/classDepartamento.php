<?php 
require_once'../model/classConexao.php';
Class Departamento
{
    private $pdo;

    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->conectar();
    }

    public function insereDepartamento ($nomeDepartamento){
        $insere = $this->pdo->prepare("insere into departamento (nomeDepartamento) values (:n)");
        $insere->bindValue(":n",$nomeDepartamento);
        $insere->execute();
    }
}
?>