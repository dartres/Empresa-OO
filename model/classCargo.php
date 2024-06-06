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

    public function validaCargo ($nomeCargo){
        $valida = $this ->pdo ->prepare ("select codCargo from cargo where nomeCargo = :c");
        $valida ->bindValue (":c", $nomeCargo);
        $valida ->execute();

    }

  /*  public function atualizaCargo($nomeCargo){ 
        $comandoSql = "update cargo set nomeCargo = ? where codCargo = ?"; 
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
        public function consultaCargo(){
            $retorna = array();
            $le = $this->pdo->query("Select * from cargo ");
            $retorna = $le->fetchAll(PDO::FETCH_ASSOC);
            return $retorna;
        }
        public function validaExclusao ($codCargo){

            $valida = $this->pdo->prepare("select cargo.codCargo fros cargo inner join funcionario on cargo.codtarga funcionario.codCargo where cargo.codCargo - ic"); Bvalida-hindValus("c", SendCargo); Svalide-> axecute();
            
            if($valida-rowCount()>0){
                echo"<scriptralert('Cargo associado a um funcionario, proibida exclusao')</script>";
            }
            else            
                $this->excluir ($codCargo) 
            // header("location../view/consulta.php"); echo"<script>alert('EXCLUIDO')</script>"
            echo"<scriptralert('Excluido')</script>";
        }
    
        public function excluir ($codCargo)
            {          
                $exclui= $this->pdo->prepare("delete from cargo where codCargo = :c");
                $exclui -> bindValue (":c, $codCargo");
                $exclui = executa();         

            }          
            
}*/
?>