<?php
if (!empty($_POST)) {
    $nome_usuario = $_POST['nome_usuario'];
    $email_usuario = $_POST['email_usuario'];
    // $cep_usuario = $_POST['cep_usuario'];
    // $end_usuario = $_POST['end_usuario'];
    // $num_usuario = $_POST['num_usuario'];
    // $cidade_usuario = $_POST['cidade_usuario'];
    // $tel_usuario = $_POST['tel_usuario'];
    // $foto_usuario = "";

    include_once('..\conexao.php');

    try {
        $stmt = $conn->prepare("INSERT INTO tb_cadastro_usuario(nome_usuario, email_usuario, senha_usuario, cd_usuario) VALUES (:nome_usuario, :email_usuario, :senha_usuario, :cd_usuario)");

        $stmt->bindParam(':nome_usuario', $nome_usuario);
        $stmt->bindParam(':email_usuario', $email_usuario);
        $stmt->bindParam(':senha_usuario', $senha_usuario);
        $stmt->bindParam(':cd_usuario', $cd_usuario);
        echo "<pre>";
        var_dump($stmt);
        echo "</pre>";
        die;
        $stmt->execute();
        /*
            if(isset($_FILES["FOTOA"])){

                $arquivo = $_FILES['FOTOA']['name'];
                //diretorio dos arquivos
                $pasta_dir = "images/arquivosACIDENTES/";
                // Faz o upload da imagem
                $arquivo_nome = $pasta_dir . $arquivo;
                //salva no banco
                move_uploaded_file($_FILES["FOTOA"]['tmp_name'], $arquivo_nome);

                $query  = "Insert into acidentes (IMAGEM) values ('$arquivo_nome')";
                mysqli_query($strcon,$query) or die("Erro ao tentar cadastrar imagem" . mysqli_error($strcon));
            }
        */
        echo "<script>alert('Cadastrado com Successo')</script>";
        header("Location: ..\usuario/login.php");
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
    $conn = null;
}
?>