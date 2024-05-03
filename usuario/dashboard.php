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

</head>

<body>
    <h1>Bem vindo!</h1>
    <a href="sair.php">voltar</a>

    <h1><?php echo "bem vindo ", $_SESSION['nome_usuario']; ?></h1>
    <?php var_dump($_SESSION['nome_usuario']);
    ?>
</body>

</html>