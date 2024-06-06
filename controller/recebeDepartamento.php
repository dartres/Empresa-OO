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
              <li><a href="../view/formCargo.html">Cargo</a></li>
              <li><a href="../view/formDepartamento.html">Departamento</a></li>
              <li><a href="../view/formFuncionario.html">Funcionário</a></li>
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