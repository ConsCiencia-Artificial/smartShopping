<?php
session_start();
include_once('conexao.php');
// var_dump($_POST); die;
if ($_POST['email_usuario'] && $_POST['senha_usuario']) {
    $email = $_POST['email_usuario'];
    $senha = md5($_POST['senha_usuario']);


    $select = $conn->prepare("SELECT * FROM tb_cadastro_usuario where email_usuario='$email'and 
     senha_usuario='$senha'");
    $select->execute();

    $row = $select->fetch();

    if ($row) {
        // session_destroy();
        $_SESSION["email_usuario"] = $row['email_usuario'];
        $_SESSION['nome_usuario'] = $row['nome_usuario'];
        $_SESSION['imagem'] = $row['imagem'];
        $_SESSION['nivel_acesso'] = $row['nivel_acesso'];
        $_SESSION['codigo'] = $row['codigo'];
        $_SESSION['fk_loja'] = $row['cd_loja_fk'];
        $conn = null;
        // var_dump($_SESSION); die;
        if ($_SESSION['imagem'] == null) {
            header("Location: ../../view/config.php");
        } else {
        header("Location: ../../index.php");
    } } else {
        $variavel = "Usuário ou senha inválido!";
        header("Location: ../../view/login.php?variavel=" . urlencode($variavel));
    }
} else {
    $variavel = "O usuário ou a senha não foram preenchidos";

    header("Location: ../../view/login.php?variavel=" . urlencode($variavel));
    exit(); // Certifique-se de sair após o redirecionamento
}
