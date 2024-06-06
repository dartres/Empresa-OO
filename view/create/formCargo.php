
<!DOCTYPE html>
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
     <link rel="stylesheet" href="../style.css">
</head>
<body>
    <form method="POST" action="../../controller/create/recebeCargo.php">
    <header>
    <nav class="nav-header">
          <ul>
              <li><a href="../../index.html">Home</a></li>
              <li>
                  <div class="dropdown">
                      <button onclick="myFunction()" class="dropbtn">Cadastro</button>
                      <div id="myDropdown" class="dropdown-content">
                        <a href="formCargo.php">Cargo</a>
                        <a href="formDepartamento.php">Departamento</a>
                        <a href="formFuncionario.php">Funcionário</a>
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

        
    <main>
        <center>
           <div style="height: 18vh;"></div>
            <div class="centro" style="height: 250px; border: solid black 5px; width: 40%; padding: 30px 30px; border-radius: 20px;"> 
            <h1>CARGO</h1>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Digite cargo:</label><br>
          <input type="text" class="txtNomeCargo" name="txtNomeCargo" aria-describedby="emailHelp"
           style="border: solid black 1px;  " required><br><br>
       <button type="submit" class="btn btn-primary">Enviar</button> </div>
    </div>
    </form>
    </center>
    </main>
    <footer>
            Brenda Caroline, Gisele Araújo, Kauany Oliveira.
    </footer>
</form>
</body>
</html>