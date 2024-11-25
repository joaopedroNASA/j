<?php
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\View\db_connect.php';
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\Controller\AgendaController.php';

$controller = new AgendaController($pdo);


if (isset($_POST['id'])) {
    $controller->deletarConsulta($_POST['id']);
    header("Location:admin.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style2.css">
    <link rel="stylesheet" href="../../select.scss">
    <title>Deletar Consulta</title>
</head>

<body>
    <main>

        <section class="crud-section">
            <a href="index.php"><button>Voltar para o início</button></a>
            <div class="card-container">
            <h1>Deletar Consulta</h1>
                <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                    <select name="id" id="multi-select">
                        <?php
                        $consultas = $controller->listarConsultas();
                        foreach ($consultas as $consulta): ?>

                            <div class="select select--multiple">
                                <option value="<?= $consulta['id']; ?>"><?= $consulta['assunto']; ?></option>
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