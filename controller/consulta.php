<?php
require_once('../model/classCargo.php');

function mostrarCargo(){
    $cargo = new Cargo();
    $valorCargo = $cargo->consultaCargo();
    return $valorCargo;
}

?>