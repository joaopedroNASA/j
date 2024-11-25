<?php

require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\View\db_connect.php';

class AgendaModel
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function marcarConsulta($assunto, $medico, $data, $horario)
    {
        $sql = "INSERT INTO consultas (assunto, especialista, data, horario) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$assunto, $medico, $data, $horario]);
    }
    public function listarConsultas()
    {
        $sql = "SELECT * FROM consultas";
        $stmt = $this->pdo->query($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    public function listarMedicos()
    {
        $sql = "SELECT * FROM medicos";
        $stmt = $this->pdo->query($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    public function atualizarConsulta($assunto, $medico, $data, $horario, $id)
    {
        $sql = "UPDATE consultas SET assunto = ? especialista = ? data = ? horario = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$assunto, $medico, $data, $horario, $id]);
    }

    public function deletarConsulta($id){
        $sql = "DELETE FROM consultas WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}
