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
</head>

<body style="background-image: url(../assets/img/pgs-rep.png)">
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
                            <label for="user">NOME DE USUÁRIO</label>
                            <input type="text" id="floatingName" name="nome_usuario">
                        </p>
                        <p class="field">
                            <label for="user">EMAIL</label>
                            <input type="text" id="floatingEmail" name="email_usuario"
                            value="<?php if (isset($dados["email_usuario"])) {echo $dados["email_usuario"];} ?>">
                        </p>
                        <p class="field">
                            <label for="user">SENHA</label>
                            <input type="password" id="floatingPassword" name="senha_usuario"
                            <?php if (isset($dados["senha_usuario"])) {echo $dados["senha_usuario"];} ?>>
                        </p>
                        <p class="field">
                            <label for="user">CONFIRME SUA SENHA</label>
                            <input type="password" id="floatingPasswordConfirmation" name="confsenha_usuario" >
                        </p>

                        <input type="submit" id="do_login" name="SendLogin" value="CADASTRAR" />
                    </div>
                </form>
            </div>
        </div>
        <div class="box-info">
            <p><button onclick="closeLoginInfo();" class="b b-info">
                    <span class="material-symbols-outlined">
                        close
                    </span>
                </button>
            <h3>Ajuda</h3>
            </p>
            <div class="line-wh"></div>
            <button onclick="" class="b-support"> Esqueceu a senha?</button>
            <button onclick="" class="b-support"> Contate-nos</button>
            <div class="line-wh"></div>
            <a type="submit" href="login.php" class="b-cta text-center">Voltar</a>
        </div>
    </div>
</body>

</html>

<?php