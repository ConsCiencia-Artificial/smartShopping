<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG | Cadastro</title>
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../assets/css/login.css">
    <script type="text/javascript" src="../assets/js/cadastro.js"></script>
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
                            <p class="text-light fw-bolder mt-3">PRAIA GRANDE SHOPPING</p>

                            <!-- Verificar se está logado -->

                            <a class="nav-link d-grid gap-2 mt-2" href="../index.php">
                                <button type="button" class="btn btn-outline-light">Início</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2" href="#">
                                <button type="button" class="btn btn-outline-light">Pesquisar</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2" href="#">
                                <button type="button" class="btn btn-outline-light">Sobre</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2" href="#">
                                <button type="button" class="btn btn-outline-light">Contatos</button>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto px">
                <div class="box">
                    <div class="box-form">
                        <div class="box-login-tab"></div>
                        <div class="box-login-title align-items-center">
                            <div class="i i-login">
                                <span class="material-symbols-outlined">
                                    login
                                </span>
                            </div>
                            <h2 style="padding-top: 15px;">CADASTRAR</h2>
                        </div>
                        <div class="box-login">
                            <form action="../app/controller/cadastro_cliente.php" method="POST">
                                <div class="fieldset-body" id="login_form">
                                    <button type="button" onclick="openLoginInfo();" class="b b-form i i-more" title="Mais Informações">
                                        <span class="material-symbols-outlined">
                                            more_horiz
                                        </span>
                                    </button>

                                    <p class="field">
                                        <label for="user">NOME DO FUNCIONÁRIO</label>
                                        <input type="text" id="floatingName" name="nome_usuario">
                                    </p>
                                    <p class="field">
                                        <label for="user">EMAIL</label>
                                        <input type="text" id="floatingEmail" name="email_usuario" value="<?php if (isset($dados["email_usuario"])) {
                                                                                                                echo $dados["email_usuario"];
                                                                                                            } ?>">
                                    </p>
                                    <p class="field">
                                        <label for="user">SENHA CORPORATIVA</label>
                                        <input type="password" id="floatingPassword" name="senha_usuario" <?php if (isset($dados["senha_usuario"])) {
                                                                                                                echo $dados["senha_usuario"];
                                                                                                            } ?>>
                                    </p>
                                    <p class="field">
                                        <label for="user">CONFIRMAÇÃO DE SENHA</label>
                                        <input type="password" id="floatingPasswordConfirmation" name="confsenha_usuario">
                                    </p>

                                    <input type="submit" id="do_login" name="SendLogin" value="CADASTRAR" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="box-info">
                        <p><button onclick="closeLoginInfo();" class="b b-info">
                                <span class="material-symbols-outlined" style="color:white">
                                    close
                                </span>
                            </button>
                        <h3>Ajuda</h3>
                        </p>
                        <div class="line-wh"></div>
                        <button onclick="" class="b-support"> Esqueceu a senha?</button>
                        <button onclick="" class="b-support"> Contate-nos</button>
                        <div class="line-wh"></div>
                        <a type="submit" href="login_empresa.php" class="b-cta text-center">Voltar</a>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>

<?php
