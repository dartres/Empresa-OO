<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário</title>
    <link rel="stylesheet" href="../view/style.css">
</head>
<body>    
<header>
      
      <nav class="nav-header">
          <ul>
              <li><a href="../index.html">Home</a></li>
              <li>
                  <div class="dropdown">
                      <button onclick="myFunction()" class="dropbtn">Cargo</button>
                      <div id="myDropdown" class="dropdown-content">
                        <a href="../view/formCargo.php">Cadastro</a>
                        <a href="../view/alteracaoCargo.php">Alteração</a>
                        <a href="../view/exclusaoCargo.php">Exclusão</a>
                      </div>
                    </div>
                    </li>  
              <li><div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">Departamento</button>
                  <div id="myDropdown" class="dropdown-content">
                     <a href="../view/formDepartamento.php">Cadastro</a>
                    <a href="../view/alteracaoDepartamento.php">Alteração</a>
                    <a href="../view/exclusaoDepartamento.php">Exclusão</a>
                  </div>
                </div>
               </li>
              <li><div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">Funcionário</button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="../view/formFuncionario.php">Cadastro</a>
                    <a href="../view/alteracaoFuncionario.php">Alteração</a>
                    <a href="../view/exclusaoFuncionario.php">Exclusão</a>
                  </div>
                </div>
                </li>
                <li><div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">Consulta</button>
                  <div id="myDropdown" class="dropdown-content">
                     <a href="formDepartamento.html">Cargo</a>
                    <a href="#">Departamento</a>
                    <a href="#">Funcionário</a>
                  </div>
                </div>
               </li>
          </ul>
      </nav>
  </header>
 <center>
<?php

require_once '../model/classFuncionario.php';


$cpf = addslashes($_POST['txtCpf']);
$nome = addslashes($_POST['txtNomeFuncionario']);
$telefone = addslashes($_POST['txtTelefone']);
$endereco = addslashes($_POST['txtEndereco']);
$codDepartamento = addslashes($_POST['txtDepartamento']);
$codCargo = addslashes($_POST['txtCargo']);


$func = new Funcionario();
$func->validaFuncionario($cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo);

echo"<br><br>";
echo "<div class='FormCadastro'><h2>CADASTRO REALIZADO.</h2>";
?>
<main></main>
</center>   
    <footer>
            Brenda Caroline, Gisele Araújo, Kauany Oliveira.
    </footer>
</body>
</html>
