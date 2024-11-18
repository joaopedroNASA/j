<?php

require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\Model\AgendaModel.php';
class AgendaController
{
    private $pdo;
    private $model;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->model = new AgendaModel($pdo);
    }

    public function marcarConsulta($assunto, $especialista, $horario)
    {
        $this->model->marcarConsulta($assunto, $especialista, $horario);
    }
    public function listarConsultas()
    {
        $this->model->listarConsultas();
    }
    public function atualizarConsulta($status_tarefa, $id_tarefa)
    {
        $this->model->atualizarConsulta($status_tarefa, $id_tarefa);
    }

    public function deletarConsulta($id_tarefa){
        $this->model->deletarConsulta($id_tarefa);
    }
}
