<?php
session_start();
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
</head>

<body>

<div class='box'>
  <div class='box-form'>
    <div class='box-login-tab'></div>
    <div class='box-login-title align-items-center'>
      <div class='i i-login'></div>
      <h2 style="padding-top: 12px;">ENTRAR</h2>
    </div>
    <div class='box-login'>
    <form action="" method="POST">
      <div class='fieldset-body' id='login_form'>
        <button onclick="openLoginInfo();" class='b b-form i i-more' title='Mais Informações'></button>
        <p class='field'>
          <label for='user'>E-MAIL</label>
          <input type='text' id='user' name='email_usuario' title='Email' value="<?php if(isset($dados['email_usuario'])){ echo $dados['email_usuario'];}?>" />
          <span id='valida' class='i i-warning'></span>
        </p>
        <p class='field'>
          <label for='pass'>SENHA</label>
          <input type='password' id='pass' name='senha_usuario' title='Senha' value="<?php if(isset($dados['senha_usuario'])){ echo $dados['senha_usuario'];}?>" />
          <span id='valida' class='i i-close'></span>
        </p>

        <label class='checkbox'>
          <input type='checkbox' value='TRUE' title='Mantenha-me conectado' /> Mantenha-me conectado
        </label>

        <input type='submit' id='do_login' name="SendLogin" value='ENTRAR' title='Entrar' />
      </div>
      </form>
    </div>
  </div>
  <div class='box-info'>
    <p><button onclick="closeLoginInfo();" class='b b-info i i-left' title='Volta ao Login'></button>
    <h3>Ajuda</h3>
    </p>
    <div class='line-wh'></div>
    <button onclick="" class='b-support' title='Esqueci a senha'> Esqueceu a senha?</button>
    <button onclick="" class='b-support' title='Caontate-nos'> Contate-nos</button>
    <div class='line-wh'></div>
    <!-- <button onclick="criarconta.php" class='b-cta' title='Cadastre-se!'> CADASTRAR</button> -->
    <a type="submit" href="criarconta.php" class="b-cta" title='Cadastre-se!'>CADASTRAR</a>
  </div>
</div>

   
    <script type="text/javascript" src="login.js"></script>
</body>

</html>
<?php
// EXEMPLO DE CRIPTOGRAFAR SENHA
//echo password_hash(123456, PASSWORD_DEFAULT);
?>
<?php



//'".$dados['usuario']."'
if (!empty($_POST)) 
{	
    
    $email = $_POST['email_usuario'];
    $senha = $_POST['senha_usuario'];

   include_once('../conexao.php');

   
   $select = $conn->prepare("SELECT * FROM tb_cadastro_usuario where email_usuario='$email'and 
   senha_usuario='$senha'");
   $select->execute();
 
   $row = $select->fetch();
   
      
       $_SESSION["email_usuario"]= $row['email_usuario'];
       $_SESSION['nome_usuario']= $row['nome_usuario'];
      //var_dump($_SESSION);
      $conn = null;
       // header('Location: dashboard.php');
       if(isset($_SESSION['email_usuario'])){
        $email = $_SESSION['email_usuario'];
        header("location: dashboard" );
      }
      else{
        header("location:../index.php");
        exit;	
      }
}
?>