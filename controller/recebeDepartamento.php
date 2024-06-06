<?php
require_once'../model/classDepartamento.php';
include'../view/formDepartamento.html';

$nomeDepartamento = addslashes($_POST['txtNomeDepartamento']);

$departamento = new Departamento();
$departamento->insereDepartamento($nomeDepartamento);
echo"<br><br>";
echo "<div class='FormCadastro'><h2>CADASTRO REALIZADO.</h2>";
?>