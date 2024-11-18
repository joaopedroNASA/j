<?php 
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\Controller\HorariosController.php';
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\View\db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <main>
    <form>
        <label for="assunto">assunto</label>
        <input type="text">
        <label for="data">dia da consulta</label>
        <input type="date">
        <select name="time" id="">
            <?php
            $controller = new HorariosController($pdo);
            $horarios = $controller->buscarHorarios();
            foreach ($horarios as $horario) : ?>
            <option value="$horario['horario']">$horario['horario']</option>
            <?php endforeach; ?>
        </select>
    </form>
   </main>
</body>
</html>