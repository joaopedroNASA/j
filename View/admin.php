<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="imagex/png" href="../Assets/img/image.png   ">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Assets\Css\style.scss">
    <link rel="stylesheet" href="../Assets\Css\admin.css">

    <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-principal">
        <!-- Aqui vai ser o primeiro container 1 onde vai estar sendo meu menu -->
        <div class="container-1">

            <!-- primeiro icon -->
            <div class="box">
                <div class="icon">
                    <i class="fa-regular fa-calendar-days"></i>
                </div>
            </div>

            <!-- segundo icon -->
            <div class="box">
                <div class="icon">
                    <i class="fas fa-search"></i>
                </div>
            </div>

            <!-- terceiro icon -->
            <div class="box">
                <div class="icon">
                    <i class="fa-regular fa-circle-check"></i>
                </div>
            </div>

            <!-- quarto icon -->
            <div class="box">
                <div class="icon">
                    <i class="fa-regular fa-rectangle-list"></i>
                </div>
            </div>

            <!-- quinto icon -->
            <div class="box">
                <div class="icon">
                    <i class="fa-solid fa-gear"></i>
                </div>
            </div>


            <!-- sexto icon -->
            <div class="box">
                <div class="icon">
                    <i class="fa-solid fa-receipt"></i>
                </div>
            </div>

            <!-- setimo icon  -->
            <div class="box">
                <div class="icon">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </div>
            </div>

        </div>

        <!-- segundo container, aqui sera o perfil do usuario -->
        <div class="container-2">

            <div>
                <h1>Agenda</h1>
                <section class="section">
                    <div>
                        <img src="../Assets/img/image-removebg-preview (1).png" width="120px">
                    </div>
                    <h3><?= $_SESSION['usuario']['nome'] ?></h3>
                    <a href="#"><button class="button">Lista de espera</button></a>

                    <div>
                        <div>
                            <div> <span>Agendados</span></div>
                            <div> <span>Finalizados</span></div>
                        </div>

                        <div>
                            <div> <span>Retornos</span></div>
                            <div> <span>Cancelados</span></div>
                        </div>
                    </div>  
                    <a href="#"><button class="button">Observações</button></a>
                    <a href="#"><button class="button">Relatorio de agendamentos</button></a>
                </section>
            </div>

        </div>

    </div>
</body>

</html>