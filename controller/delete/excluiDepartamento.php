

<?php


require_once '../../model/classDepartamento.php';

class excluiDepartamento {
    private $model;

    public function __construct() {
        $this->model = new departamento();
    }

    public function validaExclusaoDepartamento($codDepartamento){
        $this->model->validaExclusaoDepartamento($codDepartamento);
    }

    };

$excluir = new excluiDepartamento();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_departamento'])) {
    $codDepartamento = $_POST['codDepartamento'];

    $excluir->validaExclusaoDepartamento($codDepartamento);
    
}