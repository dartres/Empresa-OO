<?php
require_once '../../model/classDepartamento.php';

class consultaDepartamento {
    private $model;

    public function __construct() {
        $this->model = new departamento();
    }

    public function consultarDepartamento() {
        return $this->model->consultarDepartamento();
    }
    
}

$controller = new consultaDepartamento();


?>