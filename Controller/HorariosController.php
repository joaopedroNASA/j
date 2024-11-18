<?php

require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\Controller\HorariosController.php';

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
        $sql = "SELECT * FROM horarios";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $horarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $horarios;
    }
}
