<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PG | Login</title>
  <link rel="shortcut icon" href="..\img/logo.png" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="login.css">
  <script type="text/javascript" src="login.js"></script>
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
        <h2 style="padding-top: 15px;">ENTRAR</h2>
      </div>
      <div class='box-login'>
        <form action="" method="POST">
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

            <label class='checkbox'>
              <input type='checkbox' value='TRUE' /> Mantenha-me conectado
            </label>

            <input type='submit' id='do_login' name="SendLogin" value='ENTRAR' />
          </div>
        </form>
      </div>
    </div>
    <div class='box-info'>
      <p><button onclick="closeLoginInfo();" class='b b-info'>
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
      <a type="submit" href="cadastro.php" class="b-cta text-center">Novo Cadastro</a>
    </div>
  </div>
</body>

</html>
<?php
// EXEMPLO DE CRIPTOGRAFAR SENHA
//echo password_hash(123456, PASSWORD_DEFAULT);
?>
<?php
//'".$dados['usuario']."'
if (!empty($_POST)) {

  $email = $_POST['email_usuario'];
  $senha = $_POST['senha_usuario'];

  include_once('../conexao.php');


  $select = $conn->prepare("SELECT * FROM tb_cadastro_usuario where email_usuario='$email'and 
   senha_usuario='$senha'");
  $select->execute();

  $row = $select->fetch();


  $_SESSION["email_usuario"] = $row['email_usuario'];
  $_SESSION['nome_usuario'] = $row['nome_usuario'];
  //var_dump($_SESSION);
  $conn = null;
  // header('Location: dashboard.php');
  if (isset($_SESSION['email_usuario'])) {
    $email = $_SESSION['email_usuario'];
    // IR PARA DASHBOARD
    header("location: ../index.php");
  } else {
    header("location:../index.php");
    exit;
  }
}
?>