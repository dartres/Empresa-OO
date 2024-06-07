<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Funcionário</title>
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
        <h2>Alterar Funcionário</h2>
        <?php
        require_once '../model/classConexao.php';

        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = $pdo->prepare("SELECT * FROM funcionario WHERE funcional = :id");
            $query->bindParam(':id', $id);
            $query->execute();
            $funcionario = $query->fetch(PDO::FETCH_ASSOC);

            if ($funcionario) {
                echo '
                <form method="POST" action="alteracaoFuncionario.php">
                    <input type="hidden" name="funcional" value="'.$funcionario['funcional'].'">
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="'.$funcionario['cpf'].'" required>
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="'.$funcionario['nome'].'" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="'.$funcionario['telefone'].'" required>
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" value="'.$funcionario['endereco'].'" required>
                    </div>
                    <div class="mb-3">
                        <label for="codDepartamento" class="form-label">Código do Departamento</label>
                        <input type="text" class="form-control" id="codDepartamento" name="codDepartamento" value="'.$funcionario['codDepartamento'].'" required>
                    </div>
                    <div class="mb-3">
                        <label for="codCargo" class="form-label">Código do Cargo</label>
                        <input type="text" class="form-control" id="codCargo" name="codCargo" value="'.$funcionario['codCargo'].'" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_funcionario">Salvar Alterações</button>
                </form>';
            } else {
                echo '<p>Funcionário não encontrado.</p>';
            }
        }

        if (isset($_POST['update_funcionario'])) {
            $funcional = $_POST['funcional'];
            $cpf = $_POST['cpf'];
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $endereco = $_POST['endereco'];
            $codDepartamento = $_POST['codDepartamento'];
            $codCargo = $_POST['codCargo'];
            $query = $pdo->prepare("UPDATE funcionario SET cpf = :cpf, nome = :nome, telefone = :telefone, endereco = :endereco, codDepartamento = :codDepartamento, codCargo = :codCargo WHERE funcional = :funcional");
            $query->bindParam(':cpf', $cpf);
            $query->bindParam(':nome', $nome);
            $query->bindParam(':telefone', $telefone);
            $query->bindParam(':endereco', $endereco);
            $query->bindParam(':codDepartamento', $codDepartamento);
            $query->bindParam(':codCargo', $codCargo);
            $query->bindParam(':funcional', $funcional);
            if ($query->execute()) {
                echo '<div class="alert alert-success" role="alert">Funcionário atualizado com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro ao atualizar funcionário.</div>';
            }
        }
        ?>
        <a href="consultaFuncionario.php" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</body>
</html>
