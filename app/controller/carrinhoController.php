<?php
include_once 'conexao.php';

$sql = "SELECT COUNT(*) AS total_itens FROM carrinho WHERE id_comprador = :codigo LIMIT 3";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':codigo', $_SESSION['id_comprador']); // Substitua pelo nome de usuário desejado
$stmt->execute();

// Obtém o resultado
$res = $stmt->fetch();

// Exibe o total de itens
