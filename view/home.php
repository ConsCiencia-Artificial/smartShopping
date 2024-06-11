<?php
session_start();
include_once '../app/controller/conexao.php';
if (!$_SESSION['email_usuario']) {
    header("Location:../view/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG Shopping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />

    <link rel="stylesheet" href="../style.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Piazzolla:ital,opsz,wght@0,8..30,100..900;1,8..30,100..900&display=swap" rel="stylesheet">
    <?php include 'partial/index/index_style.php'; ?>
</head>

<body style="background-image: url(../assets/img/pgs-rep.png)">
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar" style="background-color: #dd163b;">
                <div class="sidebar-sticky">
                    <div class="row">
                        <div class="col-sm center">
                            <!-- NAVBAR -->
                            <a href="../index.php"><img src="../assets/img/logo.png" alt="logo" width="105" class="img-fluid margin-top-comm"></a>

                            <?php
                            if (!empty($_SESSION['email_usuario'])) {
                            ?>
                                <p class="text-light fw-bolder mt-3" style="text-transform: uppercase;"><?php echo $_SESSION['nome_usuario']; ?></p>
                            <?php } else { ?>
                                <p class="text-light fw-bolder mt-3">PRAIA GRANDE SHOPPING</p>
                            <?php } ?>

                            <!-- Adicionar "href" -->
                            <a class="nav-link d-grid gap-2 mt-2" href="../index.php">
                                <button type="button" class="btn btn-outline-light">Início</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2" href="chat.php">
                                <button type="button" class="btn btn-outline-light">Conversas</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2 disable">
                                <button type="button" class="btn btn-outline-light disabled">Publicar</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2" href="perfil.php">
                                <button type="button" class="btn btn-outline-light">Perfil</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2" href="../app\controller/sair.php">
                                <button type="button" class="btn btn-outline-light">Sair</button>
                            </a>
                        </div>
                        <p class="center text-light" style="padding-top: 2rem;">© Consciência Artificial, 2024</p>
                    </div>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto px">
                <div class="container-fluid">
                    <div class="card mb-4 shadow-lg rounded-top" style="max-width: 720px;">
                        <div class="row g-0 rounded-top">
                            <div class="d-flex flex-row comment-row m-t-0 align-items-center rounded-top" style="background-color: #dd163b;">
                                <div class="p-2" id="comentarioCliente1">
                                    <?php
                                    if (!empty($_SESSION['imagem'])) {
                                    ?>
                                        <img src="<?php echo '../' . $_SESSION['imagem'];  ?>" width="40" class="img-radius" alt="Imagem de perfil do usuário">
                                    <?php } else { ?>
                                        <img src="../assets/img/default-icon.jpg" width="40" class="img-radius" alt="Imagem de perfil do usuário">
                                    <?php } ?>
                                </div>
                                <div class="comment-text w-100 p-2">
                                    <h6 class="font-medium text-light"><?php echo $_SESSION['nome_usuario']; ?></h6>
                                </div>
                            </div>
                            <form class="d-flex justify-content-between" enctype="multipart/form-data" method="POST">
                            <div class="col-md-6 post-padd center">
                                <!-- <input type="file" id="img_post" name="img_post" src="../assets/img/svg/plus.svg"> -->
                               
                                    <label for="img_post" class="custom-file-upload">
                                        <div class="btn btn-outline-dark border-dark center rounded">
                                            <img class="center rounded" src="../assets/img/svg/plus.svg"  style="width: 100%; height: 30rem;">
                                            <input id="img_post" type="file" name="img_post" accept="image/*" />
                                        </div>
                                    </label>
                                    
                                    <!-- <img class="center rounded" src="../assets/img/svg/plus.svg" style="width: 15%;" type="file" id="img_post" name="img_post"> -->
                                    <!-- <input class="btn" type="file" src="../assets/img/svg/plus.svg" id="img_post" name="img_post" style="width: 15%;"> -->
                            


                                <!-- TESTE (tentando fazer o botão de publicar funcionar) -->
                                <!-- <form method="post" enctype="multipart/form-data">
                                    <div>
                                        <label for="file">Choose file to upload</label>
                                        <input type="file" id="img_post" name="img_post" multiple />
                                    </div>
                                    <div>
                                        <button type="submit">Submit</button>
                                    </div>
                                </form> -->
                            </div>
                            <div class="col-md-6">
                                <div class="card-body card-text-color">
                                    <!--título-->
                                    <div class="col">
                                        <!-- comentário -->
                                         
                                        <div class="d-flex flex-row comment-row m-t-0 floating" style="padding-bottom: 5%;">
                                            <textarea class="form-control me-2" rows="18" type="text" placeholder="Qual seu próximo sucesso de vendas?" aria-label="publicação" name="descricao" style="resize: vertical; max-height: 26rem; min-height: 26rem;"></textarea>
                                            <!-- <input class="form-control me-2" style="width: 25rem;" type="text" placeholder="Qual seu próximo sucesso de vendas?" aria-label="publicação" name="descricao"> -->

                                            <!-- <input class="form-control me-2" style="width: 100%;" type="text" placeholder="Qual seu próximo sucesso de vendas?" aria-label="publicação" name="descricao"> -->

                                        </div>
                                        <button class="btn btn-outline-danger" type="submit" style="width: 98%; padding-top: 1%;">Postar</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <p class="card-text"><small class="text-muted"></small></p>
    </div>
</body>
<?php


if ($_POST) {
    $descricao = $_POST["descricao"];
    $postador = $_SESSION["nome_usuario"];
    $foto_postador = $_SESSION["imagem"];
    $img_post = $_FILES["img_post"]["name"];

    if (!empty($descricao) && !empty($img_post)) {
        try {
            $foto_tmp = $_FILES["img_post"]["tmp_name"];
            $foto_destino = "../assets/uploads/" . basename($img_post);
            $foto_caminho = "assets/uploads/" . basename($img_post);

            move_uploaded_file($foto_tmp, $foto_destino);
            $sql = "INSERT INTO post (descricao, postador, foto_postador, img_post) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$descricao, $postador, $foto_postador, $foto_caminho]);

            $_SESSION['descricao'] = $descricao;
            $_SESSION['postador'] = $postador;

            $conn = null;
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
?>

<!-- ACESSIBILIDADE -->
<?php include 'partial/index/leitor.php'; ?>
<?php include 'partial/index/libras.php'; ?>
<script src="../assets/js/leitura.js"></script>
<script src="../assets/js/texto.js"></script>

<script src="../script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>