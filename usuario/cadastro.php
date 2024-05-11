<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG | Cadastro</title>
    <link rel="shortcut icon" href="..\img/logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="login.css">
    <script type="text/javascript" src="cadastro.js"></script>

</head>

<!-- <body>
    <div class="login container-fluid row position-absolute top-50 start-50 translate-middle">
        <div class="col-sm"></div>
        <div class="col-sm container-fluid text-center border border-dark rounded d-flex mx-auto">
            <main class="form-signin w-100 m-auto mt-3">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h1 class="display-4 text-dark mb-3 animated slideInDown">Cadastro</h1>

                    <div class="form-floating" style="padding-top: 1rem;">

                        <label for="floatingPassword" class="position-absolute top-50 start-0 translate-middle-y">Nome de usuário</label>
                        <input type="name" class="form-control senha " id="floatingPassword" name="nome_usuario">
                    </div>
                    <div class="form-floating" style="padding-top: 1rem;">

                        <label for="floatingPassword" class="position-absolute top-50 start-0 translate-middle-y">Email</label>
                        <input type="email" class="form-control senha" id="floatingPassword" name="email_usuario">
                    </div>
                    <div class="form-floating" style="padding-top: 1rem;">

                        <label for="floatingPassword" class="position-absolute top-50 start-0 translate-middle-y">Senha</label>
                        <input type="password" class="form-control senha" id="floatingPassword" name="senha_usuario">
                    </div>
                    <div class="form-floating" style="padding-top: 1rem;">

                        <label for="floatingPassword" class="position-absolute top-50 start-0 translate-middle-y">Confirme sua senha</label>
                        <input type="password" class="form-control senha" id="floatingPassword" name="confsenha_usuario">
                    </div>
                    <div style="padding-top: 1rem;">
                        <input type="submit" class="btn btn-primary w-100 py-2 mb-4" value="Cadastrar">
                        <a href="login.php" class="btn btn-primary w-100 py-2 mb-5">Voltar</a>
                    </div>
                </form>
            </main>
        </div>
        <div class="col-sm"></div>
    </div>
</body> -->


<body style="background-image: url(../img/pgs-rep.png)">
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
                <form action="" method="POST">
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
                            <input type="text" id="floatingEmail" name="email_usuario">
                        </p>
                        <p class="field">
                            <label for="user">SENHA</label>
                            <input type="password" id="floatingPassword" name="senha_usuario">
                        </p>
                        <p class="field">
                            <label for="user">CONFIRME SUA SENHA</label>
                            <input type="password" id="floatingPasswordConfirmation" name="confsenha_usuario">
                        </p>
                        <!-- ORIGINAL
            <p class="field">
              <label for="user">E-MAIL</label>
              <input type="text" id="user" name="email_usuario" value="<?php if (isset($dados["email_usuario"])) {
                                                                            echo $dados["email_usuario"];
                                                                        } ?>" />
              <span id="valida" class="i i-warning"></span>
            </p>
            <p class="field">
              <label for="pass">SENHA</label>
              <input type="password" id="pass" name="senha_usuario" value="<?php if (isset($dados["senha_usuario"])) {
                                                                                echo $dados["senha_usuario"];
                                                                            } ?>" />
              <span id="valida" class="i i-close"></span>
            </p> -->

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
            <!-- <button onclick="criarconta.php" class="b-cta" title="Cadastre-se!"> CADASTRAR</button> -->
            <a type="submit" href="login.php" class="b-cta text-center">Voltar</a>
        </div>
    </div>
</body>

</html>

<?php
if (!empty($_POST)) {
    $nome_usuario = $_POST["nome_usuario"];
    $email_usuario = $_POST["email_usuario"];
    $senha_usuario = md5($_POST["senha_usuario"]);
    // $cep_usuario = $_POST["cep_usuario"];
    // $end_usuario = $_POST["end_usuario"];
    // $num_usuario = $_POST["num_usuario"];
    // $cidade_usuario = $_POST["cidade_usuario"];
    // $tel_usuario = $_POST["tel_usuario"];
    // $foto_usuario = "";






    include_once("..\conexao.php");

    try {
        $stmt = $conn->prepare("INSERT INTO tb_cadastro_usuario(codigo, nome_usuario, email_usuario, senha_usuario) VALUES (:codigo, :nome_usuario, :email_usuario, :senha_usuario)");

        $stmt->bindParam(":nome_usuario", $nome_usuario);
        $stmt->bindParam(":email_usuario", $email_usuario);
        $stmt->bindParam(":senha_usuario", $senha_usuario);
        $stmt->bindParam(":codigo", $codigo);

        $stmt->execute();
        /*
    if(isset($_FILES["FOTOA"])){

        $arquivo = $_FILES["FOTOA"]["name"];
        //diretorio dos arquivos
        $pasta_dir = "images/arquivosACIDENTES/";
        // Faz o upload da imagem
        $arquivo_nome = $pasta_dir . $arquivo;
        //salva no banco
        move_uploaded_file($_FILES["FOTOA"]["tmp_name"], $arquivo_nome);

        $query  = "Insert into acidentes (IMAGEM) values ("$arquivo_nome")";
        mysqli_query($strcon,$query) or die("Erro ao tentar cadastrar imagem" . mysqli_error($strcon));
    }
*/
        echo "<script>alert(Cadastrado com Successo)</script>";

        // Mensagem de erro ao tentar ir até a página de Login novamente
        // header("location: login.php");
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
    $conn = null;
}
?>
