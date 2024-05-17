<?php
//Verificar se a senha não será cadastrada vazia!!!
if (!empty($_POST)) {
    $nome_usuario = $_POST['nome_usuario'];
    $email_usuario = $_POST['email_usuario'];
    $senha_usuario = md5($_POST['senha_usuario']);
    
    include_once('conexao.php');
    

    try {
        $stmt = $conn->prepare("INSERT INTO tb_cadastro_usuario(nome_usuario, email_usuario, senha_usuario, cd_usuario) VALUES (:nome_usuario, :email_usuario, :senha_usuario, :cd_usuario)");

        $stmt->bindParam(':nome_usuario', $nome_usuario);
        $stmt->bindParam(':email_usuario', $email_usuario);
        $stmt->bindParam(':senha_usuario', $senha_usuario);
        $stmt->bindParam(':cd_usuario', $cd_usuario);
        
        $stmt->execute();

        $variavel = "Cadastrado com Successo!";
        header("Location: ../../view/login.php?variavel=" . urlencode($variavel));
    } catch (PDOException $e) {
        $variavel = "Erro ao cadastrar!";
        header("Location: ../../view/cadastro.php?variavel=" . urlencode($variavel));
    }
    $conn = null;
}
