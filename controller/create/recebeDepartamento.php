<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamento</title>
    <link rel="stylesheet" href="../../view/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
     crossorigin="anonymous"></script>
</head>
<body>
<header>
  <nav class="nav-header">
          <ul>
              <li><a href="../../index.html">Home</a></li>
              <li>
                  <div class="dropdown">
                      <button onclick="myFunction()" class="dropbtn">Cadastro</button>
                      <div id="myDropdown" class="dropdown-content">
                        <a href="../../view/create/formCargo.php">Cargo</a>
                        <a href="../../view/create/formDepartamento.php">Departamento</a>
                        <a href="../../view/create/formFuncionario.php">Funcionário</a>
                      </div>
                    </div>
                    </li>  
                <li><div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">Consulta</button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="../../view/read/consultaCargo.php">Cargo</a>
                    <a href="../../view/read/consultaDepartamento.php">Departamento</a>
                    <a href="../../view/read/consultaFuncionario.php">Funcionário</a>
                  </div>
                </div>
                </li>
          </ul>
      </nav>
  </header>
 <center>
<?php
require_once '../../model/classDepartamento.php';


$nomeDepartamento = addslashes($_POST['txtNomeDepartamento']);

$departamento = new Departamento();
$departamento->validaDepartamento($nomeDepartamento);
header('Location: ../../view/read/consultaDepartamento.php');
?>
<main>
<a href="../../view/create/formDepartamento.php" class="btn btn-secondary mt-3">Voltar</a>
</main>
</center>   
    <footer>
            Brenda Caroline, Gisele Araújo, Kauany Oliveira.
    </footer>
</body>
</html>