<?php
session_start();

// Inclusão dos arquivos necessários
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\Controller\HorariosController.php';
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\Controller\AgendaController.php';
require_once 'C:\aluno2\xampp\htdocs\SistemadeAgendaMedica\View\db_connect.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="shortcut icon" type="imagex/png" href="../Assets/img/image.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Médica</title>
    <link rel="stylesheet" href="../Assets\Css\style.scss">
    <link rel="stylesheet" href="../Assets\Css\admin.css">
    <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-principal">
        <!-- Menu lateral -->
        <div class="sidebar">
           
            <div class="sidebar-menu">
                <ul>
                   
                    
                    <li><a href="formulario.php" class="menu-item"><i class="fa-regular fa-rectangle-list"></i>Adicionar Consultas</a></li>
                   

                    <li><a href="#" class="menu-item"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair</a></li>
                </ul>
            </div>
        </div>

        <!-- Conteúdo principal -->
        <div class="content">
            <header class="header">
                <h1>Agenda Médica</h1>
                <div class="user-info">
                    <img src="../Assets/img/image-removebg-preview (1).png" width="50px" alt="Avatar">
                    <h3><?= $_SESSION['usuario']['nome'] ?></h3>
                </div>
            </header>

            <section class="main-section">
               

                <h2>Últimas Consultas</h2>
                <div class="consultas-list">
                    <?php
                    // Instanciando o controlador de Agenda
                    $controller = new AgendaController($pdo);

                    // Recupera as consultas
                    $agendas = $controller->listarConsultas();

                    // Exibe os detalhes de cada consulta
                    foreach ($agendas as $agenda) : ?>
                        <div class="agenda-item">
                            <div class="agenda-details">
                                <p><strong>Assunto:</strong> <span class="assunto"><?php echo htmlspecialchars($agenda['assunto']); ?></span></p>
                                <p><strong>Especialista:</strong> <span class="especialista"><?php echo htmlspecialchars($agenda['especialista']); ?></span></p>
                                <p><strong>Data:</strong> <span class="data"><?php echo htmlspecialchars($agenda['data']); ?></span></p>
                                <p><strong>Horário:</strong> <span class="horario"><?php echo htmlspecialchars($agenda['horario']); ?></span></p>
                            </div>
                            <div class="buttons">
                                <a href="editar.php?id=<?php echo $agenda['id']; ?>" class="btn btn-warning">Editar</a>
                                <a href="excluir.php?id=<?php echo $agenda['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta consulta?');">Excluir</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </div>

    <style>
    /* Estilo geral */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Roboto', sans-serif;
        background: #f4f7fc;
        color: #333;
    }

    .container-principal {
        display: flex;
        min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
        background-color: #34495e;
        color: #fff;
        width: 250px;
        height: 100vh;
        padding-top: 20px;
        position: fixed;
        left: 0;
        top: 0;
    }

    .sidebar-logo {
        text-align: center;
        margin-bottom: 30px;
    }

    .sidebar-logo img {
        width: 80%;
    }

    .sidebar-menu ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar-menu li {
        margin: 20px 0;
    }

    .menu-item {
        text-decoration: none;
        color: #ecf0f1;
        font-size: 18px;
        display: flex;
        align-items: center;
        padding: 10px;
        transition: background-color 0.3s;
    }

    .menu-item:hover {
        background-color: #2c3e50;
        border-radius: 5px;
    }

    .menu-item i {
        margin-right: 10px;
    }

    /* Conteúdo principal */
    .content {
        margin-left: 270px;
        padding: 20px;
        width: 100%;
    }

    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 40px;
    }

    .header h1 {
        font-size: 32px;
        color: #2c3e50;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info img {
        border-radius: 50%;
        margin-right: 10px;
    }

    .user-info h3 {
        font-size: 20px;
        color: #2c3e50;
    }

    .main-section {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    .user-actions .button {
        padding: 10px 20px;
        background-color: #3498db;
        color: #fff;
        text-align: center;
        border-radius: 5px;
        margin-right: 10px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .user-actions .button:hover {
        background-color: #2980b9;
    }

    .consultas-list {
        margin-top: 20px;
    }

    .agenda-item {
        background-color: #fff;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        display: flex;
        justify-content: space-between;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .agenda-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    .agenda-details {
        flex: 1;
    }

    .agenda-item p {
        font-size: 16px;
        margin-bottom: 10px;
        color: #555;
    }

    .agenda-item .assunto {
        font-weight: bold;
        color: #3498db;
    }

    .agenda-item .especialista {
        color: #e74c3c;
    }

    .agenda-item .data,
    .agenda-item .horario {
        color: #2ecc71;
        font-weight: 600;
        text-transform: uppercase;
    }

    .buttons a {
        margin-right: 10px;
        text-decoration: none;
    }

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

    /* Responsividade */
    @media (max-width: 1024px) {
        .container-principal {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            padding: 10px;
        }

        .sidebar-menu {
            width: 100%;
            display: flex;
            justify-content: space-around;
        }

        .sidebar-logo {
            margin-bottom: 10px;
        }

        .content {
            margin-left: 0;
            padding: 10px;
            width: 100%;
        }

        .header {
            flex-direction: column;
            align-items: flex-start;
        }

        .user-info {
            margin-top: 10px;
        }

        .agenda-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .agenda-item .agenda-details {
            width: 100%;
        }

        .user-actions .button {
            display: block;
            margin-top: 10px;}
</style>
</body>

</html>
