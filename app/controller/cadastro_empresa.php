<?php
//Verificar se a senha não será cadastrada vazia!!!
if (!empty($_POST)) {
    $nome_loja = $_POST['nome_loja'];
    $email_loja = $_POST['email_loja'];
    $senha_loja = md5($_POST['senha_loja']);
    
    include_once('conexao.php');
    
    

    try {
        $stmt_empresa = $conn->prepare("INSERT INTO tb_cadastro_loja(nome_loja, email_loja, senha_loja) VALUES (:nome_loja, :email_loja, :senha_loja)");

        $stmt_empresa->bindParam(':nome_loja', $nome_loja);
        $stmt_empresa->bindParam(':email_loja', $email_loja);
        $stmt_empresa->bindParam(':senha_loja', $senha_loja);
        
        $stmt_empresa->execute();

        $variavel = "Cadastrado com Successo!";
        header("Location: ../../view/login_empresa.php?variavel=" . urlencode($variavel));
    } catch (PDOException $e) {
       // var_dump($nome_usuario);
        $variavel = "Erro ao cadastrar!";
        header("Location: ../../view/cadastro_empresa.php?variavel=" . urlencode($variavel));
    }
    $conn = null;
}
