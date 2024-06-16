<?php
session_start();
include_once('conexao.php');

if ($_POST['email_loja'] && $_POST['senha_loja']) {
    $email_loja = $_POST['email_loja'];
    $senha_loja = md5($_POST['senha_loja']); 

    // Use placeholders na sua consulta SQL
    $select_empresa = $conn->prepare("SELECT * FROM tb_cadastro_loja where email_loja = '$email_loja' and senha_loja = '$senha_loja'");
    $select_empresa->execute();

    $row_empresa = $select_empresa->fetch();

    if ($row_empresa) { 
        // Defina as sessões aqui
        $_SESSION['nome_loja'] = $row_empresa['nome_loja'];
        $_SESSION['email_loja'] = $row_empresa['email_loja'];
        $_SESSION['nome_categoria_loja'] = $row_empresa['nome_categoria_loja'];
        $_SESSION['img_loja'] = $row_empresa['img_loja'];
        // ... outras sessões

        // Redirecione com base na condição da imagem da loja
        header("Location: " . ($row_empresa['img_loja'] == null ? "../../view/config_empresa.php" : "../../index.php"));
        exit();
    } else {
        var_dump($row_empresa);
        $variavel = "Usuário ou senha inválido!";
       // header("Location: ../../view/login_empresa.php?variavel=" . urlencode($variavel));
        exit();
    }
} else {
    $variavel = "O usuário ou a senha não foram preenchidos";
    header("Location: ../../view/login.php?variavel=" . urlencode($variavel));
    exit(); // Certifique-se de sair após o redirecionamento
}
?>
