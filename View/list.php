<?php

foreach ($tarefas as $tarefa) {

    if ($tarefa['status_tarefa'] == "pendente") {
        $tarefa['status_tarefa'] = "Pendente";
    } elseif ($tarefa['status_tarefa'] == "concluida") {
        $tarefa['status_tarefa'] = "Concluída";
    }


    echo '<div class="card">';
    echo '<h4>Nome da tarefa: ' . $tarefa["nome_tarefa"] . "</h4>";
    echo '<li>Descrição da tarefa:' . $tarefa["descricao_tarefa"] . "</li>";
    echo '<li>Responsável da tarefa: ' . $tarefa["responsavel_tarefa"] . "</li>";
    echo '<li>Data de início: ' . $tarefa["data_inicio"] . "</li>";
    echo '<li>Data de conclusãp: ' . $tarefa["data_conclusao"] . "</li>";
    echo '<li>Status da tarefa: ' .  $tarefa["status_tarefa"] . "</li>";
    echo '</div>';
}
