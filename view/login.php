<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PG | Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="../assets/js/login.js"></script>

  <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="../assets/css/login.css">
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
              <a class="nav-link d-grid gap-2 mt-2" href="cadastro.php">
                <button type="button" class="btn btn-outline-light">Cadastrar</button>
              </a>
              <p class="center text-light" style="padding-top: 2rem;">© Consciência Artificial, 2024</p>
            </div>
          </div>
        </div>
      </nav>
      <main role="main" class="col-md-9 ml-sm-auto px">
        <div class="box">
          <div class='box-form'>
            <div class='box-login-tab'></div>
            <div class='box-login-title align-items-center'>
              <div class='i i-login'>
                <span class="material-symbols-outlined">
                  login
                </span>
              </div>
              <h2 style="padding-top: 15px;">ENTRAR</h2>
            </div>
            <div class='box-login'>
              <form action="../app/controller/loginController.php" method="POST">
                <div class='fieldset-body' id='login_form'>
                  <button type="button" onclick="openLoginInfo();" class='b b-form i i-more' title='Mais Informações'>
                    <span class="material-symbols-outlined">
                      more_horiz
                    </span>
                  </button>
                  <p class='field'>
                    <label for='user'>E-MAIL</label>
                    <input type='text' id='user' name='email_usuario' value="<?php if (isset($dados['email_usuario'])) {
                                                                                echo $dados['email_usuario'];
                                                                              } ?>" />
                    <span id='valida' class='i i-warning'></span>
                  </p>
                  <p class='field'>
                    <label for='pass'>SENHA</label>
                    <input type='password' id='pass' name='senha_usuario' value="<?php if (isset($dados['senha_usuario'])) {
                                                                                    echo $dados['senha_usuario'];
                                                                                  } ?>" />
                    <span id='valida' class='i i-close'></span>
                  </p>
                  <?php
                  if (isset($_GET['variavel'])) {
                    $variavel = $_GET['variavel'];
                    echo $variavel;
                  }
                  ?>

                  <h6>Primeira vez aqui? <a style="color:#dd163b;" href="cadastro.php">Cadastre-se!</a></h6>

                  <input type='submit' id='do_login' name="SendLogin" value='ENTRAR' />
                </div>
              </form>
            </div>
          </div>
          <div class='box-info'>
            <p><button onclick="closeLoginInfo();" class='b b-info'>
                <span class="material-symbols-outlined" style="color:white">close</span>
              </button>
            <h3>Ajuda</h3>
            </p>
            <div class='line-wh'></div>
            <button onclick="" class='b-support'> Esqueceu a senha?</button>
            <button onclick="" class='b-support'> Contate-nos</button>
            <div class='line-wh'></div>
            <!-- <button onclick="criarconta.php" class='b-cta' title='Cadastre-se!'> CADASTRAR</button> -->
            <a type="submit" href="cadastro.php" class="b-cta text-center">Novo Cadastro</a>
          </div>
        </div>
      </main>
    </div>
  </div>
  <script src="../script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

<!-- ACESSIBILIDADE -->
<?php include 'partial/index/leitor.php'; ?>
<?php include 'partial/index/libras.php'; ?>
<script src="../assets/js/leitura.js"></script>
<script src="../assets/js/texto.js"></script>

</html>