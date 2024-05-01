<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon3.ico" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Criar Conta</title>
</head>
<body>
   <!--  -->
    <div class="login container-fluid row position-absolute top-50 start-50 translate-middle">
        <div class="col-sm"></div>
        <div class="col-sm container-fluid text-center border border-dark rounded d-flex mx-auto">
            <main class="form-signin w-100 m-auto mt-3">
                <form action="login.php" method="POST">
                    <!-- CADASTRO -->
                    <h1 class="display-4 text-dark mb-3 animated slideInDown">Cadastro</h1>

                    <div class="form-floating" style="padding-top: 1rem;">
                        
                        <label for="floatingPassword" class="position-absolute top-50 start-0 translate-middle-y">Nome de usuário</label>
                        <input type="name" class="form-control senha " id="floatingPassword" name="nome_usuario">
                    </div>
                    <div class="form-floating" style="padding-top: 1rem;">
                        
                        <label for="floatingPassword" class="position-absolute top-50 start-0 translate-middle-y">Email</label>
                        <input type="email" class="form-control senha"  id="floatingPassword" name="email_usuario">
                    </div>
                    <div class="form-floating" style="padding-top: 1rem;">
                        
                        <label for="floatingPassword" class="position-absolute top-50 start-0 translate-middle-y">Senha</label>
                        <input type="password" class="form-control senha" id="floatingPassword" name="senha_usuario">
                    </div>
                    <div class="form-floating" style="padding-top: 1rem;">
                        
                        <label for="floatingPassword" class="position-absolute top-50 start-0 translate-middle-y">Confirme sua senha</label>
                        <input type="password" class="form-control senha" id="floatingPassword" name="confsenha_usuario">
                    </div>
                    <!-- BOTÃO -->
                    <!-- Falta criar o botao de fazer cadastro do funcionario ou empresa -->
                    <div style="padding-top: 1rem;">
                    <input type="submit" class="btn btn-primary w-100 py-2 mb-4" value="Cadastrar">
                    
                    <a href="login.php" class="btn btn-primary w-100 py-2 mb-5">Voltar</a>
                    </div>
                </form>
            </main> 
        </div>
        <div class="col-sm"></div>
    </div>

    </body>
</html>


<?php
if(!empty($_POST))
{
  $nome_usuario = $_POST['nome_usuario'];
  $email_usuario = $_POST['email_usuario'];
  $senha_usuario = $_POST['senha_usuario'];
  $confsenha_usuario = $_POST['confsenha_usuario'];

  if ($senha_usuario == $confsenha_usuario){


  include_once('..\conexao.php');

  try {
    $stmt = $conn->prepare("INSERT INTO tb_cadastro_usuario(nome_usuario, email_usuario, senha_usuario, codigo) VALUES (:nome_usuario, :email_usuario, :senha_usuario, :codigo)");

    $stmt->bindParam(':nome_usuario', $nome_usuario);
    $stmt->bindParam(':email_usuario', $email_usuario);
    $stmt->bindParam(':senha_usuario', $senha_usuario);
    $stmt->bindParam(':codigo' , $codigo);

    $stmt->execute();

    echo "<script>alert('Cadastrado com Successo')</script>";

  } catch (PDOException $e) {
    echo "Erro ao cadastrar: ". $e->getMessage();
  }
  $conn = null;
}
  else{
    echo "<script>alert('As senhas não conferem')</script>";
  }}
?>