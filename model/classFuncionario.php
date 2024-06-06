<?php 
require_once '../model/classConexao.php';
Class Funcionario
{
    private $pdo;

    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->conectar();
    }

    public function insereFuncionario ($cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo){
        $insere = $this->pdo->prepare("insert into funcionario ( cpf, nome, telefone, endereco, codDepartamento, codCargo) 
        values (:c,:n,:t,:e,:co,:coc)");

        $insere->bindValue(":c",$cpf);
        $insere->bindValue(":n",$nome);        
        $insere->bindValue(":t",$telefone);
        $insere->bindValue(":e",$endereco);
        $insere->bindValue(":co",$codDepartamento);
        $insere->bindValue(":coc",$codCargo);
        $insere->execute();
    }
    public function validaFuncionario($cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo){
        $valida = $this->pdo->prepare("select cpf from funcionario where cpf = :cpf");
        $valida->bindValue(":cpf", $cpf);
        $valida -> execute();
    
        if ($valida->rowCount()>0){
            echo"<script>alert('Funcionario já cadastrado, verifique duplicidade')</script>";
        }
        else {
            $this->insereFuncionario($cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo);
            echo "<script>alert('Cadastrado o novo Funcionario com sucesso!')</script>";
        }
    }
    public function consultaCargo(){
        $retorna = array();
        $le = $this->pdo->query("select codCargo, nomeCargo from cargo order by nomeCargo");
        $retorna = $le-> fetchAll(PDO::FETCH_ASSOC);
        return $retorna;
    }
    public function consultaDepartamento(){
        $retorna= array();
        $le = $this->pdo->query("select codDepartamento, nomeDepartamento from departamento order by nomeDepartamento");
        $retorna = $le-> fetchAll(PDO::FETCH_ASSOC);
        return $retorna;
    }
}
?>