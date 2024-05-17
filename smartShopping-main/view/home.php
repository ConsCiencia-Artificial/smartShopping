<?php
session_start();
include_once '../app/controller/conexao.php';
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
<header>
    <nav class="navbar bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand "><?php echo $_SESSION['postador']; ?></a>
        <form class="d-flex" role="search" method="POST">
        <input class="form-control me-2" style="width: 25rem" type="text" placeholder="Qual seu próximo sucesso de vendas?" aria-label="publicação" name="descricao">

        <button class="btn btn-outline-danger" type="submit">Postar</button>
        </form>
    </div>
    </nav>
</header>
<?php




if (!empty($_POST)) {



    $descricao = $_POST['descricao'];
    $postador = $_SESSION['nome_usuario'];
    $foto_postador = $_SESSION['imagem'];

    $sql = "INSERT INTO post (descricao, postador, foto_postador) VALUES (?, ?, ?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$descricao, $postador, $foto_postador]);

    
	 
    $_SESSION['descricao'] = $descricao;
    $_SESSION['postador'] = $postador;

    $conn=null;
    // Redireciona para a página de postagem
    header('Location: home.php');
    exit;
}

?>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar" style="background-color: #dd163b;">
                <div class="sidebar-sticky">
                    <div class="row">
                        <div class="col-sm center">
                            <!-- NAVBAR -->
                            <img src="../img/logo.png" alt="logo" width="105" class="img-fluid margin-top-comm">
                            <p class="text-light fw-bolder mt-3">PRAIA GRANDE SHOPPING</p>

                            <!-- Adicionar "href" -->
                            <a class="nav-link d-grid gap-2 mt-2" href="sair.php">
                                <button type="button" class="btn btn-outline-light">Logout</button>
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
                        </div>
                    </div>
                </div>
            </nav>

            <?php
            $sql = "SELECT * FROM post ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            while ($post = $stmt->fetch()) {
                $_SESSION['postador']=$post['postador'];
                
            ?>
            <main role="main" class="col-md-9 ml-sm-auto px">
                <div class="container-fluid">
                    <div class="card mb-4 shadow-lg rounded-top" style="max-width: 720px;">
                        <div class="row g-0 rounded-top">
                            <div class="d-flex flex-row comment-row m-t-0 align-items-center rounded-top" style="background-color: #dd163b;">
                                <div class="p-2" id="comentarioCliente1">
                                    <img src="<?php echo $post['foto_postador']; ?>" alt="Vendedor" width="40" class="rounded-circle">
                                </div>
                                <div class="comment-text w-100 p-2">
                                    <h6 class="font-medium text-light"><?php echo $post['postador']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-6 post-padd">
                                <img src="<?php echo $post['img_post'] ?>" class="img-fluid rounded-1" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body card-text-color">
                                    <!--título-->
                                    <div class="col">
                                        <!-- comentário -->
                                        <div class="d-flex flex-row comment-row m-t-0">
                                            <span class="m-b-15 d-block"><?php echo $post['descricao']; ?></span>
                                        </div>

                                        <div class="row d-flex">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <h4 class="card-title">Últimos comentários</h4>
                                                </div>
                                                <div class="comment-widgets">
                                                    <!-- Comment Row  acoplamento-->
                                                    <div class="d-flex flex-row comment-row m-t-0">
                                                        <div class="p-2"><img src="https://i.imgur.com/Ur43esv.jpg" alt="user" width="50" class="rounded-circle"></div>
                                                        <div class="comment-text w-100">
                                                            <h6 class="font-medium">Fernando Alves</h6> <span class="m-b-15 d-block">Ainda tem no estoque? </span>
                                                            <div class="comment-footer">
                                                                <span class="text-muted float-right">14 de Janeiro</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
            </main>
            <?php
            }
            ?>

                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2"><img src="https://i.imgur.com/8RKXAIV.jpg" alt="user" width="50" class="rounded-circle"></div>
                            <div class="comment-text active w-100">
                                <h6 class="font-medium">Diego Andrade</h6>
                                <span class="m-b-15 d-block">Tem na cor laranja? </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">Hoje, Há 2h atrás</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a onclick="vermais()" id="btnVerMais" style="text-align: center;">Carregar mais...</a>
                    <!-- Card -->
                </div>
            </div>
            </div>
            <!-- FEEDBACK -->


            <div class="col">
                <div class="card-body">
                    <input type="text" class="rounded border border-secondary p-1 border-opacity-25" id="comentario" size="20px">
                    <button onclick="feedback()" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .35rem; --bs-btn-font-size: .85rem; margin-bottom: 7px;">Enviar</button>
                </div>
            </div>
            </div>
            <p class="card-text"><small class="text-muted"></small></p>
            </div>
            </div>
            </div>


            <!-- PUBLICAÇÃO -->

                    <!-- Teste -->


            <!-- Fim das publicações -->
                </div>

            </main>


</div>
</div>
</body>
<script src="../script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>















