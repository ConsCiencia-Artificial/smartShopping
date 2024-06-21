<?php
session_start();
include_once '../app/controller/conexao.php';
include '../app/controller/carrinhoController.php';
if (!$_SESSION['email_usuario']) {
    header("Location:../view/login.php");
    exit;
}

if ($_POST) {
  $comentario = $_POST['comentario'];
  $comentarista = $_SESSION['nome_usuario'] || $_SESSION['nome_loja'];
  $foto_comentarista = $_SESSION['imagem'] || $_SESSION['img_loja'];
  $id_post = $_POST['id_post'];

  if (!empty($comentario)) {
    try {
      $sql = "INSERT INTO comentario (comentario, comentarista, foto_comentarista, id_post) VALUES (?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$comentario, $comentarista, $foto_comentarista, $id_post]);


      $_SESSION['comentario'] = $comentario;
      $_SESSION['comentarista'] = $comentarista;
      $_SESSION['foto_comentarista'] = $foto_comentarista;
      $conn = null;
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    header('Location: index.php');
    exit;
  }
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

    <link rel="stylesheet" href="../assets/css/carrinho.css">


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
                            <a class="nav-link d-grid gap-2 mt-2" href="home.php">
                                <button type="button" class="btn btn-outline-light">Publicar</button>
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

            <main role="main" class="col-md-10 ml-sm-auto px">
                <div class="container-fluid">
                    <div class="card mb-4 shadow-lg rounded-top">
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
                                    <h6 class="font-medium text-light">Seu carrinho</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 cart">
                                    <div class="title center">
                                        <div class="row">
                                            <div class="col-9">
                                                <h4><b>Itens adicionados ao carrinho</b></h4>
                                            </div>
                                            <div class="col-3 align-self-center text-right text-muted">
                                                <?php 
                                                if (!isset($_SESSION['cd_carrinho'])) {
                                                    echo '<h2 class="m-b-0 font-light">' . $res['total_itens'].'</h2>';
                                                } else {
                                                    echo '0 ';
                                                }
                                                
                                               
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $id_carrinho = $car['cd_carrinho'];
                                        $sql_carrinho = "SELECT * FROM carrinho WHERE cd_carrinho = ?";
                                        $stmt_carrinho = $conn->prepare($sql_carrinho);
                                        $stmt_carrinho->execute([$id_carrinho]);

                                        while ($carr = $stmt_carrinho->fetch()) {
                                    ?>
                                    <div class="row border-top border-bottom">
                                        <div class="row main align-items-center" style="justify-content: flex-start">
                                            <div class="col-2">
                                                <img class="img-fluid" src="<?php echo $_SESSION['im_produto']; ?>" >
                                            </div>
                                            <div class="col-6">
                                                <div class="row text-muted"><?php echo $_SESSION['nm_produto_fk'].'(categoria)' ?></div>
                                                <div class="row"><?php echo $_SESSION['nm_produto_fk'].'(categoria)' ?></div>
                                            </div>
                                            <div class="col">
                                                <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
                                            </div>
                                            <div class="col"><?php echo 'R$ '.$_SESSION['vl_produto_fk']; ?> <span class="close">&#10005;</span></div>
                                        </div>
                                    </div>
                                    <?php }?>
                                    <div class="row border-top border-bottom">
                                        <div class="row main align-items-center" style="justify-content: flex-start">
                                            <div class="col-2">
                                                <img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg">
                                            </div>
                                            <div class="col-6">
                                                <div class="row text-muted">Camisa (categoria)</div>
                                                <div class="row">Camisa básica (nome do produto)</div>
                                            </div>
                                            <div class="col">
                                                <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
                                            </div>
                                            <div class="col">R$12,34 <span class="close">&#10005;</span></div>
                                        </div>
                                    </div>
                                    <div class="row border-top border-bottom">
                                        <div class="row main align-items-center" style="justify-content: flex-start">
                                            <div class="col-2">
                                                <img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg">
                                            </div>
                                            <div class="col-6">
                                                <div class="row text-muted">Camisa (categoria)</div>
                                                <div class="row">Camisa básica (nome do produto)</div>
                                            </div>
                                            <div class="col">
                                                <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
                                            </div>
                                            <div class="col">R$12,34 <span class="close">&#10005;</span></div>
                                        </div>
                                    </div>
                                    <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Voltar a Loja</span></div>
                                </div>
                                <div class="col-md-4 summary">
                                    <div class="center">
                                        <h5><b>Sumário</b></h5>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col" style="padding-left:0;">3 ITENS</div>
                                        <div class="col text-right">R$XX,XX</div>
                                    </div>
                                    <form>
                                        <p>ENTREGA</p>
                                        <select>
                                            <option class="text-muted">Entrega padrão (SEDEX)</option>
                                        </select>
                                        <p>CUPOM</p>
                                        <input id="code" placeholder="Insira um cupom válido">
                                        <p>FORMA DE PAGAMENTO</p>
                                        <select>
                                            <option class="text" selected>Boleto</option>
                                            <option class="text">PIX</option>
                                            <option class="text">Cartão Cadastrado</option>
                                            <option class="text">+ Adicionar Cartão</option>
                                        </select>
                                    </form>
                                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                        <div class="col">VALOR TOTAL</div>
                                        <div class="col text-right">R$XX,XX</div>
                                    </div>

                                    <div class="center">
                                        <button class="btn btn-lg btn-light text-center" style="margin-top: 25%;">AVANÇAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <p class="card-text"><small class="text-muted"></small></p>
    </div>
</body>


<!-- ACESSIBILIDADE -->
<?php include 'partial/index/leitor.php'; ?>
<?php include 'partial/index/libras.php'; ?>
<script src="../assets/js/leitura.js"></script>
<script src="../assets/js/texto.js"></script>

<script src="../script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>