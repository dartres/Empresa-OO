<?php 
require_once'../model/classConexao.php';
Class Cargo
{
    private $pdo;

    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->conectar();
    }

    public function insereCargo ($nomeCargo){
        $insere = $this->pdo->prepare("insere into cargo (nomeCargo) values (:n)");
        $insere->bindValue(":n",$nomeCargo);
        $insere->execute();
    }
}
?>