<?php
session_start();
ob_start();
include_once '../conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PG | Praia Grande Shopping</title>
  <link rel="shortcut icon" href="img/favicon3.ico" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
  <script src="https://code.jquery.com/jquery-1.9.1.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

  <div class='box'>
    <div class='box-form'>
      <div class='box-login-tab'></div>
      <div class='box-login-title align-items-center'>
        <div class='i i-login'>
          <span class="material-symbols-outlined">
            login
          </span>
        </div>
        <h2 style="padding-top: 14px;">ENTRAR</h2>
      </div>
      <div class='box-login'>
        <div class='fieldset-body' id='login_form'>
          <button onclick="openLoginInfo();" class='b b-form i i-more' title='Mais Informações'>
            <span class="material-symbols-outlined">more_horiz</span>
          </button>
          <p class='field'>
            <label for='user'>E-MAIL</label>
            <input type='text' id='user' name='user' />
            <span id='valida' class='i i-warning'></span>
          </p>
          <p class='field'>
            <label for='pass'>SENHA</label>
            <input type='password' id='pass' name='pass' />
            <span id='valida' class='i i-close'></span>
          </p>

          <label class='checkbox'>
            <input type='checkbox' value='TRUE' /> Mantenha-me conectado
          </label>

          <input type='submit' id='do_login' value='ENTRAR' />
        </div>
      </div>
    </div>
    <div class='box-info'>
      <p>
        <button onclick="closeLoginInfo();" class='b b-info' title='Fechar'>
          <span class="material-symbols-outlined">
            close
          </span>
        </button>
      <h3>Ajuda</h3>
      </p>
      <div class='line-wh'></div>
      <button onclick="" class='b-support'> Esqueceu a senha?</button>
      <button onclick="" class='b-support'> Contate-nos</button>
      <div class='line-wh'></div>
      <!-- <button onclick="criarconta.php" class='b-cta' title='Cadastre-se!'> CADASTRAR</button> -->
      <a type="submit" href="criarconta.php" class="b-cta">CADASTRAR</a>
    </div>
  </div>

  <?php
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  ?>
  <!-- ANTIGO LOGIN

        <div class="login container-fluid row position-absolute top-50 start-50 translate-middle">
        <div class="col-sm"></div>
        <div class="col-sm container-fluid text-center border border-dark rounded d-flex mx-auto">
            <main class="form-signin w-100 m-auto mt-5">
                <form action="dashboard.php" method="POST">
                    <h1 class="display-4 text-dark mb-3 animated slideInDown">Login</h1>
                    
                    <div class="form-floating" style="padding-top: 2rem;">
                        <input type="email" class="form-control senha" id="floatingInput" placeholder="name@example.com" name="email_usuario" value="<?php if (isset($dados['email_usuario'])) {
                                                                                                                                                        echo $dados['email_usuario'];
                                                                                                                                                      } ?>">
                        <label for="floatingInput" style="padding-top: 3rem;">Email</label>
                    </div>
                    <div class="form-floating" style="padding-top: 2rem;">
                        <input type="password" class="form-control senha" id="floatingPassword" placeholder="Password" name="senha_usuario" value="<?php if (isset($dados['senha_usuario'])) {
                                                                                                                                                      echo $dados['senha_usuario'];
                                                                                                                                                    } ?>">
                        <label for="floatingPassword" style="padding-top: 3rem;">Senha</label>
                    </div>
                    <div style="padding-top: 2rem;">
                        <input class="btn btn-primary w-100 py-2 mb-4" href="" type="submit" name="SendLogin" value="Logar">
                        <a type="submit" href="criarconta.php" class="btn btn-primary w-100 py-2 mb-5">Criar conta</a>
                    </div>
                </form>
            </main>
        </div>
        <div class="col-sm"></div>
    </div> -->
  <script type="text/javascript" src="login.js"></script>
</body>

</html>
<?php
// EXEMPLO DE CRIPTOGRAFAR SENHA
//echo password_hash(123456, PASSWORD_DEFAULT);
?>
<?php



//'".$dados['usuario']."'
if (!empty($dados['SendLogin'])) {


  //var_dump($dados);
  //                                             TEM PORRA ERRADA AQUI kkkkkkkk JA ARRUMEI 
  $query_usuario = "SELECT codigo, nome_usuario, email_usuario, senha_usuario 
    FROM tb_cadastro_usuario 
    WHERE email_usuario = :email_usuario
    LIMIT 1";


  $result_usuario = $conn->prepare($query_usuario);
  $result_usuario->bindParam(':email_usuario', $dados['email_usuario'], PDO::PARAM_STR);
  $result_usuario->execute();

  isset($_SESSION['codigo'], $_SESSION['nome_usuario']);

  if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
    var_dump($row_usuario);
    if (password_verify($dados['senha_usuario'], $row_usuario['senha_usuario'])) {
      $_SESSION['codigo'] = $row_usuario['codigo'];
      $_SESSION['nome_usuario'] = $row_usuario['nome_usuario'];
      header("Location: dashboard.php");
    }
  } else {
    $_SESSION['msg'] = "<p style='color: #ff0000'> Error: Usuário ou senha invalida! </p>";
  }
}
if (isset($_SESSION['msg'])) {
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}
?>