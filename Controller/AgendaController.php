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

    public function marcarConsulta($assunto, $medico, $data, $horario)
    {
        $this->model->marcarConsulta($assunto, $medico, $data, $horario);
    }
    public function listarConsultas()
    {
        return $this->model->listarConsultas();
    }

    public function listarMedicos()
    {
        return $this->model->listarMedicos();
    }
    public function atualizarConsulta($assunto, $medico, $data, $horario, $id)
    {
        $this->model->atualizarConsulta($assunto, $medico, $data, $horario, $id);
    }

    public function deletarConsulta($id)
    {
        $this->model->deletarConsulta($id);
    }
}
