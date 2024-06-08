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
     <link rel="stylesheet" href="../style.css">
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
                    <a href="../read/consultaCargo.php">Cargo</a>
                    <a href="../read/consultaDepartamento.php">Departamento</a>
                    <a href="../read/consultaFuncionario.php">Funcionário</a>
                  </div>
                </div>
                </li>
          </ul>
      </nav>
  </header>
    <div class="container mt-5">
        <h2>Alterar Funcionário</h2>
        <?php
        require_once '../../controller/update/alteraFuncionario.php';

        $controller = new alteraFuncionario();

        $funcionario = $controller->getFuncionario($funcional, $cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo);

        $cargos = $controller->consultarCargo();

        $departamentos = $controller->consultarDepartamento();
        
            if ($funcionario) {
                echo '
                <form method="POST" action="alteracaoFuncionario.php">
                    <input type="hidden" class="form-control" name="funcional" value="'.$funcionario['funcional'].'">
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
                    <label for="codCargo" class="form-label">Cargo</label>
                    <select class="form-select" id="codCargo" name="codCargo" required>'; 
                        foreach ($cargos as $cargo) {
                            echo '<option value="'.$cargo['codCargo'].'" '.(($funcionario['codCargo'] == $cargo['codCargo']) ? 'selected' : '').'>'.$cargo['nomeCargo'].'</option>';
                        }
                    echo '</select>';
                echo '</div>
                <div class="mb-3">
                    <label for="codDepartamento" class="form-label">Departamento</label>
                    <select class="form-select" id="codDepartamento" name="codDepartamento" required>'; 
                        foreach ($departamentos as $departamento) {
                            echo '<option value="'.$departamento['codDepartamento'].'" '.(($funcionario['codDepartamento'] == $departamento['codDepartamento']) ? 'selected' : '').'>'.$departamento['nomeDepartamento'].'</option>';
                        }
                    echo '</select>';
                echo '</div>
                    <button type="submit" class="btn btn-primary" name="update_funcionario">Salvar Alterações</button>
                </form>';
            } else {
                echo '<p>Funcionário não encontrado.</p>';
            }
        

       
        ?>
        <a href="consultaFuncionario.php" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</body>
</html>
