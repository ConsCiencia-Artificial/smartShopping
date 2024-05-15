<?php
session_start();
include_once('conexao.php');
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
            <a class="navbar-brand "><?php echo $_SESSION['foto_postador']; ?></a>
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

    $_SESSION['descricao'] = $descricao;
    $_SESSION['postador'] = $postador;
    $_SESSION['foto_postador'] = $foto_postador;

    $sql = "INSERT INTO post (descricao, postador, foto_postador) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$descricao, $postador, $foto_postador]);

    $conn = null;
    // Redireciona para a página de postagem
    header('Location: home.php');
    exit;
}

?>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- NAVBAR -->
            <?php include 'view/partial/index/navbar.php'; ?>


            <?php
            $sql = "SELECT * FROM post ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();



            while ($post = $stmt->fetch()) {
                $_SESSION['foto_postador'] = $post['foto_postador'];
            ?>
                <main role="main" class="col-md-9 ml-sm-auto px">
                    <div class="container-fluid">
                        <div class="card mb-4 shadow-lg rounded-top" style="max-width: 720px;">
                            <div class="row g-0 rounded-top">
                                <div class="d-flex flex-row comment-row m-t-0 align-items-center rounded-top" style="background-color: #dd163b;">
                                    <div class="p-2" id="comentarioCliente1">
                                        <img src="<?php echo $_SESSION['foto_postador']; ?>" alt="Vendedor" width="40" class="rounded-circle">
                                    </div>

                                    <div class="comment-text w-100 p-2">
                                        <h6 class="font-medium text-light"><?php echo $post['postador']; ?></h6>
                                    </div>
                                </div>
                                <div class="col-md-6 post-padd">
                                    <img src="<?php echo $post['imagem'] ?>" class="img-fluid rounded-1" alt="...">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body card-text-color">
                                        <!--título-->

                                        <div class="col">

                                            <!-- comentário -->
                                            <div class="d-flex flex-row comment-row m-t-0">
                                                <span class="m-b-15 d-block"><?php echo $post['descricao']; ?></span>
                                            </div>
                                        </div>

                                        <div class="row d-flex">
                                            <div class="col">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <h4 class="card-title">Últimos comentários</h4>
                                                    </div>

                                                    <?php
                                                    $sql = "SELECT * FROM tb_comentario ORDER BY id DESC";
                                                    $com = $conn->prepare($sql);
                                                    $com->execute();



                                                    while ($coment = $com->fetch()) {
                                                        $_SESSION['id_comentario'] = $coment['id_comentario'];
                                                        $_SESSION['comentario'] = $coment['comentario'];
                                                        $_SESSION['comentarista'] = $_SESSION['nome_usuario'];
                                                        $_SESSION['foto_comentarista'] = $coment['foto_comentarista'];


                                                    ?>
                                                        <div class="comment-widgets">
                                                            <!-- Comment Row -->
                                                            <div class="d-flex flex-row comment-row m-t-0">
                                                                <div class="p-2"><img src="<?php $_SESSION['foto_comentarista']; ?>" alt="user" width="50" class="rounded-circle"></div>
                                                                <div class="comment-text w-100">
                                                                    <h6 class="font-medium"><?php $_SESSION['comentarista']; ?></h6> <span class="m-b-15 d-block"><?php $_SESSION['comentario']; ?> </span>
                                                                    <div class="comment-footer">
                                                                        <span class="text-muted float-right">14 de Janeiro</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            if (isset($_SESSION['id_comentario']) - 1 < 3) {
                                                            ?>
                                                                <!-- Comment Row -->

                                                                <div class="d-flex flex-row comment-row">
                                                                    <div class="p-2"><img src="<?php $_SESSION['foto_comentarista']; ?>" alt="user" width="50" class="rounded-circle"></div>
                                                                    <div class="comment-text active w-100">
                                                                        <h6 class="font-medium"><?php $_SESSION['comentarista']; ?></h6>
                                                                        <span class="m-b-15 d-block"><?php $_SESSION['comentario']; ?> </span>
                                                                        <div class="comment-footer">
                                                                            <span class="text-muted float-right">Hoje, Há 2h atrás</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } else { ?>
                                                                <a onclick="vermais()" id="btnVerMais" style="text-align: center;">Carregar mais...</a>
                                                        <?php }
                                                        } ?>
                                                        </div>

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

                    <?php
                }
                    ?>
                    <!-- PUBLICAÇÃO -->

                    <!-- Teste -->


                    <!-- Fim das publicações -->
                    </div>

                </main>


        </div>
    </div>
    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>