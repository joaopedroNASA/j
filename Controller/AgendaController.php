<?php
require_once 'C:/aluno2/xampp/htdocs/emGrupo/model/TarefasModel.php';

class TarefasController
{

   private $tarefasModel;
   public function __construct($pdo)
   {
      $this->tarefasModel = new TarefasModel($pdo);
   }
   public function criarTarefas($nome_tarefa, $descricao_tarefa, $responsavel_tarefa, $data_inicio, $data_conclusao, $status_tarefa)
   {
      $this->tarefasModel->criarTarefas($nome_tarefa, $descricao_tarefa, $responsavel_tarefa, $data_inicio, $data_conclusao, $status_tarefa);
   }

   public function listarTarefas()
   {
      return $this->tarefasModel->listarTarefas();
   }

   public function exibirListaTarefas()
   {
      $tarefas = $this->tarefasModel->listarTarefas();
      include 'C:/aluno2/xampp/htdocs/emGrupo/view/todo/listar.php';
   }

   public function atualizarTarefas($status_tarefa, $id_tarefa)
   {
      $this->tarefasModel->atualizarTarefas($status_tarefa, $id_tarefa);
   }

   public function deletarTarefas($id_tarefa)
   {
      $this->tarefasModel->deletarTarefas($id_tarefa);
   }
}
