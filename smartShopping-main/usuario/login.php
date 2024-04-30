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
    <link rel="stylesheet" href="../style.css">
</head>
<body>
   
<!-- Página de Login -->
<div class="login container-fluid row position-absolute top-50 start-50 translate-middle">
<div class="col-sm"></div>
    <div class="col-sm container-fluid text-center border border-dark rounded d-flex mx-auto">
        <main class="form-signin w-100 m-auto mt-5">
            <form action="" method="POST">
                <h1 class="display-4 text-dark mb-3 animated slideInDown">Login</h1>
                <!-- LOGIN -->
                <div class="form-floating" style="padding-top: 2rem;">
                    <input type="email" class="form-control senha" id="floatingInput" placeholder="name@example.com" name="email_usuario" value="<?php if(isset($dados['email_usuario'])){ echo $dados['email_usuario'];}?>">
                    <label for="floatingInput" style="padding-top: 3rem;">Email</label>
                </div>
                <!-- SENHA -->
                <div class="form-floating" style="padding-top: 2rem;">
                    <input type="password" class="form-control senha" id="floatingPassword" placeholder="Password" name="senha_usuario" value="<?php if(isset($dados['senha_usuario'])){ echo $dados['senha_usuario'];}?>">
                    <label for="floatingPassword" style="padding-top: 3rem;">Senha</label>
                </div>
                <!-- BOTÃO falta criar uma pasta para o index para redirecionar -->
                <div style="padding-top: 2rem;">
                <input class="btn btn-primary w-100 py-2 mb-4" href="" type="submit" name="SendLogin" value="Logar">
                <a type="submit" href="criarconta.php" class="btn btn-primary w-100 py-2 mb-5">Criar conta</a>
                </div>
            </form>
        </main> 
    </div>   
    <div class="col-sm"></div>
</div>
</body>
</html>
<?php
// EXEMPLO DE CRIPTOGRAFAR SENHA
//echo password_hash(123456, PASSWORD_DEFAULT);
?>
<?php

if (!empty($_POST)) 
{	
    
    $email = $_POST['email_usuario'];
    $senha = $_POST['senha_usuario'];

   

    $rs = $conn->query("SELECT * FROM tb_cadastro_usuario where email_usuario='$email'and 
                                                    senha_usuario='$senha'");
    
    $rs -> execute();
    
    if($rs->fetch(PDO::FETCH_ASSOC) == true)
    { 
        $row = $rs->fetch();
        $_SESSION['cd_usuario'] = $row['cd_usuario'];
        $_SESSION['nome_usuario'] = $row['nome_usuario'];
        $_SESSION['email_usuario'] = $row['email_usuario'];
        $_SESSION['senha_usuario'] = $row['senha_usuario'];
        header('Location:dashboard.php');
    }
    else
    {
        echo"<script>
                    alert('Nome de usuário ou senha incorreto');
             </script>";
    }
}
/*
//'".$dados['usuario']."'
if(!empty($dados['SendLogin'])){
  
   
    //var_dump($dados);
//                                             TEM ERRADA AQUI kkkkkkkk JA ARRUMEI 
    $query_usuario = "SELECT codigo, nome_usuario, email_usuario, senha_usuario 
    FROM tb_cadastro_usuario 
    WHERE email_usuario = :email_usuario 
    LIMIT 1";


    $result_usuario = $conn -> prepare($query_usuario);
    $result_usuario->bindParam(':email_usuario', $dados['email_usuario'], PDO::PARAM_STR);
    $result_usuario->execute();

    
    
    if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
    var_dump($row_usuario);
      if($dados['senha_usuario'] == $row_usuario['senha_usuario']){ 
        echo "usuario logado";
        
    }else{
        $_SESSION['msg'] = "<p style='color: #ff0000'> Error: Usuário ou senha invalida! </p>";
    }
    }else{
        $_SESSION['msg'] = "<p style='color: #ff0000'> Error: Usuário ou senha invalida! </p>";
    }
}
if(isset( $_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}*/
?>















