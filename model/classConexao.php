<?php 

Class Conexao {
    private $pdo;
    
    private $host = "localhost";
    private $dbname = "empresa0702";
    private $user = "root";
    private $senha = "";

    public function conectar()
    {     
        try{
            $this->pdo = new PDO("mysql:dbname=".$this->dbname.";host=".$this->host,$this->user, $this->senha);
        echo "Conexão Realizada ;)";
        }
        catch(PDOException $e){
            echo"Erro com parâmetro no banco de dados! :("      .$e->getMessage();
            exit();
        }
        catch (Exception $e){
            echo"Erro Não passou da conexão: ".$e->getMessage();
            exit();
        }
        return $this->pdo;
    }
}
?>