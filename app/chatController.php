<?php 
session_start();
include_once 'conexao.php';

$msn=$_POST['msn'];
$usuario = $_SESSION['nome_usuario'];

try {
    $stmt_chat = $conn->prepare("INSERT INTO chat (nome_usuario, email_usuario, senha_usuario) VALUES (:nome_usuario, :email_usuario, :senha_usuario)");

    $stmt_chat->bindParam(':nome_usuario', $nome_usuario);
    $stmt_chat->bindParam(':email_usuario', $email_usuario);
    $stmt_chat->bindParam(':senha_usuario', $senha_usuario);
    
    $stmt_chat->execute();

    $variavel = "Cadastrado com Successo!";
    header("Location: ../../view/login.php?variavel=" . urlencode($variavel));
} catch (PDOException $e) {
   // var_dump($nome_usuario);
    $variavel = "Erro ao cadastrar!";
   header("Location: ../../view/cadastro.php?variavel=" . urlencode($variavel));
}
$conn = null;


?>