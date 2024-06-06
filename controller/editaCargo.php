<?php
require_once '../model/classCargo.php';
include '../view/ alteracaoCargo.php';

function retorna(){
    $cargo = new cargo ();
    if(isset($_GET ['id_up']))
    {
        $codCargo = addslashes($_GET['id_up']);
        $retorno = $cargo->atualizaCargo($codCargo);
    }
    return $retorno;
    echo "<pre>";
    print_r ($retorno);
    echo "</pre>";
}
?>