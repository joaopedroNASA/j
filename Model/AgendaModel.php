<?php

require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\View\db_connect.php';

class AgendaModel
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function marcarConsulta($assunto, $especialista, $horario)
    {
        $sql = "INSERT INTO consultas (assunto, especialista, horario) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$assunto, $especialista, $horario]);
    }
    public function listarConsultas()
    {
        $sql = "SELECT * FROM tarefas";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    public function atualizarConsulta($status_tarefa, $id_tarefa)
    {
        $sql = "UPDATE tarefas SET status_tarefa = ? WHERE id_tarefa = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$status_tarefa, $id_tarefa]);
    }

    public function deletarConsulta($id_tarefa){
        $sql = "DELETE FROM tarefas WHERE id_tarefa = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_tarefa]);
    }
}
