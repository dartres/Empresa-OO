<?php 
require_once 'classConexao.php';
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

    public function validaCargo($nomeCargo){
        $valida = $this->pdo->prepare("select codCargo from cargo where nomeCargo = :c");
        $valida->bindValue(":c", $nomeCargo);
        $valida -> execute();

        if ($valida->rowCount()>0){
            echo"<script>alert('DCargo já cadastrado, verifique duplicidade')</script>";
        }
        else {
            $this->insereCargo($nomeCargo);
            echo "<script>alert('Cadastrado o novo cargo com sucesso!')</script>";
        }
    }

    public function alterarCargo($codCargo, $nomeCargo){ 
        $comandoSql = "UPDATE cargo SET nomeCargo = :nomeCargo WHERE codCargo = :codCargo"; 
        $exec = $this->pdo->prepare($comandoSql); 
        $exec->bindValue(":nomeCargo", $nomeCargo);
        $exec->bindValue(":codCargo", $codCargo);
        return $exec->execute(); 
        } 
        
        public function excluirCargo($codCargo){ 
            $comandosql = $this->pdo->prepare("DELETE FROM cargo WHERE codCargo = :codCargo");
            $comandosql->bindParam(':codCargo', $codCargo);
            return $comandosql->execute();
        } 

        public function validaExclusaoCargo($codCargo){
            $valida = $this->pdo->prepare("SELECT funcionario.codCargo from cargo 
            inner join funcionario on cargo.codCargo = funcionario.codCargo 
            where cargo.codCargo = :cod");
            $valida->bindValue(":cod", $codCargo);
            $valida -> execute();
    
            if ($valida->rowCount()>0){
                echo"<script>alert('Cargo associado a outra tabela, verificar relação')</script>";
                echo "<script>window.history.go(-1);</script>";
            }
            else {
                $this->excluirCargo($codCargo);
                echo"<script>alert('Cargo excluído com sucesso!')</script>";
                echo "<script>window.location.href = '../../view/read/consultaCargo.php';</script>";
            }
        }

        public function consultarCargo() {
            $consulta = $this->pdo->query("SELECT * FROM cargo");
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getCargo($codCargo) {
            $query = $this->pdo->prepare("SELECT * FROM cargo WHERE codCargo = :id");
            $query->bindParam(':id', $codCargo);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }
}
?>