<?php
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\View\db_connect.php';
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\Controller\AgendaController.php';

$controller = new AgendaController($pdo);

$consultas = $controller->listarConsultas();

if (isset($_POST['id'])) {
    $controller->atualizarConsulta($_POST['assunto'], $_POST['medico'], $_POST['data'], $_POST['horario'], $_POST['id']);
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

    <section>
        <form>
            <label for="">assunto</label>
            <input type="text" name="assunto">

            <label for="">especialista</label>
            <input type="text" name="especialista">

            <label for="">Data</label>
            <input type="date" name="data">
            
            <label for="">Horário</label>
            <input type="time" name="horario">
            
            <button type="submit">Atualizar</button>


        </form>
    </section>
</body>

</html>