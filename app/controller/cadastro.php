<?php

if (!empty($_POST)) {
    $nome_usuario = $_POST["nome_usuario"];
    $email_usuario = $_POST["email_usuario"];
    $senha_usuario = md5($_POST["senha_usuario"]);
    
    include_once('conexao.php');

    try {
        $stmt = $conn->prepare("INSERT INTO tb_cadastro_usuario(codigo, nome_usuario, email_usuario, senha_usuario) VALUES (:codigo, :nome_usuario, :email_usuario, :senha_usuario)");

        $stmt->bindParam(":nome_usuario", $nome_usuario);
        $stmt->bindParam(":email_usuario", $email_usuario);
        $stmt->bindParam(":senha_usuario", $senha_usuario);
        $stmt->bindParam(":codigo", $codigo);

        $stmt->execute();

        $variavel = "Cadastro concluido!!";
        header("Location: ../../login.php?variavel=" . urlencode($variavel));
        // echo "<script> alert(Cadastrado com Successo)</script>";

        // Mensagem de erro ao tentar ir até a página de Login novamente
        // header("Location: ../../view/login.php?
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
    $conn = null;
}
