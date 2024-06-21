<?php
//Verificar se a senha não será cadastrada vazia!!!
if (!empty($_POST)) {
    $nm_funcionario = $_POST['nm_funcionario'];
    $email_funcionario = $_POST['email_funcionario'];
    $senha_funcionario = md5($_POST['senha_funcionario']);
    $nivel_funcionario = 1;
    
    include_once('conexao.php');
    
    

    try {
        $stmt_empresa = $conn->prepare("INSERT INTO tb_cadastro_funcionario(nm_funcionario, email_funcionario, senha_funcionario, nivel_acesso) VALUES (:nm_funcionario, :email_funcionario, :senha_funcionario, :nivel_acesso)");

        $stmt_empresa->bindParam(':nm_funcionario', $nm_funcionario);
        $stmt_empresa->bindParam(':email_funcionario', $email_funcionario);
        $stmt_empresa->bindParam(':senha_funcionario', $senha_funcionario);
        $stmt_empresa->bindParam(':nivel_acesso', $nivel_funcionario);
        
        $stmt_empresa->execute();

        $variavel = "Cadastrado com Successo!";
        header("Location: ../../view/login_empresa.php?variavel=" . urlencode($variavel));
    } catch (PDOException $e) {
       // var_dump($nome_usuario);
        $variavel = "Erro ao cadastrar!";
        //header("Location: ../../view/cadastro_funcionario.php?variavel=" . urlencode($variavel));
        var_dump($_SESSION['email_funcionario']);
    }
    $conn = null;
}
