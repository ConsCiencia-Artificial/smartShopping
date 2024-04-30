<!--<?php
//session_start();
//include_once '../conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG | Praia Grande Shopping</title>
    <link rel="shortcut icon" href="img/favicon3.ico" type="image/x-icon" />
    
</head>
<body>
 <h1>Bem vindo!</h1>
 <a href="sair.php">voltar</a>

 <?php // echo "bem vindo ".$_SESSION['email_usuario']; ?><br>
 <?php // echo "bem vindo ".$_SESSION['nome_usuario']; ?>

 
</body>
</html>
-->
<?php
session_start();
include_once '../conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG Shopping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon" />

    <link rel="stylesheet" href="../style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Piazzolla:ital,opsz,wght@0,8..30,100..900;1,8..30,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            <div class="row position-relative">
                <div class="col-sm position-fixed top-0 start-0 w-25">
                    <nav class="bg-dark" style="padding-bottom: 650%;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm text-light center">
                                    <!-- NAVBAR -->
                                    <p class="text-light fw-bolder margin-top-comm">
                                        <img src="../img/logo.png" alt="logo" width="105" class="d-inline-block margin-top-comm margin-bottom-comm"><br>
                                        PRAIA GRANDE SHOPPING
                                    </p>

                                    <!-- Adicionar "href" -->
                                    <a class="nav-link d-grid gap-2 mt-2" href="../usuario/login.php">
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
                </div>
                <!-- PUBLICAÇÃO -->
                <div class="col-sm publi">
                    <section>
                        <!--duas publicação-->
                        <div class="row box-first anime shadow-lg" id="white">
                            <!-- IMAGEM E DESCRIÇÃO DO PRODUTO -->
                            <div class="col ">
                                <img src="../img/foto1.jpg" class="card-img-top img-tam margin-top-pub" alt="...">
                                <h5 class="card-title margin-top-comm">Nova camiseta, venha conferir!!!</h5>
                            </div>

                            <!-- COMENTÁRIOS -->
                            <div class="col">
                                <div>
                                    <p id="comentarioCliente1">
                                        <img src="../img/otho.png" class="rounded-circle" style="width: 33px;" alt="">
                                        Confira também nossas Camisetas e Calças na promoção!!! Segue pra mais
                                    </p>
                                    <span id="pontos"></span>
                                    <span id="mais">
                                        <p id="comentarioCliente">
                                            <img src="../img/otho.png" class="rounded-circle" style="width: 33px;" alt=""> Qual o preço?
                                        </p>
                                        <p id="comentarioCliente">
                                            <img src="../img/otho.png" class="rounded-circle" style="width: 33px;" alt="">Tem tamanho M?
                                        </p>
                                    </span>
                                    <a onclick="vermais()" id="btnVerMais">Ver mais comentários</a>
                                </div>
                            </div>

                            <!-- FEEDBACK -->
                            <div class="col">
                                <div class="card-body margin-bottom-comm">

                                    <input type="text" size="40px" class="rounded border border-secondary p-1 border-opacity-25" id="comentario">
                                    <button onclick="feedback()" class="btn btn-secondary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .35rem; --bs-btn-font-size: .85rem; margin-bottom: 7px;">Enviar</button>
                                </div>
                            </div>
                        </div>

                        <div class="row box-first anime" id="white">
                            <!-- IMAGEM E DESCRIÇÃO DO PRODUTO -->
                            <div class="col">
                                <img src="../img/foto1.jpg" class="card-img-top img-tam margin-top-pub" alt="...">
                                <h5 class="card-title margin-top-comm">Nova camiseta, venha conferir!!!</h5>
                            </div>

                            <!-- COMENTÁRIOS -->
                            <div class="col">
                                <div>
                                    <p id="comentarioCliente1">
                                        <img src="../img/otho.png" class="rounded-circle" style="width: 33px;" alt="">
                                        Confira também nossas Camisetas e Calças na promoção!!! Segue pra mais
                                    </p>
                                    <span id="pontos"></span>
                                    <span id="mais">
                                        <p id="comentarioCliente">
                                            <img src="../img/otho.png" class="rounded-circle" style="width: 33px;" alt=""> Qual o preço?
                                        </p>
                                        <p id="comentarioCliente">
                                            <img src="../img/otho.png" class="rounded-circle" style="width: 33px;" alt="">Tem tamanho M?
                                        </p>
                                    </span>
                                    <a onclick="vermais()" id="btnVerMais">Ver mais comentários</a>
                                </div>
                            </div>

                            <!-- FEEDBACK -->
                            <div class="col">
                                <div class="card-body margin-bottom-comm">

                                    <input type="text" size="40px" class="rounded border border-secondary p-1 border-opacity-25" id="comentario">
                                    <button onclick="feedback()" class="btn btn-secondary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .35rem; --bs-btn-font-size: .85rem; margin-bottom: 7px;">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- NAVBAR A DIREITA -->
                <div class="col-sm">
                    <div class="margin-top-pub">
                        <img src="../img/logo.png" alt="logo" width="105" class="d-inline-block">
                    </div>
                    <div class="margin-top-pub" style="text-align: center;">
                        <a class="navbar-brand text-dark fw-bolder" href="index.php">
                            PG PRAIA GRANDE SHOPPING
                        </a>
                    </div>
                    <div class="margin-top-pub" id="usuario/login">
                    <?php echo "bem vindo ".$_SESSION['nome_usuario']; ?>
                        
                    </div>
                    <div>
                    
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>















