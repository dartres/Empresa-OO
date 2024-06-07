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
 <div class="container">   
  <div>
    <h2>Departamento</h2>
    
    <table style="border: 1px solid black ">
        <tr>
            <th>Código</th>
            <th>Nome do Departamento</th>
            <th>Alteração</th>
            <th>Exclusão</th>
        </tr>
        <?php
        require_once '../model/classConexao.php';

        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_departamento'])) {
            $codDepartamento = $_POST['codDepartamento'];
            $pdo->query("DELETE FROM departamento WHERE codDepartamento = '$codDepartamento'");
        }

        $consulta = $pdo->query("SELECT * FROM departamento");

        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['codDepartamento']."</td>";
            echo "<td>".$row['nomeDepartamento']."</td>";
            echo '<td><button class="btn btn-primary" onclick="window.location.href=\'../controller/alteracaoDepartamento.php?id='.$row['codDepartamento'].'\'">Alterar</button></td>';
            echo '<td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="codDepartamento" value="'.$row['codDepartamento'].'">
                        <button type="submit" name="delete_departamento" class="btn btn-danger">Excluir</button>
                    </form>
                  </td>';
            echo "</tr>";
        }
        ?>
    </table>
    </div>  

    <div class="container">
      <div>
    <h2>Cargo</h2>
    <table style=" border: 1px solid black ">
        <tr>
            <th>Código</th>
            <th>Nome do Cargo</th>
            <th>Alteração</th>
            <th>Exclusão</th>
        </tr>
        <?php
        require_once '../controller/consulta.php';

        $consulta = mostrarCargo();


        if(count($consulta)>0){
          for($i = 0 ; $i < count($consulta); $i++){
            echo"<tr>";
            foreach($consulta[$i] as $key -> $value){
             echo"<td>". $value. "</td>"; }?>
        
         

          <td><a href="../controller/alteracaoCargo.php?id_up=
          <?php echo $consulta[$i]['codCargo'];?>">ALTERAR</a></td>
          
          <td><a href="../controller/excluiCargo.php?id_ex=          
          <?php echo $consulta[$i]['codCargo'];?>">EXCLUIR</a></td>
        <?php
      echo "</tr>";  
      }}
        ?>
    </table>
      </div>    

  
      </div>
</center>
      </main>
  <footer>
            Brenda Caroline, Gisele Araújo, Kauany Oliveira.
    </footer>
</body>
</html>
