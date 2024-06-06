<!DOCTYPE html>
<php include_once("../controller/consulta.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
     crossorigin="anonymous"></script>
     <link rel="stylesheet" href="style.css">
     <style>
        table {
            border: 1px solid black; 
            border-collapse: collapse; 
        }
        th, td {
            border: 1px solid black; 
            padding: 8px;
            text-align: left;
        }
        .container{
          display: grid;
          grid-template-columns: repeat(2, 1fr);
          grid-gap: 100px
        }
    </style>

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
                     <a href="formDepartamento.php">Cadastro</a>
                  </div>
                </div>
               </li>
              <li><div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">Funcionário</button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="formFuncionario.php">Cadastro</a>
                  </div>
                </div>
                </li>
                <li><div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">Consulta</button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="Consulta.php">Departamento e
                Cargo</a>
                <a href="consultaFuncionario.php">Funcionário</a>
                  </div>
                </div>
                </li>
          </ul>
      </nav>
  </header>
  <main>
  <center>
<div>
    <h2>Funcionário</h2>
    <table style=" border:1px solid black ">
        <tr>
            <th>Funcional</th>
            <th>Cpf</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Cod Departamento</th>
            <th>Cod Cargo</th>
            <th>Alteração</th>
            <th>Exclusão</th>
        </tr>
        <?php
        require_once '../model/classConexao.php';
        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_funcionario'])) {
            $funcional = $_POST['funcional'];
            $pdo->query("DELETE FROM funcionario WHERE funcional = '$funcional'");
        }

        $consulta = $pdo->query("SELECT * FROM funcionario");

        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['funcional']."</td>";
            echo "<td>".$row['cpf']."</td>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['telefone']."</td>";
            echo "<td>".$row['endereco']."</td>";
            echo "<td>".$row['codDepartamento']."</td>";
            echo "<td>".$row['codCargo']."</td>";
            echo '<td><button class="btn btn-primary" onclick="window.location.href=\'../controller/alteracaoFuncionario.php?id='.$row['funcional'].'\'">Alterar</button></td>';
            echo '<td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="funcional" value="'.$row['funcional'].'">
                        <button type="submit" name="delete_funcionario" class="btn btn-danger">Excluir</button>
                    </form>
                  </td>';
            echo "</tr>";
        }
        ?>
    </table>
    </div> 
    </center>
      </main>
  <footer>
            Brenda Caroline, Gisele Araújo, Kauany Oliveira.
    </footer>
</body>
</html>
