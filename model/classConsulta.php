<?php 
require_once '../model/classConexao.php';

class Consulta{
    private $pdo;

    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->conectar();
    }

public function consultar(){
    
    $retorna = array();
    $ler = $this-> pdo -> query("select  cpf, nome, telefone, endereco, codDepartamento, codCargo from funcionario");
    $retorna = $ler -> fetchAll(PDO::FETCH_ASSOC);
    return $retorna;
}}
?>