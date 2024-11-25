<?php

require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\View\db_connect.php';

class HorariosModel
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarHorarios() {
        $sql = "SELECT * FROM horarios";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
