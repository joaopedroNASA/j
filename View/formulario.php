<?php
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\Controller\HorariosController.php';
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\Controller\AgendaController.php';
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\View\db_connect.php';

if (isset($_POST['confirmed-btn'])) {
    $assunto = $_POST['assunto'];
    $medico = $_POST['medico'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];

    $controller = new AgendaController($pdo);
    $controller->marcarConsulta($assunto, $medico, $data, $horario);
    header('location: admin.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* Estilos globais */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        color: #333;
        padding: 20px;
    }

    main {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #3498db;
        margin-bottom: 20px;
    }

    label {
        font-size: 16px;
        color: #333;
        margin-bottom: 8px;
        display: block;
    }

    input, select, button {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    input[type="text"], select {
        background-color: #f9f9f9;
    }

    input[type="date"] {
        background-color: #fff;
    }

    select {
        background-color: #f9f9f9;
    }

    button {
        background-color: #3498db;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #2980b9;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        main {
            width: 90%;
            padding: 15px;
        }

        label, input, select, button {
            font-size: 14px;
        }
    }
</style>

<body>
    <main>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="assunto">Assunto</label>
            <input type="text" name="assunto">
            <label for="data">Dia da Consulta</label>
            <input type="date" name="data">
            <label for="horario">Escolha o horario</label>
            <select name="horario" id="">
                <?php
                $controller = new HorariosController($pdo);
                $horarios = $controller->buscarHorarios();
                foreach ($horarios as $horario) : ?>
                    <option value="<?= $horario['horario'] ?>"><?= $horario['horario'] . " horas" ?></option>
                <?php endforeach; ?>
            </select>
            <label for="medico">Escolha o medico</label>
            <select name="medico" id="">
                <?php
                $controller = new AgendaController($pdo);
                $medicos = $controller->listarMedicos();
                foreach ($medicos as $medico) : ?>
                    <option value="<?= $medico['nome'] ?>"><?= $medico['nome'] . " - " . $medico['especialidade']?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="confirmed-btn">Confirmar</button>
        </form>
    </main>
</body>

</html>