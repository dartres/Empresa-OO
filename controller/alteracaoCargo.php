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
                    <a href="../view/Consulta.php">Departamento e
                Cargo</a>
                <a href="../view/consultaFuncionario.php">Funcionário</a>
                  </div>
                </div>
                </li>
          </ul>
      </nav>
  </header>
    <div class="container">
        <h2>Alterar Cargo</h2>
        <?php
        require_once '../model/classConexao.php';

        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = $pdo->prepare("SELECT * FROM cargo WHERE codCargo = :id");
            $query->bindParam(':id', $id);
            $query->execute();
            $cargo = $query->fetch(PDO::FETCH_ASSOC);

            if ($cargo) {
                echo '
                <form method="POST" action="alteracaoCargo.php">
                    <input type="hidden" name="codCargo" value="'.$cargo['codCargo'].'">
                    <div class="mb-3">
                        <label for="nomeCargo" class="form-label">Nome do Cargo</label>
                        <input type="text" class="form-control" id="nomeCargo" name="nomeCargo" value="'.$cargo['nomeCargo'].'" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_cargo">Salvar Alterações</button>
                </form>';
            } else {
                echo '<p>Cargo não encontrado.</p>';
            }
        }

        if (isset($_POST['update_cargo'])) {
            $codCargo = $_POST['codCargo'];
            $nomeCargo = $_POST['nomeCargo'];
            $query = $pdo->prepare("UPDATE cargo SET nomeCargo = :nome WHERE codCargo = :id");
            $query->bindParam(':nome', $nomeCargo);
            $query->bindParam(':id', $codCargo);
            if ($query->execute()) {
                echo '<div class="alert alert-success" role="alert">Cargo atualizado com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro ao atualizar cargo.</div>';
            }
        }
        ?>
        <a href="../view/consulta.php" class="btn btn-secondary">Voltar</a>
    </div>
</body>
</html>
