<?php
session_start();
ob_start();
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG Shopping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />

    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Piazzolla:ital,opsz,wght@0,8..30,100..900;1,8..30,100..900&display=swap" rel="stylesheet">
    <style type="text/css">
        /* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar bg-dark">
                <div class="sidebar-sticky">
                    <div class="row">
                        <div class="col-sm center">
                            <!-- NAVBAR -->
                            <p class="text-light fw-bolder margin-top-comm">
                                <img src="img/logo.png" alt="logo" width="105" class="img-fluid margin-top-comm margin-bottom-comm"><br>
                                PRAIA GRANDE SHOPPING
                            </p>

                            <!-- Adicionar "href" -->
                            <a class="nav-link d-grid gap-2 mt-2" href="usuario/login.php">
                                <button type="button" class="btn btn-outline-light">Login</button>
                            </a>

                            <a class="nav-link d-grid gap-2 mt-2" href="#">
                                <button type="button" class="btn btn-outline-light">Pesquisar</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2" href="#">
                                <button type="button" class="btn btn-outline-light">Contatos</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2" href="#">
                                <button type="button" class="btn btn-outline-light">Sobre</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2" href="#">
                                <button type="button" class="btn btn-outline-light">Teste</button>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>



            <!-- PUBLICAÇÃO -->
            <main role="main" class="col-md-9 ml-sm-auto px">
                <div class="container-fluid">
                    <div class="card mb-3 shadow-lg" style="max-width: 720px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="img/foto1.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">

                                    <!--título-->
                                    <h5 class="card-title"><b>Nova camiseta, venha conferir!!!</b></h5>
                                    <div class="col">

                                        <!-- comentário -->
                                        <div>
                                            <p id="comentarioCliente1">
                                                <img src="img/otho.png" class="rounded-circle" style="width: 33px;" alt="">
                                                Confira também nossas Camisetas e Calças na promoção!!! Segue pra mais
                                            </p>
                                            <span id="pontos"></span>
                                            <span id="mais">
                                                <p id="comentarioCliente">
                                                    <img src="img/otho.png" class="rounded-circle" style="width: 33px;" alt=""> Qual o preço?
                                                </p>
                                                <p id="comentarioCliente">
                                                    <img src="img/otho.png" class="rounded-circle" style="width: 33px;" alt="">Tem tamanho M?
                                                </p>
                                            </span>
                                            <a onclick="vermais()" id="btnVerMais">Ver mais comentários</a>
                                        </div>

                                        <!-- FEEDBACK -->
                                        <div class="col">
                                            <div class="card-body margin-bottom-comm">

                                                <input type="text" size="30px" class="rounded border border-secondary p-1 border-opacity-25" id="comentario">
                                                <button onclick="feedback()" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .35rem; --bs-btn-font-size: .85rem; margin-bottom: 7px;">Enviar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text"><small class="text-muted"></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- NAVBAR A DIREITA -->
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>