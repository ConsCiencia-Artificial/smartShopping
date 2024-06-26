<?php
session_start();
include_once '../app/controller/conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/perfil.js"></script>
    <script type="text/javascript" src="../assets/js/mais.js"></script>

    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="../assets/css/perfil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Piazzolla:ital,opsz,wght@0,8..30,100..900;1,8..30,100..900&display=swap" rel="stylesheet">
</head>

<body style="background-image: url(../assets/img/pgs-rep.png)">
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar" style="background-color: #dd163b;">
                <div class="sidebar-sticky">
                    <div class="row">
                        <div class="col-sm center">
                            <!-- NAVBAR -->
                            <a href="../index.php"><img src="../assets/img/logo.png" alt="logo" width="105" class="img-fluid margin-top-comm"></a>

                            <?php
                            if (!empty($_SESSION['email_usuario'])) {
                            ?>
                                <p class="text-light fw-bolder mt-3" style="text-transform: uppercase;"><?php echo $_SESSION['nome_usuario']; ?></p>
                            <?php } else { ?>
                                <p class="text-light fw-bolder mt-3">PRAIA GRANDE SHOPPING</p>
                            <?php } ?>

                            <!-- Verificar se está logado -->

                            <a class="nav-link d-grid gap-2 mt-2" href="../index.php">
                                <button type="button" class="btn btn-outline-light">Início</button>
                            </a>
                            <!-- Verificar se está logado -->
                            <?php
                            // var_dump($_SESSION); die;
                            if (!empty($_SESSION['email_usuario'])) {
                            ?>
                                <a class="nav-link d-grid gap-2 mt-2" href="chat.php">
                                    <button type="button" class="btn btn-outline-light">Conversas</button>
                                </a>
                                <div class="nav-link d-grid gap-2 mt-2 dropdown">
                                    <button class="btn btn-outline-light dropdown-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Postagens
                                    </button>
                                    <ul class="dropdown-menu center" style="--bs-dropdown-min-width: 100% !important;">
                                        <li><a class="dropdown-item" href="home.php">Nova Postagem</a></li>
                                        <li><a class="dropdown-item" href="produto.php">Novo Produto</a></li>
                                    </ul>
                                </div>
                                <a class="nav-link d-grid gap-2 mt-2 disable">
                                    <button type="button" class="btn btn-outline-light disabled">Perfil</button>
                                </a>
                                <a class="nav-link d-grid gap-2 mt-2" href="../app/controller/sair.php">
                                    <button type="submit" class="btn btn-outline-light">Sair</button>
                                </a>
                            <?php } elseif (!empty($_SESSION['email_funcionario'])) {

                            ?>
                                <a class="nav-link d-grid gap-2 mt-2" href="chat.php">
                                    <button type="button" class="btn btn-outline-light">Conversas</button>
                                </a>
                                <div class="nav-link d-grid gap-2 mt-2 dropdown">
                                    <button class="btn btn-outline-light dropdown-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Postagens
                                    </button>
                                    <ul class="dropdown-menu center" style="--bs-dropdown-min-width: 100% !important;">
                                        <li><a class="dropdown-item" href="home.php">Nova Postagem</a></li>
                                        <li><a class="dropdown-item" href="produto.php">Novo Produto</a></li>
                                    </ul>
                                </div>
                                <a class="nav-link d-grid gap-2 mt-2 disable">
                                    <button type="button" class="btn btn-outline-light disabled">Perfil</button>
                                </a>
                                <a class="nav-link d-grid gap-2 mt-2" href="../app/controller/sair.php">
                                    <button type="submit" class="btn btn-outline-light">Sair</button>
                                </a>



                            <?php
                            } else { ?>
                                <a class="nav-link d-grid gap-2 mt-2" href="login.php">
                                    <button type="button" class="btn btn-outline-light">Entrar</button>
                                </a>
                            <?php } ?>
                            <p class="center text-light" style="padding-top: 2rem;">© Consciência Artificial, 2024</p>
                        </div>
                    </div>
                </div>
            </nav>
            <main role="main" class="col-md-9 ms-md-auto px">
                <div class="padding padding-left center">
                    <div class="col-md-10">
                        <!-- Column -->
                        <div class="card">
                            <img class="img-cov" src="https://i.imgur.com/K7A78We.jpg" alt="Plano de Fundo do Usuário" style="height: 15rem;">
                            <div class="card-body little-profile text-center">
                                <div class="pro-img">
                                    <?php
                                    if (!empty($_SESSION['imagem'])) {
                                    ?>
                                        <img src="<?php echo '../' . $_SESSION['imagem'];  ?>" width="128" class="img-radius" alt="User-Profile-Image">
                                    <?php } else { ?>
                                        <img src="../assets/img/default-icon.jpg" width="128" class="img-radius" alt="User-Profile-Image">
                                    <?php } ?>
                                </div>
                                <h2 class="m-b-0">
                                    <?php if (!empty($_SESSION['email_usuario'])) {
                                        echo $_SESSION['nome_usuario'];
                                    } elseif ($_SESSION['nm_funcionario']) {


                                        echo $_SESSION['nm_funcionario'];
                                    } ?>
                                </h2>
                                <h4>Conheça uma variedade de produtos!</h4>
                                <!-- IF e ELSE para caso o funcionário seja a loja ou um usuário comum -->
                                <?php
                                if (!empty($_SESSION['email_funcionario'])) {
                                ?>
                                    <a class="m-t-10 waves-effect waves-dark btn b-cta btn-md btn-rounded" data-abc="true" href="config.php">Configurar</a>
                                <?php } else { ?>
                                    <a class="m-t-10 waves-effect waves-dark btn b-cta btn-md btn-rounded" data-abc="true">Seguir</a>
                                <?php } ?>

                                <div class="row text-center m-t-20">
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <?php
                                        //
                                        if (!empty($_SESSION['email_usuario'])) {

                                            $sql = "SELECT COUNT(*) AS total_posts FROM post WHERE postador = :nome_usuario";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bindValue(':nome_usuario', $_SESSION['nome_usuario']); // Substitua pelo nome de usuário desejado
                                            $stmt->execute();

                                            // Obtém o resultado
                                            $resultado = $stmt->fetch();

                                            // Exibe o total de posts
                                            if (!isset($_SESSION['postador'])) {
                                                echo '<h2 class="m-b-0 font-light">' . $resultado['total_posts'];
                                                '</h2>';
                                            } else {
                                                echo '<h2 class="m-b-0 font-light"> 0  </h2>';
                                            }
                                        } elseif ($_SESSION['nm_funcionario']) {

                                            $sql = "SELECT COUNT(*) AS total_posts FROM post WHERE postador = :nm_funcionario";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bindValue(':nm_funcionario', $_SESSION['nm_funcionario']); // Substitua pelo nome de usuário desejado
                                            $stmt->execute();

                                            // Obtém o resultado
                                            $resultado = $stmt->fetch();

                                            // Exibe o total de posts
                                            if (!isset($_SESSION['postador'])) {
                                                echo '<h2 class="m-b-0 font-light">' . $resultado['total_posts'];
                                                '</h2>';
                                            } else {
                                                echo '0';
                                            }
                                        }

                                        ?>
                                        <h5>Postagens</h5>
                                    </div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h2 class="m-b-0 font-light">0</h2>
                                        <h5>Seguidores</h5>
                                    </div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h2 class="m-b-0 font-light">0</h2>
                                        <h5>Seguindo</h5>
                                    </div>
                                </div>
                            </div><!--
                            <div class="TabControl">
                                <div id="header">
                                    <ul style="list-style-type:none" class="abas">
                                        <div class="row">
                                            <li class="col-sm" style="padding: 0; cursor: pointer;">
                                                <div class="aba">
                                                    <span>Produtos</span>
                                                </div>
                                                
                                            </li>
                                            
                                            <li class="col-sm" style="padding: 0; cursor: pointer;">
                                                <div class="aba">
                                                    <span>Funcionários</span>
                                                </div>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                                <div id="content">
                                    <div class="conteudo">
                                        
                                        <?php /*
                                        if (!isset($_SESSION['nm_produto'])) {
                                            echo "Sem produtos cadastrados";
                                        } else {
                                            echo $_SESSION['nm_produto'];
                                        }*/
                                        ?>
                                    </div>
                                    <div class="conteudo">
                                        
                                        <?php /*
                                        if (!isset($_SESSION['nm_funcionario'])) {
                                            echo "Sem funcionários cadastrados";
                                        } else {
                                            echo $_SESSION['nm_funcionario'];
                                        }*/
                                        ?>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

<!-- ACESSIBILIDADE -->
<?php include 'partial/index/leitor.php'; ?>
<?php include 'partial/index/libras.php'; ?>
<script src="../assets/js/leitura.js"></script>
<script src="../assets/js/texto.js"></script>

</html>