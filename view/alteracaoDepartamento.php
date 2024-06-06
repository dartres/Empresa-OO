<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
     crossorigin="anonymous"></script>
     <link rel="stylesheet" href="style.css">
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
    <div class="container mt-5">
        <h2>Alterar Departamento</h2>
        <?php
        require_once '../model/classConexao.php';

        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = $pdo->prepare("SELECT * FROM departamento WHERE codDepartamento = :id");
            $query->bindParam(':id', $id);
            $query->execute();
            $departamento = $query->fetch(PDO::FETCH_ASSOC);

            if ($departamento) {
                echo '
                <form method="POST" action="alteracaoDepartamento.php">
                    <input type="hidden" name="codDepartamento" value="'.$departamento['codDepartamento'].'">
                    <div class="mb-3">
                        <label for="nomeDepartamento" class="form-label">Nome do Departamento</label>
                        <input type="text" class="form-control" id="nomeDepartamento" name="nomeDepartamento" value="'.$departamento['nomeDepartamento'].'" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_departamento">Salvar Alterações</button>
                </form>';
            } else {
                echo '<p>Departamento não encontrado.</p>';
            }
        }

        if (isset($_POST['update_departamento'])) {
            $codDepartamento = $_POST['codDepartamento'];
            $nomeDepartamento = $_POST['nomeDepartamento'];
            $query = $pdo->prepare("UPDATE departamento SET nomeDepartamento = :nome WHERE codDepartamento = :id");
            $query->bindParam(':nome', $nomeDepartamento);
            $query->bindParam(':id', $codDepartamento);
            if ($query->execute()) {
                echo '<div class="alert alert-success" role="alert">Departamento atualizado com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro ao atualizar departamento.</div>';
            }
        }
        ?>
        <a href="consulta.php" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</body>
</html>
