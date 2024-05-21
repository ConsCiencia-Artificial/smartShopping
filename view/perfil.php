<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/login.js"></script>

    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="../assets/css/perfil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Piazzolla:ital,opsz,wght@0,8..30,100..900;1,8..30,100..900&display=swap" rel="stylesheet">
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
                            <p class="text-light fw-bolder mt-3">PRAIA GRANDE SHOPPING</p>

                            <!-- Verificar se está logado -->

                            <a class="nav-link d-grid gap-2 mt-2" href="../index.php">
                                <button type="button" class="btn btn-outline-light">Início</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2" href="home.php">
                                <button type="button" class="btn btn-outline-light">Home</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2" href="#">
                                <button type="button" class="btn btn-outline-light">Pesquisar</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2" href="#">
                                <button type="button" class="btn btn-outline-light">Sobre</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2" href="#">
                                <button type="button" class="btn btn-outline-light">Contatos</button>
                            </a>
                            <a class="nav-link d-grid gap-2 mt-2" href="../app/controller/sair.php">
                                <button type="button" class="btn btn-outline-light">Sair</button>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto px">
                <?php include 'partial/index/card_perfil.php'; ?>
            </main>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>