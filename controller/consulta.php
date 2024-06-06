<?php

require_once '../model/classConexao.php';
$pdo = new conexao("empresa0702","localhost","root","");


$cpf = addslashes($_POST['txtCpf']);
$nome = addslashes($_POST['txtNomeFuncionario']);
$telefone = addslashes($_POST['txtTelefone']);
$endereco = addslashes($_POST['txtEndereco']);
$codDepartamento = addslashes($_POST['txtDepartamento']);
$codCargo = addslashes($_POST['txtCargo']);

$pdo->$func->validaFuncionario($cpf, $nome, $telefone, $endereco, $codDepartamento, $codCargo);
?>