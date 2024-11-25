<?php

require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\Model\HorariosModel.php';

class HorariosController
{
    private $pdo;
    private $model;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->model = new HorariosModel($pdo);
    }
    public function buscarHorarios() {
        return $this->model->buscarHorarios();
    }
}
