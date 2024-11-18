<?php

class TarefasModel
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function criarTarefas($nome_tarefa, $descricao_tarefa, $responsavel_tarefa, $data_inicio, $data_conclusao, $status_tarefa)
    {
        $sql = "INSERT INTO tarefas (nome_tarefa, descricao_tarefa, responsavel_tarefa, data_inicio, data_conclusao, status_tarefa) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome_tarefa, $descricao_tarefa, $responsavel_tarefa, $data_inicio, $data_conclusao, $status_tarefa]);
    }
    public function listarTarefas()
    {
        $sql = "SELECT * FROM tarefas";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    public function atualizarTarefas($status_tarefa, $id_tarefa)
    {
        $sql = "UPDATE tarefas SET status_tarefa = ? WHERE id_tarefa = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$status_tarefa, $id_tarefa]);
    }

    public function deletarTarefas($id_tarefa){
        $sql = "DELETE FROM tarefas WHERE id_tarefa = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_tarefa]);
    }
}
