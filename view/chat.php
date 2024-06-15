<?php
session_start();
ob_start();
include_once('../app/controller/conexao.php');
if (!$_SESSION['email_usuario']) {
    header("Location:../view/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG Shopping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />

    <link rel="stylesheet" href="../assets/css/chat.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Piazzolla:ital,opsz,wght@0,8..30,100..900;1,8..30,100..900&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <?php include 'partial/index/index_style.php'; ?>
</head>

<body style="background-image: url(../assets/img/pgs-rep.png)">
    <div class="container-fluid">
        <div class="row">
            <!-- NAVBAR -->
            <nav class="col-md-2 d-none d-md-block sidebar" style="background-color: #dd163b;">
                <div class="sidebar-sticky">
                    <div class="row">
                        <div class="col-sm center">
                            <!-- NAVBAR -->
                            <?php
                            if (!empty($_SESSION['email_usuario'])) {
                            ?>
                                <a href="perfil.php"><img src="<?php echo '../' . $_SESSION['imagem']; ?>" width="105" class="img-fluid margin-top-comm"></a>
                            <?php } else { ?>

                                <a href="../index.php"><img src="../assets/img/logo.png" alt="logo" width="105" class="img-fluid margin-top-comm"></a>

                            <?php }
                            if (!empty($_SESSION['email_usuario'])) {
                            ?>
                                <p class="text-light fw-bolder mt-3" style="text-transform: uppercase;"><?php echo $_SESSION['nome_usuario']; ?></p>
                            <?php } else { ?>
                                <p class="text-light fw-bolder mt-3">PRAIA GRANDE SHOPPING</p>
                            <?php } ?>

                            <a class="nav-link d-grid gap-2 mt-2" href="../index.php">
                                <button type="button" class="btn btn-outline-light">Início</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2 disable">
                                <button type="button" class="btn btn-outline-light disabled">Conversas</button>
                            </a>

                            <!-- Verificar se está logado -->
                            <?php
                            // var_dump($_SESSION); die;
                            if (!empty($_SESSION['email_usuario'])) {
                            ?>
                                <div class="nav-link d-grid gap-2 mt-2 dropdown">
                                    <button class="btn btn-outline-light dropdown-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Postagens
                                    </button>
                                    <ul class="dropdown-menu center" style="--bs-dropdown-min-width: 100% !important;">
                                        <li><a class="dropdown-item" href="home.php">Nova Postagem</a></li>
                                        <li><a class="dropdown-item" href="produto.php">Novo Produto</a></li>
                                    </ul>
                                </div>
                                <a class="nav-link d-grid gap-2 mt-2" href="perfil.php">
                                    <button type="button" class="btn btn-outline-light">Perfil</button>
                                </a>
                                <a class="nav-link d-grid gap-2 mt-2" href="app/controller/sair.php">
                                    <button type="submit" class="btn btn-outline-light">Sair</button>
                                </a>
                            <?php } else { ?>
                                <a class="nav-link d-grid gap-2 mt-2" href="view/login.php">
                                    <button type="button" class="btn btn-outline-light">Entrar</button>
                                </a>
                            <?php } ?>
                            <p class="center text-light" style="padding-top: 2rem;">© Consciência Artificial, 2024</p>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- CHAT -->
            <main role="main" class="col ml-sm-auto px padding">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-10">
                            <div class="card chat-app">
                                <div id="plist" class="people-list">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Pesquisar...">
                                    </div>
                                    <ul class="list-unstyled chat-list mt-2 mb-0">
                                        <li class="clearfix active">
                                            <img src="https://c.pxhere.com/photos/e7/9f/woman_shopping_happy_bags_dresses_satisfied_portrait_brunette-1335278.jpg!d" height="46px" width="46px" alt="avatar">
                                            <div class="about">
                                                <div class="name">Alice Silva</div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <img src="https://th.bing.com/th/id/R.9d82caf24aaa50a54b216064b8404119?rik=DvGUGwojEEW0fQ&pid=ImgRaw&r=0" height="46px" width="46px" alt="avatar">
                                            <div class="about">
                                                <div class="name">Lucas Silva</div>
                                                <div class="status"> <i class="fa fa-circle online"></i> Online </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="chat">
                                    <div class="chat-header clearfix">
                                        <div class="row">
                                            <div class="col-lg-6 justify-content-start">
                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                                    <img src="https://c.pxhere.com/photos/e7/9f/woman_shopping_happy_bags_dresses_satisfied_portrait_brunette-1335278.jpg!d" height="46px" width="46px" alt="avatar">
                                                </a>
                                                <div class="chat-about">
                                                    <h6 class="m-b-0">Alice Silva - Roupas Mágicas</h6>
                                                    <small>Offline</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-history">
                                        <h3 class="center" style="padding-bottom: 2%;">Hoje</h3>
                                        <ul class="m-b-0">
                                            <li class="clearfix">
                                                <div class="message other-message float-right"> Olá bom dia, gostaria de saber se ainda tem disponível do meu tamanho? </div>
                                            </li>
                                            <li class="clearfix">
                                                <div class="message-data">
                                                    <span class="message-data-time">10:12, Hoje</span>
                                                </div>
                                                <div class="message my-message">Olá, bom dia, gostaria de verificar o tamanho de qual produto?</div>
                                            </li>
                                            <li class="clearfix">
                                                <div class="message-data">
                                                    <span class="message-data-time">10:15, Hoje</span>
                                                </div>
                                                <div class="message my-message">Posso verificar no estoque.</div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="chat-message clearfix">
                                        <div class="input-group mb-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-send"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter text here...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

<!-- ACESSIBILIDADE -->
<?php include 'partial/index/leitor.php'; ?>
<?php include 'partial/index/libras.php'; ?>
<script src="../assets/js/leitura.js"></script>
<script src="../assets/js/texto.js"></script>

<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>