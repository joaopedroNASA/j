<?php
// Inclusão dos arquivos necessários
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\Controller\HorariosController.php';
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\Controller\AgendaController.php';
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\View\db_connect.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Médica</title>

    <!-- Fontes Google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #e3e9ef);
            color: #333;
            padding: 20px;
        }

        /* Container centralizado */
        .container {
            max-width: 1200px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-family: 'Open Sans', sans-serif;
            font-size: 36px;
            color: #333;
            margin-bottom: 30px;
        }

        /* Estilos para cada item da agenda */
        .agenda-item {
            background-color: #fff;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 20px;
            overflow: hidden;
            position: relative;
        }

        .agenda-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .agenda-item p {
            font-size: 16px;
            margin-bottom: 10px;
            color: #555;
            line-height: 1.6;
        }

        .agenda-item p strong {
            font-weight: 600;
            color: #2c3e50;
        }

        /* Estilos individuais */
        .assunto {
            font-size: 18px;
            color: #3498db;
            font-weight: bold;
        }

        .especialista {
            color: #e74c3c;
            font-weight: 500;
        }

        .data, .horario {
            color: #2ecc71;
            font-weight: 600;
            text-transform: uppercase;
        }

        /* Adicionando uma linha de separação sutil */
        .agenda-item p + p {
            border-top: 1px solid #eee;
            padding-top: 10px;
            margin-top: 10px;
        }

        /* Estilo dos botões */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
            margin: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .btn-danger {
            background-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .btn-warning {
            background-color: #f39c12;
        }

        .btn-warning:hover {
            background-color: #e67e22;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Consultas Agendadas</h1>

        <?php
        // Instanciando o controlador de Agenda
        $controller = new AgendaController($pdo);

        // Recupera as consultas
        $agendas = $controller->listarConsultas();

        // Exibe os detalhes de cada consulta
        foreach ($agendas as $agenda) : ?>
            <div class="agenda-item">
                <p><strong>Assunto:</strong> <span class="assunto"><?php echo htmlspecialchars($agenda['assunto']); ?></span></p>
                <p><strong>Especialista:</strong> <span class="especialista"><?php echo htmlspecialchars($agenda['especialista']); ?></span></p>
                <p><strong>Data:</strong> <span class="data"><?php echo htmlspecialchars($agenda['data']); ?></span></p>
                <p><strong>Horário:</strong> <span class="horario"><?php echo htmlspecialchars($agenda['horario']); ?></span></p>

                <!-- Botões de Editar e Excluir -->
                <div>
                    <a href="editar.php?id=<?php echo $agenda['id']; ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir.php?id=<?php echo $agenda['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta consulta?');">Excluir</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>
