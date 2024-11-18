<?php
require_once 'C:/aluno2/xampp/htdocs/emGrupo/config.php';
require_once 'C:/aluno2/xampp/htdocs/emGrupo/controller/TarefasController.php';

$tarefasController = new $agendaController($pdo);

$tarefas = $agendaController->listarTarefas();

if (isset($_POST['tarefa_id']) && isset($_POST['statusTarefa'])) {
    $tarefasController->atualizarTarefas($_POST['statusTarefa'], $_POST['tarefa_id']);
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style2.css">
    <link rel="stylesheet" href="../../select.scss">
    <title>Atualizar Status</title>
</head>

<body>
    <section class="crud-section">

        <a href="index.php"><button>Voltar para o início</button></a>
        <div class="card-container">
            <h1>Atualizar competidor</h1>
            <form method="post">
                <select name="tarefa_id">
                    <?php
                    foreach ($tarefas as $tarefa): ?>
                        <div class="select select--multiple">
                            <option value="<?= $tarefa['id_tarefa']; ?>"><?= $tarefa['nome_tarefa']; ?></option>
                        </div>
                    <?php endforeach; ?>
                </select>
                        <select name="statusTarefa" id="statusTarefa">
                            <option value="pendente">Pendente</option>
                            <option value="concluida">Concluída</option>
                        </select>
                <button type="submit">Atualizar</button>
            </form>
        </div>
    </section>

</body>

</html>