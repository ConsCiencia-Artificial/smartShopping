<?php

// var_dump('teste'); die;
session_start();
ob_start();
unset($_SESSION['codigo'], $_SESSION['nome_usuario']);
session_destroy();
$_SESSION['msg'] = "<p style='color: #green'> Deslogado com sucesso! </p>";
header("Location:../../index.php");
