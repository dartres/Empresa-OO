<?php
require_once'../model/classCargo.php';
include'../view/formCargo.html';

$nomeCargo = addslashes($_POST['txtNomeCargo']);

$cargo = new Cargo();
$cargo->insereCargo($nomeCargo);
echo"<br><br>";
echo "<div class='FormCadastro'><h2>CADASTRO REALIZADO.</h2>";
?>