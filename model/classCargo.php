<?php 
require_once '../model/classConexao.php';
Class Cargo
{
    private $pdo;

    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->conectar();
    }

    public function insereCargo ($nomeCargo){
        $insere = $this->pdo->prepare("insert into cargo (nomeCargo) values (:n)");
        $insere->bindValue(":n",$nomeCargo);
        $insere->execute();
    }

    public function atualizaCargo($nomeCargo){ 
        $comandoSql = "update cargo set nomeCargo = ?
       where codCargo = ?"; 
        $valores = array($this->$nomeCargo); 
        $exec = $this->pdo->prepare($comandoSql); 
        $exec->execute($valores); 
        } 
        
        public function excluiCargo($codigo){ 
        $comandoSql = "delete from cargo where codCargo = ?"; 
        $valores = array($this->$codigo); 
        $exec = $this->pdo->prepare($comandoSql); 
        $exec->execute($valores); 
        } 
}
?>