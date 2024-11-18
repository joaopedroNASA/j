<?php
require_once 'C:/aluno2/xampp/htdocs/emGrupo/config.php';
require_once 'C:/aluno2/xampp/htdocs/emGrupocontroller/TarefasController.php';

$tarefasController = new TarefasController($pdo);

$tarefas = $tarefasController->listarTarefas();

if (isset($_POST['id_tarefa'])) {
    $tarefasController->deletarTarefas($_POST['id_tarefa']);
    header("Location:index.php");
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style2.css">
    <link rel="stylesheet" href="../../select.scss">
    <title>Deletar Competidor</title>
</head>

<body>
    <main>

        <section class="crud-section">
            <a href="index.php"><button>Voltar para o início</button></a>
            <div class="card-container">
            <h1>Deletar Competidor</h1>
                <form method="post">
                    <select name="id_tarefa" id="multi-select">
                        <?php
                        foreach ($tarefas as $tarefa): ?>

                            <div class="select select--multiple">
                                <option value="<?= $tarefa['id_tarefa']; ?>"><?= $tarefa['nome_tarefa']; ?></option>
                            </div>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit">Deletar</button>
                </form>
            </div>
        </section>
    </main>

</body>

</html>