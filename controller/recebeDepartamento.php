<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamento</title>
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
                        <a href="formCargo.php">Cadastro</a>
                      </div>
                    </div>
                    </li>  
              <li><div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">Departamento</button>
                  <div id="myDropdown" class="dropdown-content">
                     <a href="../view/formDepartamento.php">Cadastro</a>
                  </div>
                </div>
               </li>
              <li><div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">Funcionário</button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="../view/formFuncionario.php">Cadastro</a>
                  </div>
                </div>
                </li>
                <li><div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">Consulta</button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="../view/consulta.php">Departamento e
                Cargo</a>
                <a href="../view/consultaFuncionario.php">Funcionário</a>
                  </div>
                </div>
                </li>
          </ul>
      </nav>
  </header>
 <center>
<?php
require_once'../model/classDepartamento.php';


$nomeDepartamento = addslashes($_POST['txtNomeDepartamento']);

$departamento = new Departamento();
$departamento->validaDepartamento($nomeDepartamento);
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