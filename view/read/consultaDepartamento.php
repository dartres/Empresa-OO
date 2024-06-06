<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <style>
        table { border: 1px solid black; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        .container { display: grid; grid-template-columns: repeat(2, 1fr); grid-gap: 100px; }
    </style>
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
                        <a href="../create/formCargo.php">Cargo</a>
                        <a href="../create/formDepartamento.php">Departamento</a>
                        <a href="../create/formFuncionario.php">Funcionário</a>
                      </div>
                    </div>
                    </li>  
                <li><div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn">Consulta</button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="consultaCargo.php">Cargo</a>
                    <a href="consultaDepartamento.php">Departamento</a>
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
        <h2>Departamento</h2>
        <table>
            <tr>
                <th>Nome</th>
                <th>Cod Departamento</th>
                <th>Alteração</th>
                <th>Exclusão</th>
            </tr>
            <?php
            require_once '../../controller/read/consultaDepartamento.php';
            $controller = new consultaDepartamento();
            $departamentos = $controller->consultarDepartamento();

            foreach ($departamentos as $row) {
                echo "<tr>";
                echo "<td>".$row['nomeDepartamento']."</td>";
                echo "<td>".$row['codDepartamento']."</td>";
                echo '<td><button class="btn btn-primary" onclick="window.location.href=\'../update/alteracaoDepartamento.php?id='.$row['codDepartamento'].'\'">Alterar</button></td>';
                echo '<td>
                        <form method="POST" action="../../controller/delete/excluiDepartamento.php" style="display:inline;">
                            <input type="hidden" name="codDepartamento" value="'.$row['codDepartamento'].'">
                            <button type="submit" name="delete_departamento" class="btn btn-danger">Excluir</button>
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
