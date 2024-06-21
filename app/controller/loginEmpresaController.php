<?php
session_start();
include_once('conexao.php');

if ($_POST['email_funcionario'] && $_POST['senha_funcionario']) {
    $email_funcionario = $_POST['email_funcionario'];
    $senha_funcionario = md5($_POST['senha_funcionario']); 

    // Use placeholders na sua consulta SQL
    $select_empresa = $conn->prepare("SELECT * FROM tb_cadastro_funcionario where email_funcionario = '$email_funcionario' and senha_funcionario = '$senha_funcionario'");
    $select_empresa->execute();

    $row_empresa = $select_empresa->fetch();

    if ($row_empresa) { 
        // Defina as sessões aqui
        $_SESSION['nm_funcionario'] = $row_empresa['nm_funcionario'];
        $_SESSION['email_funcionario'] = $row_empresa['email_funcionario'];
        $_SESSION['img_funcionario'] = $row_empresa['img_funcionario'];
        $_SESSION['nivel_acesso'] = $row_empresa['nivel_acesso'];
        // ... outras sessões

        // Redirecione com base na condição da imagem da loja
        header("Location: " . ($row_empresa['img_funcionario'] == null ? "../../view/config_empresa.php" : "../../index.php"));
        exit();
    } else {
        var_dump($row_empresa);
        $variavel = "Usuário ou senha inválido!";
       // header("Location: ../../view/login_empresa.php?variavel=" . urlencode($variavel));
        exit();
    }
} else {
    $variavel = "O usuário ou a senha não foram preenchidos";
    header("Location: ../../view/login_empresa.php?variavel=" . urlencode($variavel));
    exit(); // Certifique-se de sair após o redirecionamento
}
?>
