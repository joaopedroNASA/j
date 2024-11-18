<?php
// Conexão
require_once 'db_connect.php';
// Sessão
session_start();
// Botão Enviar
if (isset($_POST['login_button'])) {
    $erros = [];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if (empty($login) || empty($senha)) {
        $erros[] = '<li class="login-error">Preencha todos os campos</li>';
    } else {
        try {
            // Verifica se o usuário existe
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE login = :login");
            $stmt->bindParam(':login', $login);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Verifica senha
                $senha = md5($senha);
                $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE login = :login AND senha = :senha");
                $stmt->bindParam(':login', $login);
                $stmt->bindParam(':senha', $senha);
                $stmt->execute();

                if ($stmt->rowCount() == 1) {
                    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['logado'] = true;
                    $_SESSION['usuario'] = $dados;
                    header('Location: admin.php');
                    exit;
                } else {
                    $erros[] = '<li class="login-error"> Usuário e senha não conferem. </li>';
                }
            } else {
                $erros[] = '<li class="login-error"> Usuário inexistente </li>';
            }
        } catch (PDOException $e) {
            $erros[] = '<li class="login-error">Erro ao conectar ao banco de dados</li>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../Assets/Css/style.css">


</head>

<body>
    <main id="container">
        <form id="login_form" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
            <!-- FORM HEADER -->
            <div id="form_header">
                <h1>Registro</h1>
                <i id="mode_icon" class="fa-solid fa-moon"></i>
            </div>




            <!-- INPUTS -->
            <div id="inputs">
                <!-- NAME -->
                <div class="input-box">
                    <label for="name">
                        login
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" id="name" name="login">
                        </div>
                    </label>
                </div>



                <!-- PASSWORD -->
                <div class="input-box">
                    <label for="password">
                        Senha
                        <div class="input-field">
                            <i class="fa-solid fa-key"></i>
                            <input type="password" id="password" name="senha">
                        </div>
                    </label>

                    <!-- FORGOT PASSWORD -->
                    <div id="forgot_password">
                        <a href="registry.php">
                            Registrar-se
                        </a>
                    </div>
                </div>
            </div>
            <?php
            if (empty($erros)) {
            } else {
                foreach ($erros as $erro) {
                    echo $erro;
                }
            }
            ?>
            <!-- LOGIN BUTTON -->
            <button type="submit" id="login_button" name="login_button">
                Entrar
            </button>
        </form>
    </main>

    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="../Assets/Js/script.js"></script>
</body>

</html>